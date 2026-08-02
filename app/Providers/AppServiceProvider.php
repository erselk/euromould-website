<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\GeneralSetting;
use Resend\Contracts\Client as ClientContract;
use Resend\Client;
use Resend\Laravel\Exceptions\ApiKeyIsMissing;
use Resend;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (file_exists(app_path('helpers.php'))) {
            require_once app_path('helpers.php');
        }

        $this->app->extend('files', function ($files, $app) {
            return new \App\Support\WindowsFilesystem;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') !== 'local') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
        $this->app->singleton(ClientContract::class, static function (): Client {
            $apiKeyString = config('resend.api_key') ?? config('services.resend.key');

            if (! is_string($apiKeyString)) {
                throw ApiKeyIsMissing::create();
            }

            if (app()->environment('local')) {
                $apiKey = \Resend\ValueObjects\ApiKey::from($apiKeyString);
                $baseUri = \Resend\ValueObjects\Transporter\BaseUri::from('api.resend.com');
                $headers = \Resend\ValueObjects\Transporter\Headers::withAuthorization($apiKey);

                $guzzle = new \GuzzleHttp\Client(['verify' => false]);
                $transporter = new \Resend\Transporters\HttpTransporter($guzzle, $baseUri, $headers);

                return new Client($transporter);
            }

            return Resend::client($apiKeyString);
        });

        $this->app->alias(ClientContract::class, 'resend');
        $this->app->alias(ClientContract::class, Client::class);

        try {
            if (Schema::hasTable('general_settings')) {
                $settings = \Illuminate\Support\Facades\Cache::remember('general_settings', 3600, function () {
                    return GeneralSetting::first();
                });
                View::share('settings', $settings);
            }
        } catch (\Exception $e) {
            //
        }
    }
}
