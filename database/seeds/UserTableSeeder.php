<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $users = [
            ['name' => 'Administrator', 'email' => 'admin@example.com', 'password' => bcrypt(123456), 'role' => 1],
            ['name' => 'Manager', 'email' => 'manager@example.com', 'password' => bcrypt(123456), 'role' => 2],
        ];

        foreach ($users as $user){
            \App\User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
        }
    }
}
