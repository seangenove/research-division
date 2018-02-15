<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Suggestion;

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
                'first_name'=> 'Jun',
                'last_name'=> 'Ramos',
                'email' => 'jramos@gmail.com',
                'suggestion' => 'Budget well spent!',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'first_name'=> 'Maria',
                'last_name'=> 'Santiago',
                'email' => 'santiagomaria@yahoo.com',
                'suggestion' => 'This is good news for us taxpayers',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'first_name'=> 'Ricardo',
                'last_name'=> 'Manalmas',
                'email' => 'rm@gmail.com',
                'suggestion' => 'Nice to hear that the government is not wasting money.',
                'created_at' => Carbon::now()
            ],
            /* For Resolution */
            [
                'id' => 4,
                'first_name'=> 'Lea',
                'last_name'=> 'Uy',
                'email' => 'uy.lea@gmail.com',
                'suggestion' => 'This is great!',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'first_name'=> 'Fred',
                'last_name'=> 'Alangdeo',
                'email' => 'freddie@yahoo.com',
                'suggestion' => 'More tourism!',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'first_name'=> 'Veronica',
                'last_name'=> 'Duterte',
                'email' => 'veronicaduterte@gmail.com',
                'suggestion' => 'Conserving nature is a great thing to act upon especially people visit this park often.',
                'created_at' => Carbon::now()
            ]
        );

        Suggestion::insert($suggestions);
    }
}
