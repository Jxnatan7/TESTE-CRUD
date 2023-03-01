<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelBovinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bovinos', function (Blueprint $table) {
            $table->id();
            $table->integer("codigo");
            $table->integer("leiteProduzido");
            $table->integer("peso");
            $table->integer("racaoConsumida");
            $table->date("data_nasc");
            $table->boolean("abatido");
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
        Schema::dropIfExists('bovinos');
    }
}
