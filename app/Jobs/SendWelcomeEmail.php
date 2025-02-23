<?php

namespace App\Jobs;

use App\Mail\FounderWelcomeSubscribed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{
    use Queueable, Dispatchable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $email,
        public string $name,
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // TODO do a different email if they aren't subscribed
        Mail::to($this->email)->send(new FounderWelcomeSubscribed(
            name: $this->name,
        ));
    }
}
