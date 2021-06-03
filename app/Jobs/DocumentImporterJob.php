<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Modules\Document\Entities\Document;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Master\Imports\BillImport;
use Modules\Master\Imports\RoomImport;
use Modules\Master\Imports\SchoolYearImport;
use Modules\Master\Imports\StudentImport;

class DocumentImporterJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Document $document;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->document->model === '\Modules\Master\Entities\Room') {
            Excel::import(
                new RoomImport($this->document),
                uploaded_path($this->document->converted_filename)
            );
        }

        if ($this->document->model === '\Modules\Master\Entities\SchoolYear') {
            Excel::import(
                new SchoolYearImport($this->document),
                uploaded_path($this->document->converted_filename)
            );
        }

        if ($this->document->model === '\Modules\Master\Entities\Bill') {
            Excel::import(
                new BillImport($this->document),
                uploaded_path($this->document->converted_filename)
            );
        }

        if ($this->document->model === '\Modules\Master\Entities\Student') {
            Excel::import(
                new StudentImport($this->document),
                uploaded_path($this->document->converted_filename)
            );
        }
    }
}
