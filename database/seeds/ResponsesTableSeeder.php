<?php

use Illuminate\Database\Seeder;
use App\Response;
class ResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $responses = array(
            [
                'date' => \Carbon\Carbon::now(),
                'questionnaire_id'=> 1
            ],
            [
                'date' => \Carbon\Carbon::now(),
                'questionnaire_id'=> 1
            ]
        );
        Response::insert($responses);
    }
}
