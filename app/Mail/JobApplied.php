<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Job;
use App\Employer;
use App\User;

class JobApplied extends Mailable
{
    use Queueable, SerializesModels;

    public $job;
    public $employer;
    public $worker;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Job $job, Employer $employer, User $worker)
    {
        $this->job = $job;
        $this->employer = $employer;
        $this->worker = $worker;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Pekerja melamar ke lowongan pekerjaan anda')
                    ->view('mail.job-applied');
    }
}
