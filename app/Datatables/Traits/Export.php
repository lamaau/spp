<?php

namespace App\Datatables\Traits;

trait Export
{
    /**
     * Enable export PDF
     *
     * @var boolean
     */
    public $enabledExportPDF = true;

    /**
     * Enable export excel
     *
     * @var boolean
     */
    public $enabledExportEXCEL = true;

    /**
     * Report to pdf
     *
     * @return void
     */
    public function pdf()
    {
        // 
    }

    /**
     * Report to excel
     *
     * @return void
     */
    public function excel()
    {
        // 
    }
}
