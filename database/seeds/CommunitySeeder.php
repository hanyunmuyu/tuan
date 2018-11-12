<?php

use Illuminate\Database\Seeder;

class CommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $logo = [
            '/img/a.jpg',
            '/img/b.jpg',
            '/img/c.jpg',
        ];
        $max = \App\Models\SchoolModel::max('id');
        foreach (range(1, 200) as $value) {
            $data = [];

            $data['community_name'] = '社团名字-' . $value;
            $data['community_logo'] = $logo[mt_rand(0, 2)];
            $data['school_id'] = mt_rand(1, $max);

            \App\Models\CommunityModel::create($data);
        }
    }
}
