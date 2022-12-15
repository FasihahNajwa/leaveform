<?php

namespace Database\Seeders;

use App\Models\LeaveType;
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
        LeaveType::updateOrCreate([
            'id' => '1',
        ], [
            'name' => 'Tahunan',
        ]);

        LeaveType::updateOrCreate([
            'id' => '2',
        ], [
            'name' => 'Sakit',
        ]);

        LeaveType::updateOrCreate([
            'id' => '3',
        ], [
            'name' => 'Kecemasan',
        ]);

        LeaveType::updateOrCreate([
            'id' => '4',
        ], [
            'name' => 'Tanpa Gaji',
        ]);

        LeaveType::updateOrCreate([
            'id' => '5',
        ], [
            'name' => 'Bersalin',
        ]);

        LeaveType::updateOrCreate([
            'id' => '6',
        ], [
            'name' => 'Menyambut Kelahiran (Bapa)',
        ]);

        LeaveType::updateOrCreate([
            'id' => '7',
        ], [
            'name' => 'Perkahwinan',
        ]);

        LeaveType::updateOrCreate([
            'id' => '8',
        ], [
            'name' => 'Ihsan',
        ]);

        LeaveType::updateOrCreate([
            'id' => '9',
        ], [
            'name' => 'Lain-lain',
        ]);

        // DB::table('leave_types')->insert([
        //     [
        //         'name'=>_('Tahunan')
        //     ],[
        //         'name'=>'Sakit'
        //     ],[
        //         'name'=>'Kecemasan'
        //     ],[
        //         'name'=>'Tanpa Gaji'
        //     ],[
        //         'name'=>'Bersalin'
        //     ],[
        //         'name'=>'Menyambut Kelahiran (Bapa)'
        //     ],[
        //         'name'=>'Perkahwinan'
        //     ],[
        //         'name'=>'Ihsan'
        //     ],[
        //         'name'=>'Lain-lain'
        //     ]
        // ]);
    }
}
