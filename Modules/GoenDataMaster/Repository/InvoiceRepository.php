<?php

namespace Modules\GoenDataMaster\Repository;

if (!interface_exists('InvoiceRepository')) {
    interface InvoiceRepository
    {
        /**
         * List of all invoices
         *
         * @return void
         */
        public function all(object $request);
    }
}
