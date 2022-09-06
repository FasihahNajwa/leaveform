<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReasonAndUserIdForeignToApplicationLeaves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_leaves', function (Blueprint $table) {
            $table->text('reason')->after('count');
            $table->unsignedBigInteger('user_id')->after('id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('application_leaves', function (Blueprint $table) {
            $table->dropColumn('reason');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
