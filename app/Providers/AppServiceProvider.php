<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Goal;
use App\Observers\GoalObserver;

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
        Goal::observe(GoalObserver::class);
    }
}
