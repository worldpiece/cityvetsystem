<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pets')->insert([
            'pet_name' => Str::random(10),
            'gender' => 'Male',
            'date_of_birth' => Carbon::create('2000', '01', '01'),
            'age' => 5,
            'owner_id' => 1,
            'pet_classification' => 'Cat'
        ]);
    }
}
