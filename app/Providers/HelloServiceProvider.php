<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Validator;
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
        Validator::extend('hello', function($attribute, $value, $parameter, $validator){
            return $value % 2 == 0;
        });

        // $validator = $this->app['validator'];
        // $validator->resolver(function($translator, $data, $rules, $message){
        //     return new HelloValidator($translator, $data, $rules, $message);
        // });

        // View::composer(
        //     'hello.index', 'App\Http\Composers\HelloComposer'
        // );

        // View::composer(
        //     'hello.index', function($view){
        //         $view->with('view_message', 'composer message!');
        //     }
        // );
    }
}
