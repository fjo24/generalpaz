<?php

namespace App\Providers;

use App\Dato;
use App\Red;
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
        \Schema::defaultStringLength(191);

        $telefono    = Dato::where('tipo', 'telefono')->first();
        $telefono2   = Dato::where('tipo', 'telefono2')->first();
        $direccion   = Dato::where('tipo', 'direccion')->first();
        $email       = Dato::where('tipo', 'email')->first();
        $instagram  = Red::where('nombre', 'instagram')->first();
        $facebook   = Red::where('nombre', 'facebook')->first();

        view()->share([
            'telefono'    => $telefono,
            'telefono2'   => $telefono2,
            'direccion'   => $direccion,
            'email'       => $email,
            'instagram'   => $instagram,
            'facebook'    => $facebook,
        ]);
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
