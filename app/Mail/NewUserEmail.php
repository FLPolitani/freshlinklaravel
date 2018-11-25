<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject="Pendaftaran User Baru PoinTrash";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $user;
    public function __construct(User $user)
    {
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new_user')->with('user',$this->user);
    }
}
