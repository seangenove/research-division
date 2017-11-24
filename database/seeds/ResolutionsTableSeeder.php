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
                'pdf_file_path' => 'hello_juan',
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
                'pdf_file_path' => 'hello_too',
                'date_approved_by_council' => Carbon::parse('2017-01-02'),
                'date_signed_by_vice_mayor' => Carbon::parse('2017-01-03'),
                'date_signed_by_mayor' => null,
            ]
        );
        Resolution::insert($resolutions);

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
