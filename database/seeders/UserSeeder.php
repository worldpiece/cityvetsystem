<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::table('users')->insert([
            'first_name' => 'jomari',
            'middle_name' => 'daep',
            'last_name' => 'bristol',
            'user_name' => 'admin',
            'roleId' => 1,
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
