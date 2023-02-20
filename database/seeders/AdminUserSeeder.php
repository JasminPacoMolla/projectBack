<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        public function run(){
            User::create([
                'name' => 'jasmin',
                'email' => 'admin1@gmail.com',
                'user_type'=>'admin',
                'password' => bcrypt('admin1'),
            ]);
            User::create([
                'name' => 'alfredo',
                'email' => 'admin2@gmail.com',
                'user_type'=>'admin',
                'password' => bcrypt('admin2'),
            ]);

        }

}
