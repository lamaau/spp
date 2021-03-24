<?php

namespace Modules\GoenDataMaster\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\GoenDataMaster\Entities\Invoice;
use Modules\GoenDataMaster\Constants\Payment;

class InvoiceTransformers extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Invoice $invoice)
    {
        return [
            'id' => $invoice->id,
            'code' => $invoice->code,
            'invoice_date' => $invoice->invoice_date,
            'invoice_due' => $invoice->invoice_due,
            'invoice' => idr($invoice->invoice),
            'status' => Payment::label($invoice->status),
        ];
    }
}
