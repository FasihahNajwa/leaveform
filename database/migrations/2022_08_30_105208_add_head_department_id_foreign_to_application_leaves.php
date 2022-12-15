<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHeadDepartmentIdForeignToApplicationLeaves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_leaves', function (Blueprint $table) {
            $table->unsignedBigInteger('head_department_id')->nullable()->after('leave_type_id');
            $table->foreign('head_department_id')->references('id')->on('head_departments')->onDelete('cascade');
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
            $table->dropForeign(['head_department_id']);
            $table->dropColumn('head_department_id');
        });
    }
}
