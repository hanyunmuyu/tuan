<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
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
                'name' => 'hanyun',
                'password' => encrypt(123456),
                'avatar' => '/img/c.jpg'
            ],
            [
                'name' => 'muyu',
                'password' => encrypt(123456),
                'avatar' => '/img/c.jpg'
            ]
        ];
        foreach ($userList as $user) {
            \App\Admin::create($user);
        }
    }
}
