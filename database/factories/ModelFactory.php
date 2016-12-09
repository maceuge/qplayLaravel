<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('Ga123456'),
        'remember_token' => str_random(10),
        'surname' => $faker->lastName,
        'birthday' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'gender' => $faker->randomElement(['hombre', 'mujer', 'otro'])
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {

    // obtener todos user_ids desde la base de datos
    $usersListId = App\User::pluck('id')->all();

    return [
        'user_id' => $faker->randomElement($usersListId),
        'post' => $faker->text($maxNbChars=200)
    ];
});

$factory->define(App\Instrument::class, function (Faker\Generator $faker) {

    // obtener todos user_ids desde la base de datos
    $usersListId = App\User::pluck('id')->all();

    return [
        'user_id' => $faker->randomElement($usersListId),
        'instrument' => $faker->randomElement(['piano','guitarra electrica','bajo','bateria','percucion','violin','saxofon','piolin']),
        'level' => $faker->randomElement(['Principiante','Intermedio', 'Avanzado','Experto'])
    ];
});

$factory->define(App\Band::class, function (Faker\Generator $faker) {

    // obtener todos user_ids desde la base de datos
    $usersListId = App\User::pluck('id')->all();

    return [
        'user_id' => $faker->randomElement($usersListId),
        'band' => $faker->randomElement(['Petra','Guardian','P.O.D.','Babasonicos','Nueva Luna','Sombras','Las Sandalias','RM2'])
    ];
});

$factory->define(App\Coment::class, function (Faker\Generator $faker) {

    // obtener todos post_ids desde la base de datos
    $postsListId = App\Post::pluck('id')->all();
    // obtener todos user_ids desde la base de datos
    $usersListId = App\User::pluck('id')->all();

    return [
        'post_id' => $faker->randomElement($postsListId),
        'user_id' => $faker->randomElement($usersListId),
        'coment' => $faker->text($maxNbChars=80)
    ];
});

$factory->define(App\Friend::class, function (Faker\Generator $faker) {

    // obtener todos user_ids desde la base de datos
    $userListId = App\User::pluck('id')->all();

    $randomUserId = $faker->randomElement($userListId);

    $user = App\User::find($randomUserId);

    $friendsList = [];

    foreach ($user->friend as $friend) {
        array_push($friendsList, $friend->friend_id);
    }

    $newFriendList = [];

    $indexUser = 0;
    $indexFriend = 0;

    while($indexUser < count($userListId)) {

        while($indexFriend < count($friendsList) && $userListId[$indexUser] != $friendsList[$indexFriend]) {

            array_push($newFriendList, $userListId[$indexUser]);

            $indexFriend ++;
        }

        $indexFriend = 0;
        $indexUser ++;
    }

    //dd($newFriendList);

    return [
        'user_id' => $randomUserId,
        'friend_id' => $faker->randomElement($newFriendList)
    ];
});