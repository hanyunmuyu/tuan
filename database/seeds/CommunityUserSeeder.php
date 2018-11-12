<?php

use Illuminate\Database\Seeder;

class CommunityUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userList = \App\User::orderby('id', 'desc')->limit(20)->get();
        $userIdList = [];
        foreach ($userList as $user) {
            $userIdList[] = $user->id;
        }

        $communityList = \App\Models\CommunityModel::orderby(\Illuminate\Support\Facades\DB::raw("Rand()"))
            ->get();
        foreach ($communityList as $community) {
            $data['user_id'] = $userIdList[mt_rand(0, count($userIdList)-1)];
            $data['community_id'] = $community->id;
            \App\Models\CommunityUserModel::create($data);

        }
    }
}
