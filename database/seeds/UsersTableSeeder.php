<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset users table
        DB::table('users')->truncate();

        // insert 3 users
        DB::table('users')->insert([
            [
                'name'=>'Faiz Abdillah',
                'email'=>'faiz@gmail.com',
                'password'=> bcrypt('12345'),
                'role_id'=> 1,
                'is_active'=> 1
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@getfast.com',
                'password'=> bcrypt('secret'),
                'role_id'=> 1,
                'is_active'=> 1
            ],
            [
                'name'=> 'User',
                'email'=> 'user@getfast.com',
                'password'=> bcrypt('secret'),
                'role_id'=> 2,
                'is_active'=> 1
            ],
        ]);
    }
}
