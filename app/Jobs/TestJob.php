<?php

namespace App\Jobs;

use DateTimeInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $message;

    /**
     * @var DateTimeInterface
     */
    private $timestamp;

    /**
     * Create a new job instance.
     * 
     * @param string $message
     *
     * @return void
     */
    public function __construct(string $message)
    {
        $this->message = $message;
        $this->timestamp = Carbon::now();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $random = rand(1, 5);

        sleep($random);

        Log::info(sprintf('Processed message "%s" queued at %s.', $this->message, $this->timestamp));

        if (3 === $random) {
            $this->fail();
        }
    }
}
