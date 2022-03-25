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
        Schema::create('breedpets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breedpets');
    }
};
