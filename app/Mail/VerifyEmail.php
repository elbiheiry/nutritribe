<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username , $name)
    {
        //
        $this->username = $username ;
        $this->name = $name ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.email.verify' , ['username' => $this->username , 'name' => $this->name])
            ->subject('Verify your email')
            ->from('info@nutritribego.com' , 'nutritribe')
            ->bcc('selshimi@gmail.com');
    }
}
