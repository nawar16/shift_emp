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
        Schema::create('workers_shifts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('worker_id');
            $table->unsignedBigInteger('shift_id');
            $table->date('shift_day');
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
        Schema::dropIfExists('workers_shifts');
    }
};
