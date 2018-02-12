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
                'title'=> 'AUTHORIZING THE ANNUAL BUDGET OF THE CITY OF BAGUIO FOR FISCAL YEAR 2016 IN THE TOTAL AMOUNT OF ONE BILLION SIX HUNDRED TWENTY-TWO MILLION NINE HUNDRED TEN THOUSAND PESOS (P1.622,910,000.00) COVERING THE VARIOUS EXPENDITURES FOR THE OPERATION FISCAL YEAR 2016 AND APPROPRIATING THE NECESSARY FUNDS FOR THE PURPOSE.',
                'keywords' => '2016, ANNUAL BUDGET, EXPENDITURES, FUNDS, FISCAL YEAR',
            ],
            [
                'id' => 2,
                'number'=> '2',
                'series'=> '2016',
                'title'=> 'APPROVING THE TEMPORARY CLOSURE AND USE OF VARIOUS ROADS IN THE CITY OF BAGUIO FOR THE 2016 PANAGBENGA FESTIVAL.',
                'keywords' => '2016, TEMPORARY CLOSURE, PANAGBENGA FESTIVAL',
            ],
            [
                'id' => 3,
                'number'=> '3',
                'series'=> '2016',
                'title'=> 'APPROVING THE USE OF THE REMAINING BALANCE UNDER ACCOUNT CODE NO. 766 IN THE 2015 BUDGET OF THE BAGUIO CITY FIRE STATION FOR THE PAYMENT OF ARREARS OF WATER BILLS IN THE AMOUNT OF Php11,667.00.',
                'keywords' => '2016, BALANCE, ACCOUNT CODE NO. 766, BUDGET, BAGUIO CITY FIRE STATION, ARREARS',
            ],
            [
                'id' => 4,
                'number'=> '4',
                'series'=> '2016',
                'title'=> 'APPROVING THE REQUEST OF INNOVATORS MARKETING/EVENTS FOR WAIVER OF AMUSEMENT TAX FOR THE ELEVATE-Electronic Music Festival AT THE PARKING LOT OF THE BAGUIO CONVENTION CENTER ON 05 MARCH 2016.',
                'keywords' => '2016, INNOVATORS, WAIVER, AMUSEMENT TAX, ELEVATE, BAGUIO CONVENTION CENTER',
            ],
            [
                'id' => 5,
                'number'=> '5',
                'series'=> '2016',
                'title'=> 'APPROVING THE REQUESTS OF WALTRIX PRODUCTIONS AND OVATION PRODUCTIONS FOR WAIVER OF AMUSEMENT TAX, FOR WAIVER OF FEES FOR INSTALLATION OF MARKETING COLLATERAL MATERIALS, AND FOR THE ISSUANCE OF SPECIAL PERMITS FOR THE CONCERT BOYCE AVENUE AT THE UNIVERSITY OF BAGUIO GYM ON 22 FEBRUARY 2016.',
                'keywords' => '2016, WALTRIX, OVATION, AMUSEMENT TAX, PERMITS, BOYCE AVENUE, UNIVERSITY OF BAGUIO, WAIVER',
            ],
            [
                'id' => 6,
                'number'=> '6',
                'series'=> '2016',
                'title'=> 'APPROVING THE REQUEST OF CONCOCTIONS BAR AND RESTO FOR EXEMPTION FROM THE PAYMENT OF AMUSEMENT TAX FOR THE EVENT ENTITLED "CONCOCTION PRESENTS: FRANCO" FEATURING A RISING NATIONAL ARTIST AND THE AUTO AND BIKE SHOW AT THE BAGUIO CONVENTION CENTER on 06 TO 07 FEBRUARY 2016.',
                'keywords' => '2016, CONCOCTIONS BAR AND RESTO, AMUSEMENT TAX, FRANCO, NATIONAL ARTIST, AUTO AND BIKE SHOW, BAGUIO CONVENTION CENTER',
            ],
            [
                'id' => 7,
                'number'=> '7',
                'series'=> '2016',
                'title'=> 'APPROVING THE REQUESTS OF THE MEMOIRS EVENTS ORGANIZING AND SUPPLIES SPECIALIST FOR THE EXEMPTION FROM THE PAYMENT OF AMUSEMENT TAX AND OTHER CITY FEES AND FOR THE FREE USE OF BAGUIO CONVENTION CENTER FOR THEIR MUSICAL DRAMA "#POPEPULAR, PAANO KUNG PINOY SI KIKO?" ON 18 TO 21 JANUARY 2016.',
                'keywords' => '2016, MEMOIRS EVENTS ORGANIZING AND SUPPLIES SPECIALIST, AMUSEMENT TAX, OTHER CITY FEES, FREE USE, BAGUIO CONVENTION CENTER',
            ],
            //first half of the 2017 ordinances
            [
                'id' => 16,
                'number'=> '1',
                'series'=> '2017',
                'title'=> 'GRANTING AMNESTY OR RELIEF ON PENALTIES, FINES, SURCHARGES, INTERESTS, AND/OR ARREARS TO DELINQUENT REAL PROPERTY TAXPAYERS (THE 2017 REAL PROPERTY TAX AMNESTY ORDINANCE OF THE CITY OF BAGUIO)',
                'keywords' => '2017, TAXPAYERS, REAL PROPERTY TAX AMNESTY ORDINANCE',
            ],
            [
                'id' => 17,
                'number'=> '2',
                'series'=> '2017',
                'title'=> 'APPROVING THE REQUESTS OF THE BAGUIO FLOWER FESTIVAL FOUNDATION, INC. (BFFI) FOR THE TEMPORARY CLOSURE TO VEHICULAR TRAFFIC OF VARIOUS ROADS AND FOR THE USE OF PUBLIC PLACES AND PARKS IN THE CITY OF BAGUIO ON 01 FEBRUARY 2017 FOR THE PANAGBENGA FESTIVAL 2017, SUBJECT TO CONDITIONS.',
                'keywords' => '2017, BAGUIO FLOWER FESTIVAL FOUNDATION, CLOSURE TO VEHICULAR TRAFFIC, THE PANAGBENGA FESTIVAL',
            ],
            [
                'id' => 18,
                'number'=> '3',
                'series'=> '2017',
                'title'=> 'AMENDING CITY ORDINANCE NUMBERED 513, SERIES OF 1969 [ AN ORDINANCE REGULATING THE MANAGEMENT, OPERATION AND MAINTENANCE OF DORMITORIES, BOARDING HOUSES, HOTELS AND TENEMENT HOUSES, AND PROVIDING FOR OTHER PURPOSES.]',
                'keywords' => '2017, AMENDMENT, ORDINANCE NUMBERED 513',
            ],
            [
                'id' => 19,
                'number'=> '4',
                'series'=> '2017',
                'title'=> 'ESTABLISHING THE SEARCH FOR THE BEST CHILD-FRIENDLY POLICE STATION IN THE CITY OF BAGUIO AND PROVIDING THE MECHANICS AND GUIDELINES FOR ITS IMPLEMENTATION.',
                'keywords' => '2017, POLICE STATION',
            ],
            [
                'id' => 20,
                'number'=> '5',
                'series'=> '2017',
                'title'=> 'REGULATING THE USE OF STREETS IN THE CITY OF BAGUIO BY HEAVY EQUIPMENT VEHICLES, TRAILERS, DUMP TRUCKS, AND OTHER FREIGHT TRUCKS (SIX-WHEELERS AND ABOVE), WITH GROSS WEIGHT CAPACITY OF 4,500 KILOGRAMS OR MORE, REPEALING FOR THE PURPOSE ORDINANCE NUMBERED 52, SERIES OF 1976, AND ARTICLE XI, SECTION 10 OF ORDINANCE NUMBERED 07, SERIES OF 1984, AND PROVIDING PENALTIES THEREFOR.',
                'keywords' => '2017, HEAVY EQUIPMENT, ORDINANCE NUMBERED 52',
            ],
            [
                'id' => 21,
                'number'=> '6',
                'series'=> '2017',
                'title'=> 'APPROVING THE REQUEST OF THE CITY SOCIAL WELFARE AND DEVELOPMENT OFFICE TO PURCHASE A COMMUTER VAN IN ACCORDANCE WITH THE DEPARTMENT OF THE INTERIOR AND LOCAL GOVERNMENT MEMORANDUM CIRCULAR NO. 2014-47, SERIES OF 2013, AS AMENDED',
                'keywords' => '',
            ],
            [
                'id' => 22,
                'number'=> '7',
                'series'=> '2017',
                'title'=> 'CHANGING THE PROJECT TITLE FROM "IDENTIFYING THE UNFINISHED WAITING SHED AND BARANGAY TANOD OUTPOST LOCATED AT MERCURY STREET" TO "CONSTRUCTION FO WAITING SHED AND TANOD OUTPOST AT MERCURY STREET", UPPER QUEZON HILL BARANGAY, BAGUIO CITY, UNDER CALENDAR YEAR 2013 ANNUAL INVESTMENT PROGRAM (AIP) OF THE CITY OF BAGUIO IN THE AMOUNT OF PHP 100,000.00',
                'keywords' => '2017, SHED, MERCURY STREET, OUTPOST',
            ],
            [
                'id' => 23,
                'number'=> '8',
                'series'=> '2017',
                'title'=> 'PROHIBITING INTER-MUNICIPALITY PUBLIC UTILITY JEEPNEYS FROM PICKING UP PASSENGERS ALONG EXISTING BAGUIO CITY PUBLIC UTILITY JEEPNEY ROUTES AND PROVIDING PENALTIES THEREFOR.',
                'keywords' => '2017, PUBLIC UTILITY JEEPNEYS',
            ],
        );
        Ordinance::insert($researchAndRecordsOrdinances);

