<?php

use Illuminate\Database\Seeder;
use App\Suggestion;
use App\Ordinance;
use Carbon\Carbon;
class OrdinancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ordinances = array(
            [
                'id' => 1,
                'number'=> 'I',
                'series'=> '2017',
                'title'=> 'Pre Ordinance of Baguio City',
                'keywords' => 'Test ordinance',
                'is_monitoring' => 1,
            ],
            [
                'id' => 2,
                'number'=> 'ISM0K1NG',
                'series'=> '2017',
                'title'=> 'No Smoking',
                'keywords' => 'Ordinance on NO Smoking',
                'is_monitoring' => 1,
            ]
        );
        Ordinance::insert($ordinances);

        /** Ordinance Suggestions */
        $ordinance_suggestions = array(
            [
                'ordinance_id' => 1,
                'suggestion_id' => 1,
            ],
            [
                'ordinance_id' => 1,
                'suggestion_id' => 2,
            ],
            [
                'ordinance_id' => 2,
                'suggestion_id' => 3,
            ]
        );
        DB::table('ordinance_suggestion')->insert($ordinance_suggestions);
    }
}
