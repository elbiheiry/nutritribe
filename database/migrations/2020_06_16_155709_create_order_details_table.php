<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('age');
            $table->string('weight');
            $table->string('height');
            $table->text('notes');
            $table->string('waist');
            $table->string('body');
            $table->string('reason');
            $table->string('history');
            $table->string('why')->nullable();
            $table->text('medications');
            $table->text('vitamins');
            $table->string('exercise');
            $table->string('kind_of_exercise');
            $table->string('home');
            $table->string('enjoy');
            $table->string('surgeries');
            $table->string('allergies');
            $table->text('intention');
            $table->text('diary');
            $table->unsignedBigInteger('order_id')->index();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('order_details');
    }
}
