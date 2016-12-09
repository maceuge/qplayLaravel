<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(InstrumentsTableSeeder::class);
        $this->call(BandsTableSeeder::class);
        $this->call(ComentsTableSeeder::class);
        $this->call(FriendsTableSeeder::class);
    }
}
