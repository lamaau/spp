<?php

namespace Modules\Master\Observer;

use Illuminate\Support\Facades\Auth;
use Modules\Master\Entities\FormatFile;

class FormatFileObserver
{
    public function creating(FormatFile $model)
    {
        $model->fill([
            'created_by' => Auth::id(),
        ]);
    }

    public function updating(FormatFile $model)
    {
        $model->fill([
            'updated_by' => Auth::id(),
        ]);
    }

    public function deleting(FormatFile $model)
    {
        $model->fill([
            'deleted_by' => Auth::id(),
        ]);
    }
}
