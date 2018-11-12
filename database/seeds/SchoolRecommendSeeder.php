<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolRecommendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $schoolList = \App\Models\SchoolModel::orderby(DB::raw('RAND()'))
            ->limit(6)
            ->get();
        foreach ($schoolList as $value) {
            \App\Models\SchoolRecommendModel::create(['school_id' => $value->id]);
        }
    }
}
