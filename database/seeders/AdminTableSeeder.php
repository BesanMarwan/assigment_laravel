<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'BesanMarwan',
            'email' => 'besanmarwan2000@gmail.com',
            'password' => bcrypt('123456'),
        ]);


    }
}
