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
            $table->string('email')->nullable()->unique();
            $table->string('phone')->nullable()->unique();
            $table->string('fax');
            $table->string('logo')->nullable();
            $table->string('code')->comment('kode sekolah');
            $table->integer('level')->comment('level sekolah');
            $table->string('principal')->comment('kepala sekolah');
            $table->string('principal_number')->comment('nip kepala sekolah');
            $table->bigInteger('province')->nullable();
            $table->bigInteger('city')->nullable();
            $table->bigInteger('district')->nullable();
            $table->bigInteger('sub_district')->nullable();
            $table->longText('address');
            $table->uuid('created_by')->index();
            $table->uuid('updated_by')->nullable()->index();
            $table->uuid('deleted_by')->nullable()->index();
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
