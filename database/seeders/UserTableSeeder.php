<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use DB;
use Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Anandito',
            'email' => 'anandito@sia.net',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(20)
        ]);
    }
}
