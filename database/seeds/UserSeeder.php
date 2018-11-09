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
        //
        $userList = [
            [
                'mobile' => '15701308875',
                'name' => 'hanyun',
                'password' => encrypt('123456'),
                'avatar' => '/img/dog.jpg',
                'motto' => '故天将降大任于斯人也，必先苦其心志，劳其筋骨，饿其体肤，空乏其身，行拂乱其所为，所以动心忍性，曾益其所不能',
                'bg' => '/img/dog.jpg',
            ],
            [
                'mobile' => '15249698716',
                'name' => 'muyu',
                'password' => encrypt('123456'),
                'avatar' => '/img/dog.jpg',
                'motto' => '故天将降大任于斯人也，必先苦其心志，劳其筋骨，饿其体肤，空乏其身，行拂乱其所为，所以动心忍性，曾益其所不能',
                'bg' => '/img/dog.jpg',
            ],
        ];
        foreach ($userList as $user) {
            \App\User::create($user);
        }
    }
}
