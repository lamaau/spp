<?php

namespace App\Imports\Traits;

use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\ImportFailed;
use App\Notifications\ImportFailedNotification;
use App\Notifications\ImportSuccessNotification;

trait DocumentEventHandler
{
    public function registerEvents(): array
    {        
        $module = property_exists($this, 'module') ? $this->module : 'Dokumen';
        
        return [
            AfterImport::class => function (AfterImport $event) {
                $this->document->author->notify(new ImportSuccessNotification($this->document));
            },
            ImportFailed::class => function (ImportFailed $event) use ($module) {
                $this->document->author->notify(
                    new ImportFailedNotification(
                        $event->getException()->failures(),
                        "{$module} yang anda upload pada tanggal " .
                        \Carbon\Carbon::now()->translatedFormat('d F Y') .
                        ' pukul ' . \Carbon\Carbon::now()->translatedFormat('H:i:s') .
                        ' tidak dapat kami proses, mohon periksa kembali dokumen anda.',
                    )
                );
            }
        ];
    }
    
    public function startRow(): int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 200;
    }
}