<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Admin;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    private $admin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.created.pagamento')
                    ->subject('Pagamento realizado com sucesso!')
                    ->with([
                        'admin' => $this->admin,
                    ]);
    }
}
