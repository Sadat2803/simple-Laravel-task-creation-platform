<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->longText('description');
            $table->enum('state',['pending','processing','finished']);
            $table->unsignedBigInteger('treated_by')->nullable();
            $table->unsignedBigInteger('range_id');
            $table->timestamps();

            $table->foreign('range_id')->references('id')->on('ranges');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('treated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
