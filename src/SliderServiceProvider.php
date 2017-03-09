<?php

namespace Story\Slider;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class SliderServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {

    }

    public static function navigation()
    {
        require __DIR__.'/../config/navigation.php';
    }
}
