<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
            URL::forceRootUrl(config('app.url'));
        }

        Vite::prefetch(concurrency: 3);

        Response::macro('api', function (string $message, $data = [], $status = 200, $headers = []) {
            return response()->json([
                'message' => $message,
                ...$data,
            ], $status, $headers);
        });

        Response::macro('apiError', function (string $message, $errors = [], $status = 400, $headers = []) {
            return response()->json([
                'message' => $message,
                'errors' => $errors,
            ], $status, $headers);
        });
    }
}
