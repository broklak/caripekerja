<?php

namespace App\Mail;

use App\TransferConfirmation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Employer;
use App\PaymentMethod;
use App\TopupPackage;

class ConfirmTopup extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;
    public $package;
    public $confirm;
    public $employer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(TopupPackage $package, PaymentMethod $payment, TransferConfirmation $transferConfirmation, Employer $employer)
    {
        $this->package = $package;
        $this->payment = $payment;
        $this->confirm = $transferConfirmation;
        $this->employer = $employer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Konfirmasi Pembayaran Topup')
            ->view('mail.topup-confirm');
    }
}
