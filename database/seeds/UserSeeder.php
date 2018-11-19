<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        $province = \App\Models\DistrictModel::where('pid', 0)->orderby(DB::raw('RAND()'))->first();
        $city = \App\Models\DistrictModel::where('pid', $province->id)->first();
        $area = \App\Models\DistrictModel::where('pid', $city->id)->first();
        $userList = [
            [
                'mobile' => '15701308875',
                'name' => 'hanyun',
                'password' => encrypt('123456'),
                'avatar' => '/img/dog.jpg',
                'motto' => '故天将降大任于斯人也，必先苦其心志，劳其筋骨，饿其体肤，空乏其身，行拂乱其所为，所以动心忍性，曾益其所不能',
                'bg' => '/img/dog.jpg',
                'school_id' => mt_rand(1, 50),
                'birth_day' => mt_rand(1980, date("Y")) . '-' . date('m-d'),
                'grade' => mt_rand(2000, date('Y')),
                'province' => $province->id,
                'city' => $city->id,
                'area' => $area->id
            ],
            [
                'mobile' => '15249698716',
                'name' => 'muyu',
                'password' => encrypt('123456'),
                'avatar' => '/img/dog.jpg',
                'school_id' => mt_rand(1, 50),
                'birth_day' => mt_rand(1980, date("Y")) . '-' . date('m-d'),
                'grade' => mt_rand(2000, date('Y')),
                'motto' => '故天将降大任于斯人也，必先苦其心志，劳其筋骨，饿其体肤，空乏其身，行拂乱其所为，所以动心忍性，曾益其所不能',
                'bg' => '/img/dog.jpg',
                'province' => $province->id,
                'city' => $city->id,
                'area' => $area->id
            ],
        ];
        foreach ($userList as $user) {
            \App\User::create($user);
        }
    }
}
