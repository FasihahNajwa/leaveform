<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leave_types')->insert([
            [
                'name'=>'Annual'
            ],[
                'name'=>'Sick'
            ],[
                'name'=>'Emergency'
            ],[
                'name'=>'Unpaid'
            ],[
                'name'=>'Maternity'
            ],[
                'name'=>'Paternity'
            ],[
                'name'=>'Wedding'
            ],[
                'name'=>'Others'
            ]
        ]);
    }
}
