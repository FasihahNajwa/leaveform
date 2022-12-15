<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entitlements_', function (Blueprint $table) {
            $table->id();
            $table->integer('applicable_leave');
            $table->integer('total_applied_leave');
            $table->integer('remaining_leave');
            $table->timestamps();
        });

        Schema::rename('entitlements_', 'entitlements');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entitlements');
    }
}
