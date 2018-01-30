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
                'series'=> '2015',
                'title'=> 'Title of Samp resolution 01',
                'keywords' => 'Anti overloading',
                'pdf_file_path' => 'hello_juan',
                'is_monitoring' => 1,
            ],
            [
                'id' => 2,
                'number'=> 'R02',
                'series'=> '2016',
                'title'=> 'Title of Samp resolution 01',
                'keywords' => 'No tresspassing',
                'pdf_file_path' => 'hello_too',
                'is_monitoring' => 1,
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
