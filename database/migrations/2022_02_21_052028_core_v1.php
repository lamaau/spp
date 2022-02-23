<?php

use App\Enums\Gender;
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
            $table->string('fax')->unique();
            $table->string('logo');
            $table->tinyInteger('level')->comment(SchoolLevel::class);
            $table->string('principal')->unique();
            $table->string('principal_number')->unique();
            $table->string('treasurer')->comment('kepala sekolah');
            $table->string('treasurer_number')->unique()->comment('nip kepala sekolah');
            $table->tinyText('address');
            $table->commonFields();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('status')->default(UserStatus::ACTIVE())->comment(UserStatus::class);
            $table->datetime('last_active_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->tinyText('description')->nullable();
            $table->commonFields();
        });

        Schema::create('years', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('year');
            $table->tinyText('description')->nullable();
            $table->commonFields();
        });

        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignUuid('room_id');

            $table->string('nis')->unique()->nullable();
            $table->string('nisn')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->integer('religion')->comment(Religion::class);
            $table->integer('status')->comment(UserStatus::class);
            $table->integer('gender')->comment(Gender::class);
            $table->commonFields();

            $table->index('user_id');
        });

        Schema::create('student_has_room_histories', function (Blueprint $table) {
            $table->foreignUuid('student_id');
            $table->foreignUuid('room_id');

            $table->index(['student_id', 'room_id']);
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
    }
};
