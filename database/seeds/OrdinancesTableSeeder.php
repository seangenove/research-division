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
        // MARK NASA BABA YUNG SEEDERS KO
//        $ordinances = array(
//            [
//                'id' => 1,
//                'number'=> 'I',
//                'series'=> '2017',
//                'title'=> 'Pre Ordinance of Baguio City',
//                'keywords' => 'Test ordinance',
//                'is_monitoring' => 1,
//            ],
//            [
//                'id' => 2,
//                'number'=> 'ISM0K1NG',
//                'series'=> '2017',
//                'title'=> 'No Smoking',
//                'keywords' => 'Ordinance on NO Smoking',
//                'is_monitoring' => 1,
//            ]
//        );
//        Ordinance::insert($ordinances);
//
//        /** Ordinance Suggestions */
//        $ordinance_suggestions = array(
//            [
//                'ordinance_id' => 1,
//                'suggestion_id' => 1,
//            ],
//            [
//                'ordinance_id' => 1,
//                'suggestion_id' => 2,
//            ],
//            [
//                'ordinance_id' => 2,
//                'suggestion_id' => 3,
//            ]
//        );
//        DB::table('ordinance_suggestion')->insert($ordinance_suggestions);


        // ==============================================================================================
        // R&R Ordinances (2016 Ordinances 1-15)
        $researchAndRecordsOrdinances = array(
            [
                'id' => 1,
                'number'=> '1',
                'series'=> '2016',
                'title'=> 'AUTHORIZING THE ANNUAL BUDGET OF THE CITY OF BAGUIO FOR FISCAL YEAR 2016 
                IN THE TOTAL AMOUNT OF ONE BILLION SIX HUNDRED TWENTY-TWO MILLION NINE HUNDRED TEN 
                THOUSAND PESOS (P1.622,910,000.00) COVERING THE VARIOUS EXPENDITURES FOR THE OPERATION 
                FISCAL YEAR 2016 AND APPROPRIATING THE NECESSARY FUNDS FOR THE PURPOSE.',
                'keywords' => '2016, ANNUAL BUDGET, EXPENDITURES, FUNDS, FISCAL YEAR',
            ],
        );
        Ordinance::insert($researchAndRecordsOrdinances);


//         M&E Ordinances (2017 Ordinances 1-15)
//        $monitoringAndEvaluationOrdinances = array(
//            [
//                'id' => 1,
//                'number'=> '1',
//                'series'=> '2017',
//                'title'=> '',
//                'keywords' => '',
//                'is_monitoring' => 1,
//            ],
//        );
//        Ordinance::insert($monitoringAndEvaluationOrdinances);
        // ==============================================================================================

        /** Ordinance Suggestions */
        // MARK!!! NO NEED MO NA TONG LAGYAN
//        $ordinance_suggestions = array(
//            [
//                'ordinance_id' => 1,
//                'suggestion_id' => 1,
//            ],
//            [
//                'ordinance_id' => 1,
//                'suggestion_id' => 2,
//            ],
//            [
//                'ordinance_id' => 1,
//                'suggestion_id' => 3,
//            ]
//        );
//
//        DB::table('ordinance_suggestion')->insert($ordinance_suggestions);
    }
}
