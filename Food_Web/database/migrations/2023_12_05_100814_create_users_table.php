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
        Schema::create('users', function (Blueprint $table) {
            $table->id('User_Id');
            $table->string('User_Name')->nullable();
            $table->string('User_Email',100)->nullable()->unique();
            $table->string('User_Password')->nullable();
            $table->enum('User_Gender',["M","F","O"])->nullable();
            $table->date('User_DOB');
            $table->boolean('User_Status')->default(1);
            $table->integer('User_Pointes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
