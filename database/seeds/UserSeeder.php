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
            ],
            [
                'mobile' => '15249698716',
                'name' => 'muyu',
                'password' => encrypt('123456'),
            ],
        ];
        foreach ($userList as $user) {
            \App\User::create($user);
        }
    }
}
