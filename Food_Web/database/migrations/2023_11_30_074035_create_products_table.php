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
            $table->id('Product_Id');
            $table->string('Product_Name');
            $table->integer('Product_Price');
            $table->integer('Product_Qty');
            $table->string('Product_Image')->nullable();;
            $table->text('Product_Des');
            $table->integer('Discount_Price')->nullable()->default(0);
            $table->dateTime('Discount_Date')->nullable();
            $table->string('Product_code');
            $table->unsignedBigInteger('Category_Id');
            $table->foreign('Category_Id')->references('Category_ID')->on('categories')->onUpdate('cascade')->onDelete('cascade');
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
