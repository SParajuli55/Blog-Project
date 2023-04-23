<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProductMail extends Mailable
{
    use Queueable, SerializesModels;


    public function build()
    {
        //dd('hello');
        return $this->from('info@uecjheu.com.np', 'Hire Me Service')->subject('Job Applied Successfully')
            ->view('product::email.productemail');
    }
}
