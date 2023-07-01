<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('image_id')->unsigned()->index()->nullable();
            $table->string('name');
            $table->string('slug');
            $table->text('bio')->nullable();
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
        Schema::dropIfExists('Tendors');
    }
}
