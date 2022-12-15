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
            $table->string('status')->default('Permohonan Baru');
            $table->longText('supporting_document')->nullable();
            $table->string ('approved_by')->nullable();
            $table->date ('approved_date')->nullable();
            $table->string('remarks_approval')->nullable();
            $table->string('supported_by')->nullable();
            $table->date ('supported_date')->nullable();
            $table->string('remarks_support')->nullable();
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
