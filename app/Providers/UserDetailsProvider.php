<?php

namespace App\Providers;
use App\Helpers\UserDetails;
use Illuminate\Support\ServiceProvider;

class UserDetailsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('UserDetails',function(){
            return new UserDetails();       
        });
    }
}
