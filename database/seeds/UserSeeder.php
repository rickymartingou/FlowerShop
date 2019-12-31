<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'phone' => 12312312312,
            'gender' => 'male',
            'address' => 'admin street at gmail dot kom',
            'image' => 'admin.png',
            'role' => 'Admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Member',
            'email' => 'member@gmail.com',
            'password' => bcrypt('member'),
            'phone' => 12312312312,
            'gender' => 'male',
            'address' => 'member street at gmail dot kom',
            'image' => 'tzuyu.jpg',
            'role' => 'Member'
        ]);
    }
}
