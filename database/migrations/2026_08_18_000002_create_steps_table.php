<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->string('step_num'); // e.g. '01', '02', '10'
            $table->string('title');
            $table->string('icon')->nullable(); // FontAwesome class
            $table->string('color_gradient')->nullable(); // e.g. 'linear-gradient(135deg,#e07a5f,#f4a261)'
            $table->tinyInteger('row_position')->default(1); // 1 = Row 1 (01-05), 2 = Row 2 (06-10)
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('steps');
    }
}
