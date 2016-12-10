<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name'      => 'Ivan',
            'surname'   => 'Lopez',
            'email'     => 'ivan@lopez.com',
            'gender'    => 'Hombre'
        ]);
        factory(App\User::class, 50)
            ->create()
            ->each(function ($user) {
                $user->instrument()->save(factory(App\Instrument::class)->make());
                $user->band()->save(factory(App\Band::class)->make());
            });;
    }
}
