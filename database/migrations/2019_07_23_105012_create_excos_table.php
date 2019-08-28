<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excos', function (Blueprint $table) {
            $table->bigIncrements('exco_id');
            $table->text("passport");
            $table->string("surname");
            $table->string("other_names");
            $table->string("email")->uniqid();
            $table->integer("phone_number");
            $table->string("dept");
            $table->string("faculty");
            $table->unsignedBigInteger('unit_id')->references('unit_id')->on('units')->onDelete('cascade');
            $table->unsignedBigInteger('session_id')->references('session_id')->on('school_sessions')->onDelete('cascade');
            $table->unsignedBigInteger('position_id')->references('position_id')->on('positions')->onDelete('cascade');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excos');
    }
}
