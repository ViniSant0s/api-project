<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Admin;
use App\Models\Pagamento;
use Illuminate\Support\Facades\Mail;
use App\Mail\Email;

class ProcessarPagamento implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $admin;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Pagamento $pagamento)
    {
        $this->pagamento = $pagamento;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->admin = Admin::where('id', 1)->first();
        Mail::to($this->admin->Email)
                ->send(new Email($this->admin));
    }
}
