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
        Schema::create('product_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('ชื่อหน่วยนับ');
            $table->string('description')->nullable()->comment('รายละเอียดอื่นๆ');
            $table->string('slug');

            $table->boolean('publish')->default(1)->comment('สถานะ (0, 1)');
            $table->integer('sort')->default(0)->comment('ลำดับการแสดงผล');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_types');
    }
};
