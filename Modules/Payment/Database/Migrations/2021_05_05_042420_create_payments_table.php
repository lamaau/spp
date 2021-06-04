<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code')->comment('kode transaksi');
            $table->datetime('pay_date')->comment('tanggal pembayaran');
            $table->date('month')->nullable()->comment('bulan yang dibayar');
            $table->bigInteger('pay')->comment('pembayaran');
            $table->bigInteger('change')->nullable()->comment('kembalian');
            $table->bigInteger('mines')->nullable()->comment('kekurangan');
            $table->tinyInteger('status')->comment('status lunas atau tunggak');

            $table->uuid('year_id')->index();
            $table->uuid('student_id')->index();
            $table->uuid('bill_id')->index();
            $table->uuid('created_by')->index();
            $table->uuid('updated_by')->nullable()->index();
            $table->uuid('deleted_by')->nullable()->index();
            $table->softDeletes();
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
        Schema::dropIfExists('payments');
    }
}
