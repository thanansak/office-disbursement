<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('disbursements', function (Blueprint $table) {
            $table->id();
            $table->string('disbursement_code')->nullable()->comment('รหัสการเบิก');
            $table->string('remark')->nullable()->comment('หมายเหตุ');
            $table->double('total_price')->nullable()->comment('ราคารวม');
            $table->double('qty')->nullable()->comment('จำนวนรวม');
            $table->string('slug');

            $table->boolean('status')->default(0)->comment('สถานะ (0 => pending, 1 => approved, 2 => eject)');
            $table->integer('sort')->default(0)->comment('ลำดับการแสดงผล');
            $table->unsignedBigInteger('created_by')->nullable()->comment('FK users');
            $table->unsignedBigInteger('updated_by')->nullable()->comment('FK users');
            $table->unsignedBigInteger('approved_by')->nullable()->comment('FK users');

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('approved_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disbursements');
    }
};
