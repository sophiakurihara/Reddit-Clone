<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->info('Deleting users records');

        DB::table('posts')->delete();
        DB::table('users')->delete();
        DB::table('students')->delete();

        $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(StudentTableSeeder::class); 

        Model::reguard();

    }
}
