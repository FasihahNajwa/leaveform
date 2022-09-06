<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmployeeIdAndLeaveTypeIdToApplicationLeaves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_leaves', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id')->after('id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedBigInteger('leave_type_id')->after('id');
            $table->foreign('leave_type_id')->references('id')->on('leave_types')->onDelete('cascade');
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
            $table->dropForeign(['employee_id']);
            $table->dropForeign(['leave_type_id']);
        });
    }
}
