<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'yasmin',
            'email' => 'yasmin@gmail.com',
            'user_type'=>'no premium',
            'password' => bcrypt('123456789'),
        ]);
        User::create([
            'name' => 'alfredo',
            'email' => 'alfredo@gmail.com',
            'user_type'=>'no premium',
            'password' => bcrypt('123456789'),
        ]);

        User::create([
            'name' => 'miguel',
            'email' => 'miguel@gmail.com',
            'user_type'=>'no premium',
            'password' => bcrypt('123456789'),
        ]);
    }
}
