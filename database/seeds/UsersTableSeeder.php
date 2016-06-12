<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Markus Gray',
        	'username' => 'markusgray',
        	'email' => 'syncwarellc@gmail.com',
        	'password' => bcrypt('password')
        ]);

        User::create([
        	'name' => 'John Doe',
        	'username' => 'johndoe',
        	'email' => 'john@gmail.com',
        	'password' => bcrypt('password')
        ]);

        User::create([
        	'name' => 'Happy Go',
        	'username' => 'happy',
        	'email' => 'happy@gmail.com',
        	'password' => bcrypt('password')
        ]);
    }
}
