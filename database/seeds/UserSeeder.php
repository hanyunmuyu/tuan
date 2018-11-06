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
        $data['mobile'] = '15701308875';
        $data['password'] = encrypt('123456');
        \App\User::create($data);
    }
}
