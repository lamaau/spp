<?php

namespace App\Listeners;

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
        $document = $event->getDocument();

        Bus::batch([
            new DocumentConverterJob($document),
            new DocumentImporterJob($document),
        ])->dispatch();
    }
}
