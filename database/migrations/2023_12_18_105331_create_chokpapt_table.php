<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChokpaptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chokpapt', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->date('valananmakkk')->nullable();
            $table->string('character')->nullable();
            $table->integer('mairuuuuuuuu')->nullable();
            $table->float('ahraiwaaaaa')->nullable();
            $table->text('sabayjayyyjingjing')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chokpapt');
    }
}
