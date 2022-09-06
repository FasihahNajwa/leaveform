<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_leaves', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('count');
            $table->text('string');
            $table->boolean('is_approve');
            $table->string('attachment_path');
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
        Schema::dropIfExists('application_leaves');
    }
}
