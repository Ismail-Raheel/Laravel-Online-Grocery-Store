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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('Order_Id');
            $table->string('User_Name')->nullable();
            $table->string('User_Number')->nullable();
            $table->string('User_Email')->nullable();
            $table->string('Payment_Mothod')->nullable();
            $table->string('Flat')->nullable();
            $table->string('Street')->nullable()->default(0);
            $table->string('City')->nullable();
            $table->string('State')->nullable();
            $table->string('Country')->nullable();
            $table->integer('Pin_code')->nullable()->default(0);
            $table->string('Total_products')->nullable();
            $table->string('Total_price')->nullable();
            $table->unsignedBigInteger('User_Id');
            $table->foreign('User_Id')->references('User_Id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_orders');
    }
};
