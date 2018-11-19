<?php

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $jsonStr = file_get_contents(__DIR__ . '/province.json');
        $json = json_decode($jsonStr, true);
        foreach ($json as $value) {
            $data = [];
            $data['code'] = $value['code'];
            $data['name'] = $value['name'];
            $res = \App\Models\DistrictModel::create($data);
            if (isset($value['sub']) && $value['sub']) {
                if ($res) {
                    foreach ($value['sub'] as $v) {
                        $second = [];
                        $second['code'] = $v['code'];
                        $second['name'] = $v['name'];
                        $second['pid'] = $res->id;
                        $sec = \App\Models\DistrictModel::create($second);


                        if (isset($v['sub']) && $v['sub']) {
                            if ($sec) {
                                foreach ($v['sub'] as $val) {
                                    $third = [];
                                    $third['code'] = $val['code'];
                                    $third['name'] = $val['name'];
                                    $third['pid'] = $sec->id;
                                    \App\Models\DistrictModel::create($third);
                                }
                            }
                        }


                    }
                }
            }
        }
    }
}
