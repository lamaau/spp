<?php

namespace App\Listeners;

use Illuminate\Bus\Batch;
use App\Events\DocumentCreated;
use App\Events\DocumentImportedComplete;
use App\Jobs\DocumentConverterJob;
use App\Jobs\DocumentImporterJob;
use Illuminate\Support\Facades\Bus;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateImportBatch implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(DocumentCreated $event)
    {
        Bus::batch([
            new DocumentConverterJob($event->getDocument()),
            new DocumentImporterJob($event->getDocument()),
        ])
        ->finally(function (Batch $batch) use ($event) {
            DocumentImportedComplete::dispatch($event->getDocument());
        })
        ->dispatch();
    }
}
