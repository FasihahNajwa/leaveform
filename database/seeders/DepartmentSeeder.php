<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'name'=>'Audit/Finance/Human Resources'
            ],[
                'name'=>'Business'
            ],[
                'name'=>'Customer Service'
            ],[
                'name'=>'Information Technology'
            ]
        ]);
    }
}

