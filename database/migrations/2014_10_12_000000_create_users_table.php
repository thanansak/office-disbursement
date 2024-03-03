<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_code')->nullable()->comment('เลขประจำตัวผู้ใช้งาน');
            $table->string('slug');
            $table->unsignedBigInteger('prefix_id')->nullable()->comment('คำนำหน้าชื่อ');

            $table->string('firstname')->nullable()->comment('ชื่อ');
            $table->string('lastname')->nullable()->comment('นามสกุล');
            $table->string('phone')->nullable()->comment('เบอร์โทรศัพท์');
            $table->string('line_id')->nullable()->comment('ไอดีไลน์');

            $table->boolean('status')->default(1)->comment('สถานะการใช้งาน (0, 1)');

            $table->string('username')->unique()->comment('ชื่อผู้ใช้');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
};
