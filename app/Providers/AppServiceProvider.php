<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Pagamento;
use App\Observers\PagamentoObserver;

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
        Pagamento::observe(PagamentoObserver::class);
    }
}
