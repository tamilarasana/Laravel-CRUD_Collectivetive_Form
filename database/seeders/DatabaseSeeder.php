<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as  Facker;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Facker::create();
        foreach(range(1,100) as $index){
            DB::table('employee_details')->insert([
                'employee_id' => string("12334sdfjs"),
                'employee_name' => $faker -> employee_name,
                'employee_email' => $faker -> employee_email,
                'gender' => $faker -> gender,
                'date_of_birth' => $faker -> date_of_birth,
                'department' => $faker -> department,
                'employee_address' => $faker -> employee_address,
                'empolyee_image' => $faker -> empolyee_image,
               ]);
        }
        // \App\Models\User::factory(10)->create();
    }
}
