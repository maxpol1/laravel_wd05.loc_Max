<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class FirstJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//    public function  setQueue(?string $queue): void
//    {
//        $this->queue = $queue;
//    }

//    public $queue = 'myEmails';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $emailMessage;

    public $tries = 5;


    public function __construct($emailMessage)
    {
        $this-> queue = 'myEmails';
        $this->emailMessage = $emailMessage;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mail = new \App\Mail\FirstMail($this->emailMessage );
        Mail::send($mail);
    }
}
