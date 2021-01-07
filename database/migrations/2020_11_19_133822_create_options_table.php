<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('price');
            $table->text('description');
            $table->text('images');
            $table->boolean('is_remove')->default(false)->nullable();

            $table->unsignedBigInteger('center_id');
            $table->foreign('center_id')->on('centers')->references('id')->onDelete('CASCADE')->onUpdate('CASCADE');

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
        Schema::dropIfExists('options');
    }
}
