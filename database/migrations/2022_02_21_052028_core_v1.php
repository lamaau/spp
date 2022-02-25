<?php

use App\Enums\Gender;
use App\Enums\Status;
use App\Enums\BillType;
use App\Enums\Religion;
use App\Enums\UserStatus;
use App\Enums\SchoolLevel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CoreV1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        if (!Schema::hasTable('personal_access_tokens')) {
            Schema::create('personal_access_tokens', function (Blueprint $table) {
                $table->id();
                $table->morphs('tokenable');
                $table->string('name');
                $table->string('token', 64)->unique();
                $table->text('abilities')->nullable();
                $table->timestamp('last_used_at')->nullable();
                $table->timestamps();
            });
        }

        Schema::create('schools', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('npsn')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('fax')->unique()->nullable();
            $table->string('logo');
            $table->tinyInteger('level')->comment(SchoolLevel::class);
            $table->tinyInteger('status')->default(Status::ACTIVE())->comment(Status::class);
            $table->string('principal')->unique();
            $table->string('principal_number')->unique();
            $table->string('treasurer');
            $table->string('treasurer_number')->unique()->nullable();
            $table->tinyText('address');
            $table->commonFields();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('username');
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('status')->default(UserStatus::ACTIVE())->comment(UserStatus::class);
            $table->datetime('last_login_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // using morphToMany
        Schema::create('user_schools', function (Blueprint $table) {
            $table->foreignUuid('user_id');
            $table->foreignUuid('school_id');
            $table->string('user_type');

            $table->primary(['user_id', 'school_id', 'user_type']);
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->schoolFields();

            $table->string('name');
            $table->tinyText('description')->nullable();
            $table->commonFields();
        });

        Schema::create('years', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->schoolFields();

            $table->string('year');
            $table->tinyText('description')->nullable();
            $table->commonFields();
        });

        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->schoolFields();

            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('nis')->unique()->nullable();
            $table->string('nisn')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->integer('religion')->comment(Religion::class);
            $table->integer('status')->comment(UserStatus::class);
            $table->integer('gender')->comment(Gender::class);
            $table->commonFields();

            $table->index('user_id');
        });

        Schema::create('bills', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->schoolFields();

            $table->double('amount');
            $table->tinyInteger('type')->comment(BillType::class);
            $table->string('name');
            $table->tinyText('description');
            $table->commonFields();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('users');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('years');
        Schema::dropIfExists('students');
        Schema::dropIfExists('bills');
    }
};
