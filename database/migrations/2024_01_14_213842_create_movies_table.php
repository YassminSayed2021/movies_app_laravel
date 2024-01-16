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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
           
            $table->string('mtitle');
            $table->string('desc');
            $table->double('rate');
            $table->string('image')->nullable();

            //foregin key coulmn
           // $table->unsignedBigInteger('category_id');
            //relation between tables
           // $table->foreignId('category_id')->references('id')->on('categories');
                     
            

            

           
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
