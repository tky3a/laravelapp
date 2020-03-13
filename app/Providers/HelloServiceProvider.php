<?php

namespace App\Providers;

use Illuminate\support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;
use App\Http\Validators\HelloValidator;


class HelloServiceProvider extends ServiceProvider
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
      $validator = $this->app['validator'];
      $validator->resolver(function($translator, $data, $rules, $messages){
        dump("hoge");
        return new HelloValidator($translator, $data, $rules, $messages);
      });
    }
}