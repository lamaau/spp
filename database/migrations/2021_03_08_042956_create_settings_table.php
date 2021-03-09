<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('fax');
            $table->string('code')->comment('kode sekolah');
            $table->integer('level')->comment('level sekolah');
            $table->string('principal')->comment('kepala sekolah');
            $table->string('principal_number')->comment('nip kepala sekolah');
            $table->bigInteger('province');
            $table->bigInteger('city');
            $table->bigInteger('district');
            $table->bigInteger('sub_district');
            $table->bigInteger('detail_address');
            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
