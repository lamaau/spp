<?php

namespace Modules\GoenDataMaster\Http\Controllers\Api;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Serializer\JsonApiSerializer;
use Modules\GoenDataMaster\Repository\InvoiceRepository;
use Modules\GoenDataMaster\Transformers\InvoiceTransformers;
use Modules\Utils\Paginate;
use Spatie\Fractal\Facades\Fractal;

class InvoiceJsonController extends Controller
{
    protected $invoice;

    public function __construct(InvoiceRepository $invoice)
    {
        $this->invoice = $invoice;
    }

    public function invoices(Request $request)
    {
        $paginator = Paginate::set($this->invoice->all($request));
        $invoices  = $paginator->getCollection();

        return Fractal::create()
            ->collection($invoices, new InvoiceTransformers())
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();
    }
}
