<?php

namespace Story\Slider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class SliderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'slider');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
    }

    public function register()
    {
        Route::middleware(['web', 'auth'])
            ->prefix('backend/cms/plugins')
            ->namespace(__NAMESPACE__ . '\\Backend\\Controllers')
            ->group(__DIR__.'/../routes/backend.php');
    }

    public static function navigation()
    {
        return require __DIR__.'/../config/navigation.php';
    }
}
