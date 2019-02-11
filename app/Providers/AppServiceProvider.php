<?php

namespace App\Providers;

use App\Models\Tool;
use App\Observers\ToolRecommendObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Carbon\Carbon::setLocale('zh');
//        Tool::observe(ToolRecommendObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
