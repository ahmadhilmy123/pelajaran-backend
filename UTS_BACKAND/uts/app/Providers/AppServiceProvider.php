<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        // Mengatur default panjang string agar kompatibel dengan MySQL
        Schema::defaultStringLength(191);

        // Jika Anda menggunakan Sanctum dan aplikasi berbasis API, pastikan Statefulness terkonfigurasi
        config(['sanctum.stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', 'localhost,localhost:8000'))]);
    }
}
