<?php

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
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
        foreach (range(0, 100) as $value) {
            $data = [];
            $data['school_name'] = '河南工业大学' . $value;
            $data['school_logo'] = $logo[mt_rand(0, 2)];
            \App\Models\SchoolModel::create($data);
        }
    }
}
