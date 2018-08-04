<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Reminder extends Mailable
{
    use Queueable, SerializesModels;

    public $tries = 3;
    public $event;
    public $picture;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event, $picture)
    {
        $this->event = $event;
        $this->picture = $picture;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if(\File::exists($this->picture)) {

            return $this->from('dmglad7@gmail.com', 'Feedback Form')
                ->subject('New order')
                ->with(['html' => $this->event])
                ->attach($this->picture)
                ->view('email');
        } else {
            return $this->from('dmglad7@gmail.com', 'Feedback Form')
                ->subject('New order')
                ->with(['html' => $this->event])
                ->view('email');


        }
    }
}
