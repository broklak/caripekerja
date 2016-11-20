<?php

namespace App\Mail;

use App\Employer;
use App\PaymentMethod;
use App\TopupPackage;
use App\TopupTransaction;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TopupRequested extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;
    public $package;
    public $topup;
    public $employer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(TopupPackage $package, PaymentMethod $payment, TopupTransaction $topup, Employer $employer)
    {
        $this->package = $package;
        $this->payment = $payment;
        $this->topup = $topup;
        $this->employer = $employer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Detail Transaksi Topup CariPekerja')
                    ->view('mail.topup-requested');
    }
}
