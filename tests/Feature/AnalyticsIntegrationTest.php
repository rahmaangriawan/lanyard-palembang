<?php

namespace Tests\Feature;

use Tests\TestCase;

class AnalyticsIntegrationTest extends TestCase
{
    public function test_public_analytics_contract_is_consent_gated_and_pii_free(): void
    {
        $layout = file_get_contents(resource_path('views/layouts/public.blade.php'));
        $tracker = file_get_contents(public_path('js/analytics-consent.js'));
        $consent = file_get_contents(resource_path('views/components/analytics-consent.blade.php'));

        $this->assertIsString($layout);
        $this->assertIsString($tracker);
        $this->assertIsString($consent);
        $this->assertStringContainsString('window.dataLayer = window.dataLayer || [];', $layout);
        $this->assertStringContainsString('id="analytics-config"', $layout);
        $this->assertStringContainsString('<x-analytics-consent />', $layout);
        $this->assertStringContainsString("getConsent() !== 'accepted'", $tracker);
        $this->assertStringContainsString("push('whatsapp_click'", $tracker);
        $this->assertStringContainsString("push('form_submit'", $tracker);
        $this->assertStringContainsString("push('file_download'", $tracker);
        $this->assertStringContainsString("push('utm_landing'", $tracker);
        $this->assertStringContainsString('downloadableExtensions', $tracker);
        $this->assertStringNotContainsString('values.get(\'name\')', $tracker);
        $this->assertStringNotContainsString('values.get(\'email\')', $tracker);
        $this->assertStringNotContainsString('values.get(\'phone\')', $tracker);
        $this->assertStringContainsString('Terima analytics', $consent);
        $this->assertStringContainsString('Tolak', $consent);
    }

    public function test_public_redirect_contract_preserves_attribution_parameters(): void
    {
        $middleware = file_get_contents(app_path('Http/Middleware/HandlePublicRedirects.php'));

        $this->assertIsString($middleware);
        foreach (['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid', 'fbclid', 'msclkid'] as $parameter) {
            $this->assertStringContainsString("'{$parameter}'", $middleware);
        }
    }

    public function test_utm_generator_is_not_publicly_accessible(): void
    {
        $this->get('/kawruh/utm-generator')->assertRedirect();
    }

    public function test_utm_generator_contract_is_same_site_and_non_persistent(): void
    {
        $controller = file_get_contents(app_path('Http/Controllers/Cms/UtilityPageController.php'));
        $routes = file_get_contents(base_path('routes/web.php'));
        $menu = file_get_contents(resource_path('views/layouts/meridian.blade.php'));

        $this->assertIsString($controller);
        $this->assertIsString($routes);
        $this->assertIsString($menu);
        $this->assertStringContainsString("Route::get('/utm-generator'", $routes);
        $this->assertStringContainsString("Route::post('/utm-generator'", $routes);
        $this->assertStringContainsString("Route::middleware('admin')", $routes);
        $this->assertStringContainsString("'UTM Generator'", $menu);
        $this->assertStringContainsString("'lanyardpalembang.com'", $controller);
        $this->assertStringContainsString('http_build_query($query, \'\', \'&\', PHP_QUERY_RFC3986)', $controller);
        $this->assertStringContainsString('generatedUrl', $controller);
        $this->assertStringNotContainsString('UTM::create', $controller);
    }
}
