<?php

namespace App\Providers;

use Carbon\Carbon;
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
        Carbon::macro('toFormattedDate', function () {
            $date = $this;

            if ($date->isToday()) {
                $date = "Today {$date->format('H:i')}";
            } else if ($date->isCurrentWeek()) {
                $date = "{$date->format('D H:i')}";
            } else {
                $date = $date->format('d F Y H:i');
            }

            return $date;
        });
    }
}
