<?php

use Illuminate\Database\Seeder;
use App\Resolution;
use Carbon\Carbon;
use App\Suggestion;

class ResolutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resolutions = array(
            [
                'id' => 1,
                'number'=> 'R01',
                'title'=> 'Title of Samp resolution 01',
                'description' => 'Anti overloading',
                'authors' => 'Juan Dela Cruz',
                'date_approved_by_council' => Carbon::parse('2017-01-01'),
                'date_signed_by_vice_mayor' => Carbon::parse('2017-01-02'),
                'date_signed_by_mayor' => Carbon::parse('2017-01-02'),
            ],
            [
                'id' => 2,
                'number'=> 'R02',
                'title'=> 'Title of Samp resolution 01',
                'description' => 'No tresspassing',
                'authors' => 'Juan Ponce Enrille',
                'date_approved_by_council' => Carbon::parse('2017-01-02'),
                'date_signed_by_vice_mayor' => Carbon::parse('2017-01-03'),
                'date_signed_by_mayor' => null,
            ]
        );
        Resolution::insert($resolutions);

        /* Suggestion */
        $suggestions = array(
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


        /** Resolution Suggestion */
        $resolution_suggestion = array(
            [
                'resolution_id' => 1,
                'suggestion_id' => 4,
            ],
            [
                'resolution_id' => 1,
                'suggestion_id' => 5,
            ],
            [
                'resolution_id' => 2,
                'suggestion_id' => 6,
            ]
        );
        DB::table('resolution_suggestion')->insert($resolution_suggestion);

    }
}
