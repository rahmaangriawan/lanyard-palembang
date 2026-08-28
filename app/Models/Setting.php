<?php

namespace App\Models;

use App\Support\AssetUrl;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    private const ASSET_FALLBACKS = [
        'site_logo' => '/uploads/lanyard-palembang-logo.webp',
        'logo_url' => '/uploads/lanyard-palembang-logo.webp',
        'site_logo_header' => '/uploads/lanyard-palembang-logo.webp',
        'site_logo_mobile' => '/uploads/lanyard-palembang-logo.webp',
        'site_favicon' => '/uploads/lanyard-palembang-favicon.webp',
        'favicon_url' => '/uploads/lanyard-palembang-favicon.webp',
        'og_image' => '/uploads/lanyard-palembang-logo.webp',
    ];

    public const CREATED_AT = 'createdAt';
    public const UPDATED_AT = 'updatedAt';

    protected $table = 'setting';

    protected $fillable = ['key', 'value'];

    public function getValueAttribute(?string $value): string
    {
        $fallback = $this->assetFallback();

        if ($fallback !== null) {
            return AssetUrl::relative($value, $fallback) ?? $fallback;
        }

        return (string) $value;
    }

    public function setValueAttribute(?string $value): void
    {
        $fallback = $this->assetFallback();
        $this->attributes['value'] = $fallback !== null
            ? AssetUrl::relative($value, $fallback)
            : (string) $value;
    }

    private function assetFallback(): ?string
    {
        $key = (string) ($this->attributes['key'] ?? '');

        return self::ASSET_FALLBACKS[$key] ?? null;
    }
}
