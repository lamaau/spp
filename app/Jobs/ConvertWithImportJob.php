<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Modules\Utils\XlsxConverter;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ConvertWithImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected object $import;
    protected object $document;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(object $document, $import)
    {
        $this->import = $import;
        $this->document = $document;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $filename = (new XlsxConverter(uploaded_path($this->document->filename)))->convert();

        if (!is_null($filename)) {
            $this->import->queue($filename)->chain([
                new NotifyUserOfCompletedImport($this->document),
            ]);
        }
    }
}
