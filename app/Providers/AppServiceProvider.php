<?php

namespace App\Providers;

use App\Models\GeneralSettings;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = GeneralSettings::query()->take(-1)->first();
        view()->share('settings', $settings);
    }
}
