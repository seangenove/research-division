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
//        $resolutions = array(
//            [
//                'id' => 1,
//                'number'=> 'R01',
//                'series'=> '2015',
//                'title'=> 'Title of Samp resolution 01',
//                'keywords' => 'Anti overloading',
//                'pdf_file_path' => 'hello_juan',
//                'is_monitoring' => 1,
//            ],
//            [
//                'id' => 2,
//                'number'=> 'R02',
//                'series'=> '2016',
//                'title'=> 'Title of Samp resolution 01',
//                'keywords' => 'No tresspassing',
//                'pdf_file_path' => 'hello_too',
//                'is_monitoring' => 1,
//            ]
//        );
//        Resolution::insert($resolutions);

        $researchAndRecordsResolutions = array(
            [
                'id' => 1,
                'number'=> '1',
                'series'=> '2016',
                'title'=> 'APPROVING THE 2016 ANNUAL INVESTMENT PLAN (AIP) FOR BAGUIO CITY.',
                'keywords' => '2016, ANNUAL INVESTMENT PLAN, AIP',
            ],
            [
                'id' => 2,
                'number'=> '2',
                'series'=> '2016',
                'title'=> 'STRONGLY SUPPORTING THE CLAMOR OF THE MEMBERS OF THE COALITION OF UNIFORMED SERVICES RETIREES ORGANIZATION (CURSO), CORDILLERA CHAPTER, IN THEIR APPEAL TO THE CONGRESS OF THE PHILIPPINES FOR THE INCLUSION  AND APPROVAL IN THE INDEXATION OF THE PENSION BENEFITS OF RETIRED PERSONNEL OF THE PHILIPPINE NATIONAL POLICE, THE ARMED FORCES OF THE PHILIPPINES, THE BUREAU OF JAIL MANAGEMENT AND PENOLOGY, AND THE BUREAU OF FIRE PROTECTION WITH THE BASIC PAY OF THOSE IN THE ACTIVE SERVICE IN THE PROPOSED SALARY STANDARDIZATION LAW OF 2015.',
                'keywords' => '2016, COALITION OF UNIFORMED SERVICES RETIREES ORGANIZATION, CURSO, PENSION BENEFITS, PHILIPPINE NATIONAL POLICE, THE ARMED FORCES OF THE PHILIPPINES, THE BUREAU OF JAIL MANAGEMENT AND PENOLOGY, THE BUREAU OF FIRE PROTECTION, BASIC PAY',
            ],
            [
                'id' => 3,
                'number'=> '3',
                'series'=> '2016',
                'title'=> 'GRANTING FAVORABLE REVIEW OF BARANGAY BUDGETS FOR CALENDAR YEARS 2015 AND 2016.',
                'keywords' => '2016, BARANGAY, BUDGET, CALENDAR',
            ],
            [
                'id' => 4,
                'number'=> '4',
                'series'=> '2016',
                'title'=> 'APPROVING THE FREE USE OF THE BAGUIO CONVENTION CENTER BY THE BUILDERS CORNER FOR THE EVENT BUILDERS CORNER 2016 YEAR OF THE MONKEY BIG RACE WHERE THEY WILL BE HOSTING A TAMIYA MINI 4WD BIG RACE AND KIT SHOW ON 09 JANUARY 2016.',
                'keywords' => '2016, BUILDERS CORNER, FREE USE, BAGUIO CONVENTION CENTER',
            ],
            [
                'id' => 5,
                'number'=> '5',
                'series'=> '2016',
                'title'=> 'ACCREDITING THE CORDILLERA NETWORK DEVELOPMENT NGOs AND POs, INC. (CORDNET).',
                'keywords' => '2016, CORDILLERA NETWORK DEVELOPMENT NGOs AND POs INC., CORDNET',
            ],
            [
                'id' => 6,
                'number'=> '6',
                'series'=> '2016',
                'title'=> 'APPROVING THE REQUEST OF THE UNITED BODYBUILDERS OF NORTHERN LUZON INC (UBNLI) FOR THE FREE USE OF THE BAGUIO CONVENTION CENTER FOR THE MR. PANAGBENGA MUSCLE SHOWDOWN COMPETITION ON 26 FEBRUARY 2016.',
                'keywords' => '2016, UNITED BODYBUILDERS OF NORTHERN LUZON INC, UBNLI, FREE USE, BAGUIO CONVENTION CENTER',
            ],
            [
                'id' => 7,
                'number'=> '07',
                'series'=> '2016',
                'title'=> 'STRONGLY SUPPORTING HOUSE BILL NO. 180 [AN ACT CREATING THE BARANGAY PENSION FUND TO PROVIDE PENSION BENEFITS TO ALL BARANGAY OFFICIALS] INTRODUCED BY BAYAN MUNA PARTY LIST REPRESENTATIVES NERI J. COLMENARES AND CARLOS ISAGANI T. ZARATE.',
                'keywords' => '2016, HOUSE BIL NO. 180, BAYAN MUNA PARTY LIST, NERI J. COLMENARES, CARLOS ISAGANI T. ZARATE',
            ],
            
        );
        Resolution::insert($researchAndRecordsResolutions);
        $monitoringAndEvaluationResolutions = array(
//            [
//               'id' => 1,
//               'number'=> '1',
//               'series'=> '2017',
//               'title'=> '',
//                'keywords' => '',
//               'is_monitoring' => 1,
//            ],
            [
                'id' => 8,
                'number'=> '08',
                'series'=> '2016',
                'title'=> 'CONFIRMING THE MEMORANDUM OF AGREEMENT ENTERED INTO BY AND AMONG THE CITY GOVERNMENT OF BAGUIO, THROUGH THE CITY ENVIRONMENT AND PARKS MANAGEMENT OFFICE, LUALHATI BARANGAY, AND THE WRIGHT PARK PONY BOYS ASSOCIATION, RELATIVE TO THE PROTECTION AND CONSERVATION OF THE WRIGHT PARK AREA AND ITS VICINITY.',
                'keywords' => '2016, MEMORANDUM OF AGREEMENT, CITY GOVERNMENT OF BAGUIO, CITY ENVIRONMENT AND PARKS MANAGEMENT OFFICE, LUALHATI BARANGAY, THE WRIGHT PARK PONY BOYS ASSOCIATION, PROTECTION, CONSERVATION, WRIGHT PARK',
                'is_monitoring' => 1,
            ],
            [
                'id' => 9,
                'number'=> '9',
                'series'=> '2016',
                'title'=> 'GRANTING FAVORABLE REVIEW OF ORDINANCE NO. 004, SERIES OF 2015 [AN ORDINANCE PROHIBITING RESIDENTS FROM DRAINING WATER FROM THEIR SEPTIC TANKS ANYTIME OF THE YEAR MOST ESPECIALLY DURING HEAVY DOWN POUR OF RAINS], OF THE MIDDLE QUIRINO HILL BARANGAY, BAGUIO CITY.',
                'keywords' => '2016, ORDINANCE NO. 004 SERIES OF 2015, MIDDLE QUIRINO HILL',
                'is_monitoring' => 1,
            ],
            [
                'id' => 10,
                'number'=> '10',
                'series'=> '2016',
                'title'=> 'HIRING OF ONE (1) ADMINISTRATIVE AIDE III (CLERK I) ON CASUAL STATUS, FOR THE PERIOD JANUARY 2016 TO 30 JUNE 2016 IN THE CITY SOCIAL WELFARE AND DEVELOPMENT OFFICE.',
                'keywords' => '2016, ADMINISTRATIVE AIDE III, CLERK I, CASUAL STATUS, CITY SOCIAL WELFARE AND DEVELOPMENT OFFICE',
                'is_monitoring' => 1,
            ],
            [
                'id' => 11,
                'number'=> '11',
                'series'=> '2016',
                'title'=> 'HIRING OF THREE (3) NURSE II, SG-15/1; ONE (1) DENTAL AIDE IV, SG-4/1; ONE (1) LABORATORY AIDE II, SG-4/1; AND ONE (1) SANITATION INSPECTOR I, SG-6/1, ALL ON CASUAL STATUS FOR THE PERIOD JANUARY 2016 TO 30 JUNE 2016 IN THE CITY HEALTH SERVICES OFFICE.',
                'keywords' => '2016, NURSE II, DENTAL AIDE IV, LABORATORY AIDE II, SANITATION INSPECTOR I, SG, CITY HEALTH SERVICES OFFICE',
                'is_monitoring' => 1,
            ],
            [
                'id' => 12,
                'number'=> '12',
                'series'=> '2016',
                'title'=> 'GRANTING FAVORABLE REVIEW OF ORDINANCE NO. 01, SERIES OF 2015 [AN ORDINANCE ENACTING A COMPREHENSIVE BARANGAY TAX ORDINANCE IMPOSING TAXES OR BARANGAY FEES (BARANGAY CLEARANCE FEES, BARANGAY BUSINESS CLEARANCE FEES, CERTIFICATION FEES AND FILING FEES) AND CHARGES FOR SERVICE RENDERED WITHIN THE BARANGAY OF CABINET HILL-TEACHERS CAMP BARANGAY, BAGUIO CITY AND FOR OTHER PURPOSES.], OF CABINET HILL-TEACHER’S CAMP BARANGAY, BAGUIO CITY.',
                'keywords' => '2016, ORDINANCE NO. 001 SERIES OF 2015, CABINET HILL, TEACHERS CAMP',
                'is_monitoring' => 1,
            ],
            [
                'id' => 13,
                'number'=> '13',
                'series'=> '2016',
                'title'=> 'GRANTING FAVORABLE REVIEW OF ORDINANCE NO. 008, SERIES OF 2015 [AN ORDINANCE INSTITUTIONALIZING THE CONDUCT OF MASS FEEDING DURING BARANGAY OFFICIALS BIRTHDAYS], OF MIDDLE QUIRINO HILL BARANGAY, BAGUIO CITY.',
                'keywords' => '2016, ORDINANCE NO. 008 SERIES OF 2015, MIDDLE QUIRINO HILL',
                'is_monitoring' => 1,
            ],
            [
                'id' => 14,
                'number'=> '14',
                'series'=> '2016',
                'title'=> 'AUTHORIZING HON. MAURICIO G. DOMOGAN, CITY MAYOR, TO ENTER INTO A MEMORANDUM OF AGREEMENT WITH THE DIFFERENT PARTICIPATING NATIONAL LINE AGENCIES FOR THE IMPLEMENTATION OF THE LOCAL POVERTY REDUCTION ACTION PLAN (LPRAP) OF THE CITY BAGUIO FOR FISCAL YEAR 2016 UNDER THE GRASSROOTS PARTICIPATORY BUDGETING (GPB) PROCESS (FORMERLY CALLED BOTTOM-UP BUDGETING).',
                'keywords' => '2016, HON. MAURICIO G. DOMOGAN, CITY MAYOR, MEMORANDUM OF AGREEMENT, NATIONAL LINE AGENCIES, LOCAL POVERTY REDUCTION ACTION PLAN, LPRAP, FISCAL YEAR, GRASSROOTS PARTICIPATORY BUDGETING, GPB',
                'is_monitoring' => 1,
            ],
            [
                'id' => 15,
                'number'=> '15',
                'series'=> '2016',
                'title'=> 'STRONGLY APPEALING TO HIS EXCELLENCY, PRESIDENT BENIGNO SIMEON C. AQUINO III AND THE HONORABLE MEMBERS OF THE CONGRESS OF THE PHILIPPINES TO TAKE IMMEDIATE MEASURES TO ALLEVIATE THE PLIGHT OF INDIGIENT SOCIAL SECURITY SYSTEM (SSS) PENSIONERS.',
                'keywords' => '2016, PRESIDENT BENIGNO SIMEON C. AQUINO III, HONORABLE MEMBERS OF THE CONGRESS OF THE PHILIPPINES, SOCIAL SECURITY SYSTEM, SSS',
                'is_monitoring' => 1,
            ]
        );
        Resolution::insert($monitoringAndEvaluationResolutions);
        /** Resolution Suggestion */
//        $resolution_suggestion = array(
//            [
//                'resolution_id' => 1,
//                'suggestion_id' => 4,
//            ],
//            [
//                'resolution_id' => 1,
//                'suggestion_id' => 5,
//            ],
//            [
//                'resolution_id' => 2,
//                'suggestion_id' => 6,
//            ]
//        );
//        DB::table('resolution_suggestion')->insert($resolution_suggestion);

    }
}
