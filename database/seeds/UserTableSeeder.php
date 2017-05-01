<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->realUsers();

    	$this->fakeUsers();
    }

    protected function realUsers() 
    {
        $user1 = new App\User();
    	$user1->email = 'sophiakurihara@gmail.com';
    	$user1->name = 'Sophia';
    	$user1->password = Hash::make('password123');
    	$user1->save();

    	$user2 = new App\User();
    	$user2->email = 'JaneDoe@codeup.com';
    	$user2->name = 'Jane';
    	$user2->password = Hash::make('password123');
    	$user2->save();

    }

    protected function fakeUsers()
    {
    	$faker = Faker\Factory::create();
        for($i = 0; $i < 10; $i++) {
            $user = new \App\User();
            $user->name = $faker->userName;
            $user->password = Hash::make($faker->password);
            $user->email = $faker->safeEmail;
            $user->save();
        }
    }
}