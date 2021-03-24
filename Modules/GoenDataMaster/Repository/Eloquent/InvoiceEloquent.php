<?php

namespace Modules\GoenDataMaster\Repository\Eloquent;

use Modules\GoenDataMaster\Entities\Invoice;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\GoenDataMaster\Repository\InvoiceRepository;

class InvoiceEloquent implements InvoiceRepository
{
    protected $invoice;

    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Get list if invoice
     * 
     * @param  object $request
     * @return void
     */
    public function all(object $request)
    {
        return $this->invoice->orderBy($request->sortby, $request->sortbykey)->take(10)->get();
    }
}
