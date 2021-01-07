<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('time');
            $table->integer('guest_count')->default(1);
            $table->string('price');
            $table->boolean('status')->default(false);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->unsignedBigInteger('center_id');
            $table->foreign('center_id')->on('centers')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->unsignedBigInteger('chair_id')->nullable();
            $table->foreign('chair_id')->on('chairs')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');

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
        Schema::dropIfExists('reserves');
    }
}
