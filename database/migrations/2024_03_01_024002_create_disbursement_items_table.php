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
        Schema::create('disbursement_items', function (Blueprint $table) {
            $table->id();

            $table->double('qty')->nullable()->comment('ราคาต่อชิ้น');
            $table->double('unit_price')->nullable()->comment('ราคาต่อชิ้น');
            $table->double('total_price')->nullable()->comment('ราคารวม');
            $table->string('remark')->nullable()->comment('หมายเหตุ');

            $table->unsignedBigInteger('product_id')->nullable()->comment('FK products');
            $table->unsignedBigInteger('disbursement_id')->nullable()->comment('FK disbursements');

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('disbursement_id')->references('id')->on('disbursements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disbursement_items');
    }
};
