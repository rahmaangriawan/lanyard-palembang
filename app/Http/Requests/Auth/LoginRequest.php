<?php

namespace App\Http\Requests\Auth;

use App\Support\LoginTurnstile;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'cf-turnstile-response' => ['nullable', 'string', 'max:4096'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();
        $this->ensureIdentityIsNotRateLimited();
        $this->validateTurnstile();

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());
            RateLimiter::hit($this->identityThrottleKey(), 300);

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        RateLimiter::clear($this->identityThrottleKey());
    }

    private function validateTurnstile(): void
    {
        $turnstile = LoginTurnstile::config();
        if ($turnstile['misconfigured']) {
            throw ValidationException::withMessages([
                'cf-turnstile-response' => 'Verifikasi keamanan belum dikonfigurasi dengan benar. Hubungi administrator.',
            ]);
        }

        if (! $turnstile['enabled']) {
            return;
        }

        $token = trim((string) $this->input('cf-turnstile-response', ''));
        if (! LoginTurnstile::verify($token, $this->ip(), $turnstile['secretKey'])) {
            throw ValidationException::withMessages([
                'cf-turnstile-response' => 'Verifikasi keamanan gagal. Centang Turnstile lalu coba lagi.',
            ]);
        }
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $this->throwThrottleValidationException($this->throttleKey());
    }

    private function ensureIdentityIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->identityThrottleKey(), 10)) {
            return;
        }

        $this->throwThrottleValidationException($this->identityThrottleKey());
    }

    private function throwThrottleValidationException(string $key): never
    {
        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($key);

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ])->status(429);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }

    private function identityThrottleKey(): string
    {
        return 'login-identity|'.Str::transliterate(Str::lower(trim((string) $this->input('email'))));
    }
}
