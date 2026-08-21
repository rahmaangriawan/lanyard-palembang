<?php

namespace App\Support;

use App\Models\Setting;
use Illuminate\Http\JsonResponse;

final class PublicApi
{
    /**
     * @param list<string>|null $keys
     * @return array<string, string>
     */
    public static function settings(?array $keys = null): array
    {
        $settings = Setting::query()
            ->when($keys, fn ($query) => $query->whereIn('key', $keys))
            ->pluck('value', 'key')
            ->all();

        $assetKeys = ['site_logo', 'site_favicon', 'og_image', 'logo_url', 'favicon_url', 'site_logo_header', 'site_logo_mobile'];
        $assetSettings = array_intersect_key($settings, array_flip($assetKeys));

        foreach ($assetSettings as $key => $value) {
            $fallback = str_contains($key, 'favicon')
                ? '/uploads/lanyard-medan-favicon.webp'
                : '/uploads/lanyard-medan-logo.webp';
            $settings[$key] = AssetUrl::relative($value, $fallback) ?? $fallback;
        }

        return $settings;
    }

    /**
     * @param array<string, mixed> $payload
     */
    public static function json(array $payload, int $seconds = 600): JsonResponse
    {
        return response()->json($payload)
            ->header('Cache-Control', "public, s-maxage={$seconds}, stale-while-revalidate=300");
    }

    /**
     * @param array<string, mixed> $payload
     */
    public static function noStoreJson(array $payload): JsonResponse
    {
        return response()->json($payload)
            ->header('Cache-Control', 'no-store, private');
    }

    public static function sanitizeContent(mixed $model): mixed
    {
        if ($model && isset($model->content)) {
            $model->content = HtmlSanitizer::clean($model->content);
        }

        return $model;
    }

    public static function sanitizeProduct(mixed $model): mixed
    {
        if ($model && isset($model->description)) {
            $model->description = HtmlSanitizer::clean($model->description);
        }

        return $model;
    }

    public static function normalizeText(?string $value): ?string
    {
        return is_string($value)
            ? str_replace(
                [
                    'www.pusattalilanyard.com',
                    'pusattalilanyard.com',
                    'PusatTaliLanyard',
                    'Pusat Tali Lanyard',
                    'pusattalilanyard',
                ],
                [
                    'www.lanyardmedan.com',
                    'lanyardmedan.com',
                    'LanyardMedan',
                    'Lanyard Medan',
                    'lanyardmedan',
                ],
                $value,
            )
            : $value;
    }
}
