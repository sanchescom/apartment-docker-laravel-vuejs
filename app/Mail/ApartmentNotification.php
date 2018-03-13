<?php

namespace App\Mail;

use App\Models\Apartment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApartmentNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The apartment instance.
     *
     * @var Apartment
     */
    protected $apartment;


    /**
     * Create a new message instance.
     *
     * @param Apartment $apartment
     */
    public function __construct(Apartment $apartment)
    {
        $this->apartment = $apartment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.welcome')->with([
            'id'     => $this->apartment->id,
            'token'  => $this->apartment->token,
            'street' => $this->apartment->street,
        ]);
    }
}
