<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Testmail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $details = $this->details;
        return $this->from("vyshnavi18.devi@gmail.com")->view('sendmail')->with([
            "email" => $details["email"],
            "orderId" => $details["orderId"],
            "product_name" => $details["product_name"],
            "price" => $details["product_price"],
            "quantity" => $details["product_quantity"],
            "amount" => $details["amount"]
        ]);
    }
}
