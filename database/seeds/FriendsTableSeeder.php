<?php

use Illuminate\Database\Seeder;

class FriendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userListId = App\User::pluck('id')->all();

        $index = 0;

        while($index < count($userListId)) {

            $user = App\User::find($userListId[$index]);

            if(count($user->friend) == 0) {
                $newFriend = new App\Friend();
                $newFriend-> user_id = $userListId[$index];
                $newFriend-> friend_id = $userListId[$index];
                $newFriend-> save();
            }

            $index ++;
        }

        factory(App\Friend::class, 20)->create();
    }
}
