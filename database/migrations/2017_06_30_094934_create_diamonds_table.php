<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiamondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diamonds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('netPrice');
            $table->string('stock')->nullable();
            $table->bigInteger('certificate');
            $table->string('shape');
            $table->float('weight');
            $table->string('color');
            $table->string('clarity');
            $table->string('cut');
            $table->string('polish');
            $table->string('symmetry');
            $table->string('fluroscence');
            $table->string('lab');
            $table->string('location')->nullable();
            $table->text('imageLink')->nullable();
            $table->text('videoLink')->nullable();
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
        Schema::dropIfExists('diamonds');
    }
}
