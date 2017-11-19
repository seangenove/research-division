<?php

use Illuminate\Database\Seeder;

class SuggestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suggestions = array(
            /* For Ordinance */
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
            ],
            /* For Resolution */
            [
                'id' => 4,
                'first_name'=> 'Junana',
                'last_name'=> 'Change',
                'email' => 'johndoe@example.com',
                'suggestion' => 'This is great',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'first_name'=> 'Alan',
                'last_name'=> 'Peters',
                'email' => 'johnsmitty@example.com',
                'suggestion' => 'Anti-overloading should be not only locally but also nationally',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'first_name'=> 'Rodrigo',
                'last_name'=> 'Duterte',
                'email' => 'rm@example.com',
                'suggestion' => 'This is a nice resolution!',
                'created_at' => Carbon::now()
            ]
        );

        Suggestion::insert($suggestions);
    }
}
