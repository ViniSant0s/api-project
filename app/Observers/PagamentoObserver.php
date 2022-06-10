<?php

namespace App\Observers;

use App\Jobs\ProcessarPagamento;
use App\Models\Pagamento;

class PagamentoObserver
{
    /**
     * Handle the Pagamento "created" event.
     *
     * @param  \App\Models\Pagamento  $pagamento
     * @return void
     */
    public function created(Pagamento $pagamento)
    {
        ProcessarPagamento::dispatch($pagamento);
    }

    /**
     * Handle the Pagamento "updated" event.
     *
     * @param  \App\Models\Pagamento  $pagamento
     * @return void
     */
    public function updated(Pagamento $pagamento)
    {
        //
    }

    /**
     * Handle the Pagamento "deleted" event.
     *
     * @param  \App\Models\Pagamento  $pagamento
     * @return void
     */
    public function deleted(Pagamento $pagamento)
    {
        //
    }

    /**
     * Handle the Pagamento "restored" event.
     *
     * @param  \App\Models\Pagamento  $pagamento
     * @return void
     */
    public function restored(Pagamento $pagamento)
    {
        //
    }

    /**
     * Handle the Pagamento "force deleted" event.
     *
     * @param  \App\Models\Pagamento  $pagamento
     * @return void
     */
    public function forceDeleted(Pagamento $pagamento)
    {
        //
    }
}