//            [
//               'id' => 1,
//               'number'=> '1',
//               'series'=> '2017',
//               'title'=> '',
//                'keywords' => '',
//               'is_monitoring' => 1,
//            ],

//         M&E Ordinances (2017 Ordinances 1-15)
        $monitoringAndEvaluationOrdinances = array(
            [
                'id' => 8,
                'number'=> '8',
                'series'=> '2016',
                'title'=> 'APRROVING THE REQUESTS OF TEAM LAKAY TAP TEAM INC. FOR EXEMPTION FROM THE PAYMENT OF AMUSEMENT TAX AND THE FREE USE OF THE BAGUIO CONVENTION CENTER FOR THE MIXED MARTIAL ARTS (MMA) EVENT ON 27 FEBRUARY 2016.',
                'keywords' => '2016, TEAM LAKAY TAP TEAM INC., AMUSEMENT TAX, FREE USE, BAGUIO CONVENTION CENTER',
                'is_monitoring' => 1,
            ],
            [
                'id' => 9,
                'number'=> '9',
                'series'=> '2016',
                'title'=> 'REALIGNING THE AMOUNT OF Php200,000 FROM THE PROJECT "REHABILITATION AND RIPRAPPING AT INTERIOR REGIDOR BETWEEN MOLINTAS RESIDENCE AND LATUS RESIDENCE" UNDER THE 2015 ANNUAL INVESTMENT PLAN (AIP) TO "CONSTRUCTION OF PUBLIC COMFORT ROOM AT THE BASEMENT OF THE OLD BARANGAY HALL", AT PACDAL BARANGAY, BAGUIO CITY.',
                'keywords' => '2016, REHABILIATION, RIPRAPPING, INTERIOR RIGEDOR, MOLINTAS, LATUS, ANNUAL INVESTMENT PLAN, AIP, CONSTRUCTION, PUBLIC COMFORT ROOM, PACDAL',
                'is_monitoring' => 1,
            ],
            [
                'id' => 10,
                'number'=> '10',
                'series'=> '2016',
                'title'=> 'REALIGNING THE AMOUNT OF Php1,351,311.77 FROM THE PROJECT "REHABILITATION OF FLOOD CONTROL ALONG BALILI RIVER" UNDER THE 2014 LOCAL DEVELOPMENT FUND OF THE CITY OF BAGUIO  TO "CONSTRUCTION  OF THE PROPOSED MAIN SEWER LINE CONNECTION AT PUROK 1" AT LOWER MAGSAYSAY BARANGAY, BAGUIO.',
                'keywords' => '2016, REHABILITAION, FLOOD CONTORL, BALILI RIVER, LOCAL DEVELOPMENT FUND, CONSTRUCTION, PRPOSED MAIN SEWER LINE CONNECTION, LOWER MAGSAYSAY',
                'is_monitoring' => 1,
            ],
            [
                'id' => 11,
                'number'=> '11',
                'series'=> '2016',
                'title'=> 'APPROVING THE REQUESTS OF THE HILLTOP ASSEMBLY OF GOD FOR EXEMPTION FROM THE PAYMENT OF AMUSEMENT TAX AND THE FREE USE OF THE BAGUIO CONVENTION CENTER FOR THE BREAKTHROUGH CONCERT 2015 ON 18 NOVEMBER 2016, SUBJECT OT CONDITIONS.',
                'keywords' => '2016, HILLTOP ASSEMBLY OF GOD, AMUSEMENT TAX, FREE USE, BAGUIO CONVENTION CENTER, BREAKTHROUGH',
                'is_monitoring' => 1,
            ],
            [
                'id' => 12,
                'number'=> '12',
                'series'=> '2016',
                'title'=> 'APPROVING THE REQUESTS OF THE CAR-BAGUIO GERMAN SHEPHERD DOG CLUB, INCORPORATED FOR THE EXEMPTION FROM THE PAYMENT OF AMUSEMENT TAX AND THE FREE USE OF THE MELVIN JONES, BURNHAM PARK, BAGUIO CITY, AS VENUE FOR THE 53RD LANDESGRUPPEN DOG SHOW ON 24 APRIL 2016.',
                'keywords' => '2016, CAR-BAGUIO GERMAN SHEPHERD DOG CLUB INCORPORATED, AMUSEMENT TAX, FREE USE, MELVIN JONES, BURNHAM PARK, LANDESGRUPPEN DOG SHOW',
                'is_monitoring' => 1,
            ],
            [
                'id' => 13,
                'number'=> '13',
                'series'=> '2016',
                'title'=> 'AUTHORIZING A SUPPLEMENTAL BUDGET INVOLVING AN AMOUNT OF NINETY MILLION TWO HUNDRED SIXTY THOUSAND PESOS (Php90,260,000.00) TO AUGMENT THE 2015 DEVELOPMENT/INVESTMENT PRIORITY PROJECTS OF THE CITY OF BAGUIO.',
                'keywords' => '2016, SUPPLEMENTAL BUDGET, DEVELOPMENT/INVESTMENT PRIORITY PROJECTS',
                'is_monitoring' => 1,
            ],
            [
                'id' => 14,
                'number'=> '14',
                'series'=> '2016',
                'title'=> 'ESTABLISHING, INAUGURATING AND INSTITUTING 16 JUNE 1916 AS THE FOUNDATION DAY OF THE BAGUIO CITY NATIONAL HIGH SCHOOL, APPROPRIATING FUNDS FOR ITS 2016 CENTENNIAL CELEBRATION, AND FOR OTHER PURPOSES.',
                'keywords' => '2016, FOUNDATION DAY, BAGUIO CITY NATIONAL HIGH SCHOOL, CENTENNIAL CELEBRATION, OTHER PURPOSES',
                'is_monitoring' => 1,
            ],
            [
                'id' => 15,
                'number'=> '15',
                'series'=> '2016',
                'title'=> 'GRANTING AMNESTY TO APPLICANTS FOR ELECTRIC AND WATER CONNECTIONS IN THE CITY OF BAGUIO.',
                'keywords' => '2016, AMNESTY, APPLICANTS, ELECTRIC AND WATER CONNECTIONS',
                'is_monitoring' => 1,

            ],
            //ordinances of 2017 2ndhalf
            [
                'id' => 24,
                'number'=> '9',
                'series'=> '2017',
                'title'=> 'AUTHORIZING TO CHARGE FROM THE CURRENT APPROPRIATIONS THE AMOUNT OF PHP 2.409.96 TO DEFRAY THE EXPENSES FOR THE PURCHASE OF SUPPLIES IN THE OFFICE OF THE MUNICIPAL TRIAL COURT IN CITIES, FIRST JUDICIAL REGION, BAGUIO CITY.',
                'keywords' => '2017, SUPPLIES, OFFICE OF THE MUNICIPAL TRIAL COURT',
                'is_monitoring' => 1,
            ],
            [
                'id' => 25,
                'number'=> '10',
                'series'=> '2017',
                'title'=> 'DECLARING FEBRUARY 07 TO FEBRUARY 14 OF EVERY YEAR AS MARRIAGE WEEK IN THE CITY OF BAGUIO',
                'keywords' => '2017, FEBRUARY 07 TO FEBRUARY 14, MARRIAGE WEEK',
                'is_monitoring' => 1,
            ],
            [
                'id' => 26,
                'number'=> '11',
                'series'=> '2017',
                'title'=> 'MANDATORILY REQUIRING BUSINESS ESTABLISHMENTS TO INSTALL CLOSED CIRCUIT TELEVISION (CCTV) CAMERAS, VIDEO, RECORDERS, AND MONITORS FOR SECURITY PURPOSES, ALSO KNOWN AS THE "NO CLOSED CIRCUIT TELEVISION (CCTV), NO BUSINESS PERMIT ORDINANCE OF THE CITY OF BAGUIO".',
                'keywords' => '2017, CLOSED CIRCUIT TELEVISION (CCTV), REQUIRING',
                'is_monitoring' => 1,
            ],
            [
                'id' => 27,
                'number'=> '12',
                'series'=> '2017',
                'title'=> 'APPROVING THE AUTHORITY TO CHARGE FROM VARIOUS ACCOUNTS IN THE CURRENT APPROPRIATIONS IN THE OFFICE OF THE CITY ADMINISTRATOR FOR PAYMENT OF UNPAID TELEPHONE BILLS, CASH INCENTIVES, AND HONORARIA OF OFFICIATING OFFICIALS COVERING THE PERIOD 2016.',
                'keywords' => '2017, UNPAID TELEPHONE BILLS',
                'is_monitoring' => 1,
            ],
            [
                'id' => 28,
                'number'=> '13',
                'series'=> '2017',
                'title'=> 'PROHIBITING DISCRIMINATION AND ENFORCING EQUALITY BEFORE THE LAW AND EQUAL PROTECTION OF THE LAW WITHOUT ANY DISCRIMINATION IN THE CITY OF BAGUIO ON THE BASIS OF RELIGION, ETHNICITY, SEXUAL ORIENTATION AND GENDER IDENTITY, HEALTH STATUS, DISABILITY, AND AGE, PROVIDING PENALTIES FOR VIOLATION THEREOF AND FOR OTHER PURPOSES.',
                'keywords' => '2017, EQUALITY, EQUAL PROTECTION, DISCRIMINATION',
                'is_monitoring' => 1,
            ],
            [
                'id' => 29,
                'number'=> '14',
                'series'=> '2017',
                'title'=> 'AMENDING ORDINANCE NUMBER 050, SERIES OF 1995 [GOVERNING THE USE OF UNIFORMS BY CITY GOVERNMENT OFFICIALS AND EMPLOYEES AND FOR OTHER PURPOSES].',
                'keywords' => '2017, ORDINANCE NUMBER 050, AMENDMENT',
                'is_monitoring' => 1,
            ],
            [
                'id' => 30,
                'number'=> '15',
                'series'=> '2017',
                'title'=> 'TRANSFERRING THE APPROPRIATION OF PHP 75,000,000.00 FROM ACCOUNT CODE NO. 5-02-99-900 (OTHER MAINTENANCE AND OPERATING EXPENSES) TO ACCOUNT CODE NO. 5-02-12-010 (ENVIRONMENT / SANITARY SERVICES) IN THE GENERAL SERVICES OFFICE FOR CALENDAR YEAR 2017, SUBJECT TO CONDITIONS.',
                'keywords' => '2017, TRANSFERRING MONEY',
                'is_monitoring' => 1,
            ],
        );

        Ordinance::insert($monitoringAndEvaluationOrdinances);


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
//                'is_monitoring' => 1,
//            ]
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
