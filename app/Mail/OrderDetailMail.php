<?php

namespace App\Mail;

use App\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDetailMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id , $name , $items)
    {
        //
        $this->id = $id;
        $this->name = $name;
        $this->items = $items;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('site.email.order' , ['id' => $this->id , 'name' => $this->name , 'items' => $this->items , 'template' => EmailTemplate::first()])
            ->subject('New order')
            ->from('info@nutritribego.com' , 'Nutritribe')
            ->bcc('selshimi@gmail.com');
    }
}
