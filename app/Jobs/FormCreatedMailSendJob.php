<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\FormCreatedMail;
use Illuminate\Support\Facades\Mail;

class FormCreatedMailSendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $form;

    /**
     * Create a new job instance.
     */
    public function __construct($form)
    {
        $this->form = $form;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('user@gmail.com')->send(new FormCreatedMail($this->$form));
    }
}
