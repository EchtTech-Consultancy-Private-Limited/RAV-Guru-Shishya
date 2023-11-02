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
        Schema::create('drug_history_logs', function (Blueprint $table) {
            $table->id();
            $table->json('data')->nullable();
            $table->foreignId('drug_id')->nullable();
            $table->foreignId('rasa_id')->nullable();
            $table->foreignId('vati_id')->nullable();
            $table->foreignId('taila_id')->nullable();
            $table->foreignId('aswa_id')->nullable();
            $table->foreignId('user_id');
            $table->integer('user_type');
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
        Schema::dropIfExists('drug_history_logs');
    }
};
