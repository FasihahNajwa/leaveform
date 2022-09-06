<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            [
                'name'=>'Accountant'
            ],[
                'name'=>'Chief Business Officer(CBO)'
            ],[
                'name'=>'Chief Executive Officer(CEO)'
            ],[
                'name'=>'Chief Technology Officer(CTO)'
            ],[
                'name'=>'Customer Service Officer'
            ],[
                'name'=>'Human Resources'
            ],[
                'name'=>'Internal Auditor'
            ],[
                'name'=>'Project Manager'
            ],[
                'name'=>'Software Developer'
            ],[
                'name'=>'Software Tester'
            ],[
                'name'=>'UI/UX Designer'
            ]
        ]);
    }
}
