<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('setting_id');
            $table->bigInteger('invoice');
            $table->string('code')->comment('Invoice code');
            $table->date('invoice_date')->comment('Invoice pembayaran');
            $table->date('invoice_due')->comment('Invoice jatuh tempo');
            $table->integer('status')->comment('Payment status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
