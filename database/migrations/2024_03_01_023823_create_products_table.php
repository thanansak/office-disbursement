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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code')->nullable()->comment('รหัสสินค้า');
            $table->string('name')->nullable()->comment('ชื่อ');
            $table->string('description')->nullable()->comment('รายละเอียด');
            $table->double('price')->nullable()->comment('ราคาต่อชิ้น');
            $table->string('unit')->nullable()->comment('หน่วยนับ');
            $table->double('limit')->nullable()->comment('จำนวนที่สามารถเบิกได้');
            $table->string('slug');

            $table->boolean('publish')->default(1)->comment('สถานะ (0, 1)');
            $table->integer('sort')->default(0)->comment('ลำดับการแสดงผล');
            $table->unsignedBigInteger('product_type_id')->nullable()->comment('FK product_types');

            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
