<?php

use Illuminate\Database\Seeder;
use App\Ordinance;
use App\OrdinanceSuggestions;
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
                'authors' => 'Ricky Tan'
            ],
            [
                'id' => 2,
                'number'=> 'ISM0K1NG',
                'title'=> 'No Smoking',
                'description' => 'Ordinance on NO Smoking',
                'authors' => 'Ricky Tan'
            ]
        );
        Ordinance::insert($ordinances);

        /** OrdinanceSuggestions */
        $suggestions = array(
            [
                'first_name'=> 'John',
                'last_name'=> 'Doe',
                'email' => 'johndoe@example.com',
                'suggestion' => 'Penalty should be increased',
                'ordinance_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'first_name'=> 'Jimmy',
                'last_name'=> 'Smith',
                'email' => 'johnsmitty@example.com',
                'suggestion' => 'The penalty is low',
                'ordinance_id' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'first_name'=> 'Ricardo',
                'last_name'=> 'Manalmas',
                'email' => 'rm@example.com',
                'suggestion' => 'Penalty should be increased',
                'ordinance_id' => 2,
                'created_at' => Carbon::now()
            ]
        );
        OrdinanceSuggestions::insert($suggestions);
    }
}
