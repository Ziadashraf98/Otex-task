<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0 ; $i < 100 ; $i++)
        {
            DB::table('users')->insert([
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'password' => bcrypt('1973'),
            'admin' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at'=>now(),
            'updated_at'=>now(),
            // 'updated_at'=>date('Y-m-d H:i:s'),
           ]);
        }  
    }
}
