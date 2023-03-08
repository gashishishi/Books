<?php

namespace App\Providers;

use Illuminate\Validation\Validator;
use App\Classes\LBValidator;
use Illuminate\Support\ServiceProvider;

class LBServiceProvider extends ServiceProvider
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
            return new LBValidator($translator, $data, $rules, $messages);
        });
    }
}
