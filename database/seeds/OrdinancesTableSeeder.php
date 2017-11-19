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
            ]
        );
        Ordinance::insert($ordinances);

        /* Suggestion */
        $suggestions = array(
                [
                'id' => 1,
                'first_name'=> 'John',
                'last_name'=> 'Doe',
                'email' => 'johndoe@example.com',
                'suggestion' => 'Penalty should be increased',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'first_name'=> 'Jimmy',
                'last_name'=> 'Smith',
                'email' => 'johnsmitty@example.com',
                'suggestion' => 'Please increase the penalty',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'first_name'=> 'Ricardo',
                'last_name'=> 'Manalmas',
                'email' => 'rm@example.com',
                'suggestion' => 'Penalty is high',
                'created_at' => Carbon::now()
            ]
        );

        Suggestion::insert($suggestions);

        /** OrdinanceSuggestions */
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
