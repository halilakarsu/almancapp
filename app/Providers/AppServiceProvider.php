<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        \Illuminate\Support\Facades\Event::listen(
            \App\Events\LessonCompleted::class,
            \App\Listeners\AwardBadge::class
        );

        Paginator::useBootstrapFive();
    }
}
