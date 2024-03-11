<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            ['name' => 'Eastern Cape', 'code' => 'EC'],
            ['name' => 'Free State', 'code' => 'FS'],
            ['name' => 'Gauteng', 'code' => 'GP'],
            ['name' => 'KwaZulu-Natal', 'code' => 'KZN'],
            ['name' => 'Limpopo', 'code' => 'LP'],
            ['name' => 'Mpumalanga', 'code' => 'MP'],
            ['name' => 'North West', 'code' => 'NW'],
            ['name' => 'Northern Cape', 'code' => 'NC'],
            ['name' => 'Western Cape', 'code' => 'WC'],
        ];

        DB::table('provinces')->insert($provinces);
    }
}
