<?php

use Illuminate\Database\Seeder;

class CommunityActiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = \App\User::all();
        foreach ($user as $u) {
            foreach (range(1, 50) as $v) {
                $data = [];
                $data['community_id'] = mt_rand(1, 10);
                $data['user_id'] = $u->id;
                $data['title'] = str_random();
                $data['img_list'] = join(',', range(1, 5));
                \App\Models\CommunityActiveModel::create($data);
            }
        }
    }
}
