<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HogeHogeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'hello.index', 'App\Http\Composers\HelloComposer'
          );
    }
}
