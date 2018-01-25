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
                'title'=> 'Pre Ordinance of Baguio City',
                'description' => 'Test ordinance',
                'authors' => 'Ricky Tan',
                'date_approved_by_council' => Carbon::parse('2017-01-01'),
                'date_signed_by_vice_mayor' => Carbon::parse('2017-01-02'),
                'date_signed_by_mayor' => Carbon::parse('2017-01-02'),
                'is_monitoring' => 1,
            ],
            [
                'id' => 2,
                'number'=> 'ISM0K1NG',
                'title'=> 'No Smoking',
                'description' => 'Ordinance on NO Smoking',
                'authors' => 'Ricky Tan',
                'date_approved_by_council' => Carbon::parse('2017-01-02'),
                'date_signed_by_vice_mayor' => Carbon::parse('2017-01-03'),
                'date_signed_by_mayor' => null,
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
