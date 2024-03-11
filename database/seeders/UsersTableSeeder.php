<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randomProvinceId = DB::table('provinces')->inRandomOrder()->first()->id;

        $admin  = [
            'name'              => 'Winnie',
            'username'          => 'admin',
            'surname'           => 'Nkwinika',
            'id_number'         => '8600000000000',
            'cell_number'       => '0730000000',
            'work_number'       => '0120000000',
            'email'             => 'admin@psira.co.za',
            'home_address'      => 'Fourways',
            'province_id'       => $randomProvinceId,
            'code'              => '1234',
            'email_verified_at' => now(),
            'password'          => Hash::make('HRPassword'),
            'cv_link'           => fake()->filePath()
        ];

        $adminId = DB::table('users')->insertGetId($admin);

        $role    = DB::table('roles')->where('name', 'admin')->first();

        DB::table('role_user')->insert([
            'user_id' => $adminId,
            'role_id' => $role->id,
        ]);

        User::factory()->count(2)->create()
            ->each(function ($user) {
                $roleCandidate = DB::table('roles')->where('name', 'candidate')->first();
                    DB::table('role_user')->insert([
                        'user_id' => $user->id,
                        'role_id' => $roleCandidate->id,
                    ]);
            });
    }
}
