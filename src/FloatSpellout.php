<?php

namespace Naimcse56\FloatSpellout;

use Illuminate\Support\ServiceProvider;
use Naimcse56\FloatSpellout\Services\FloatNumberSpelloutService;
use Naimcse56\FloatSpellout\Contracts\NumberSpelloutContract;

class FloatSpelloutServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(NumberSpelloutContract::class, function ($app) {
            return new FloatNumberSpelloutService();
        });
    }

    public function boot()
    {
        // Optionally, publish config if needed.
    }
}
