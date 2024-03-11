<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QualificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qualifications = [
            ['name' => 'Diploma'],
            ['name' => 'Degree'],
            ['name' => 'Honors'],
            ['name' => 'Masters'],
            ['name' => 'PhD'],
        ];

        DB::table('qualifications')->insert($qualifications);
    }
}
