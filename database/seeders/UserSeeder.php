<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // for ($i = 0 ; $i < 10000 ; $i++)
        for ($i = 0 ; $i < 300 ; $i++)
        {
            DB::table('users')->insert([
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'password' => bcrypt('11111'),
            'admin' => 0,
            'email_verified_at' => now(),
            'remember_token' => str::random(10),
            'created_at'=>now(),
            'updated_at'=>now(),
            // 'updated_at'=>date('Y-m-d H:i:s'),
           ]);
        }  
    }
}
