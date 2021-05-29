<?php

namespace App\Jobs;

use App\Notifications\ImportSuccessNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class NotifyUserOfCompletedImport implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $uploaded;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($uploaded)
    {
        $this->uploaded = $uploaded;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->uploaded->author->notify(new ImportSuccessNotification($this->uploaded));
    }
}
