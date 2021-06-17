<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserCreatedMailable extends Mailable
{
    use Queueable, SerializesModels;


    public $subject = "Usuario dado de alta en CB La Arboleda";
    public $userName;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($n, $us)
    {
        $this->userName = $us;
        $this->name = $n;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $userName = $this->userName;
        $name = $this->name;
        $data = compact('userName', 'name');
        return $this->view('emails.user-created', compact('data'));
    }
}
