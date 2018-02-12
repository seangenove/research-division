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
                'number'=> '7',
                'series'=> '2016',
                'title'=> 'STRONGLY SUPPORTING HOUSE BILL NO. 180 [AN ACT CREATING THE BARANGAY PENSION FUND TO PROVIDE PENSION BENEFITS TO ALL BARANGAY OFFICIALS] INTRODUCED BY BAYAN MUNA PARTY LIST REPRESENTATIVES NERI J. COLMENARES AND CARLOS ISAGANI T. ZARATE.',
                'keywords' => '2016, HOUSE BIL NO. 180, BAYAN MUNA PARTY LIST, NERI J. COLMENARES, CARLOS ISAGANI T. ZARATE',
            ],
            [
                'id' => 16,
                'number'=> '1',
                'series'=> '2017',
                'title'=> 'APPROVING THE APPLICATION OF DM CAPITAL VENTURE CORPORATION (DMCVC) TO DEVELOP AND OPERATE THE LEGARDA INFORMATION TECHNOLOGY (IT) CENTER AT LEGARDA ROAD, BAGUIO CITY.',
                'keywords' => '2017, DMCVC, LEGARDA',
            ],
            [
                'id' => 17,
                'number'=> '2',
                'series'=> '2017',
                'title'=> 'ACCREDITING THE SAMAHANG MAGDALO, INC., Pines City Chapter',
                'keywords' => 'SAMAHANG MAGDALO, Pines City Chapter',
            ],
            [
                'id' => 18,
                'number'=> '3',
                'series'=> '2017',
                'title'=> 'GRANTING FAVORABLE REVIEW OPF BARANGAY ORDINANCE NO. 06, SERIES OF 2016 [AN ORDINANCE REQUIRING ALL AMBULANT VENDORS/PEDDLERS OF ANY SORT TO SECURE CLEARANCE/PERMISSION BEFORE SELLING/PEDDLING WITHIN THE AREA OF RESPONSIBILITY OF BARANGAY TRANCOVILLE FROM THE SANGGUNIANG BARANGAY] OF TRANCOVILLE BARANGAY, BAGUIO CITY.',
                'keywords' => '2017, CLEARANCE, PEDDLER, TRANCOVILLE, VENDORS, ORDINANCE NO. 06, SERIES OF 2016',
            ],
            [
                'id' => 19,
                'number'=> '4',
                'series'=> '2017',
                'title'=> 'GRANTING FAVORABLE REVIEW OF ORDINANCE NUMBER 04, SERIES OF 2016 [AN ORDINANCE DESIGNATING A PORTION OF QUISUMBING ROAD (FROM MANUEL ROXAS STREET TO WALSEY CAMDAS ROAD) AND PORTION OF DON BOSCO ROAD (FROM MANUEL ROXAS STREET TO LOWER MALVAR STREET) AS NO PARKING ZONES], OF TRANCOVILLE BARANGAY, BAGUIO CITY.',
                'keywords' => '2017, ORDINANCE NUMBER 04, SERIES OF 2016, QUISUMBING ROAD, DON BOSCO ROAD, NO PARKING ZONES, TRANCOVILLE BARANGAY',
            ],
            [
                'id' => 20,
                'number'=> '5',
                'series'=> '2017',
                'title'=> 'GRANTING FAVORABLE REVIEW OF BARANGAY ORDINANCE NO. 02, SERIES OF 2016 [AN ORDINANCE REQUIRING ALL REAL ESTATE LESSORS WITHIN THE TERRITORIAL JURISDICTION OF BARANGAY TRANCOVILLE, BAGUIO CITY TO SUBMIT THE LIST OF THEIR TENANTS AND PROVIDING PENALTIES FOR VIOLATION THEREOF] OF TRANCOVILLE BARANGAY, BAGUIO CITY.',
                'keywords' => '2017, ORDINANCE NO. 02, SERIES OF 2016, REAL ESTATE, TRANCOVILLE BARANGAY, TENANTS',
            ],
            [
                'id' => 21,
                'number'=> '6',
                'series'=> '2017',
                'title'=> 'GRANTING FAVORABLE REVIEW OF ORDINANCE NO. 04, SERIES OF 2016 [AN ORDINANCE PRESCRIVING SERVICE FEE RATES FOR THE COLLECTION OF BARANGAY CLEARANCES AND CERTIFICATES AMENDING THE REVENUE CODE OF THE HOLY GHOST PROPER], OF HOLY GHOST PROPER BARANGAY, BAGUIO CITY.',
                'keywords' => '2017, ORDINANCE NO. 04, SERIES OF 2016, SERVICE FEE, BARANGAY CLEARANCE, CERTIFICATES, HOLY GHOST PROPER',
            ],
            [
                'id' => 22,
                'number'=> '7',
                'series'=> '2017',
                'title'=> 'GRANTING FAVORABLE REVIEW OF BARANGAY ORDINANCE NO. 05, SERIES OF 2016 [AN ORDINANCE PROVIDING FOR NOISE CURFEW, DEFINING NOISE DISTURBANCE, PROHIBITING CERTAIN NOISE PRODUCTION ACTIVITIES, AND PRESCRIBING PENALTIES FOR VIOLATIONS THEREOF] OF HOLY GHOST PROPER BARANGAY, BAGUIO CITY.',
                'keywords' => '2017, ORDINANCE NO. 05, SERIES OF 2016, NOISE CURFEW, HOLY GHOST PROPER BARANGAY',
            ],
            
        );
        Resolution::insert($researchAndRecordsResolutions);

        $monitoringAndEvaluationResolutions = array(
            [
                'id' => 8,
                'number'=> '8',
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
            ],
            [
                'id' => 23,
                'number'=> '8',
                'series'=> '2017',
                'title'=> 'GRANTING FAVORABLE REVIEW OF BARANGAY ORDINANCE NO. 16-01, SERIES OF 2016 [IMPLEMENTATION FOR THE COLLECTION OF FEES FOR THE RENTAL OF MONOBLOC TABLES OF LOURDES SUBDIVISION PROPER BARANGAY] OF LOURDES SUBDIVISION PROPER BARANGAY, BAGUIO CITY',
                'keywords' => '2017, BARANGAY ORDINANCE, LOURDES SUBDIVISION, RENTAL OF MONOBLOC TABLES',
                'is_monitoring' => 1,
            ],
            [
                'id' => 24,
                'number'=> '9',
                'series'=> '2017',
                'title'=> 'GRANTING FAVORABLE REVIEW OF ORDINANCE NO. 05, SERIES OF 2016 [AN ORDINANCE REQUIRING ALL SERVICE PROVIDERS TO SECURE CLEARANCE/PERMISSION FROM THE SANGGUNIANG BARANGAY BEFORE INTRODUCTION OF ANY CONSTRUCTION OR REPAIRS OF THEIR RESPECTIVE FACILITIES OF EQUIPMENTS WITHIN THE AREA OF RESPONSIBILITY OF BARANGAY TRANCOVILLE], OF TRANCOVILLE BARANGAY, BAGUIO CITY',
                'keywords' => '2017, CLEARANCE, CONSTRUCTION OR REPAIRS, FACILITIES OF EQUIPMENTS',
                'is_monitoring' => 1,
            ],
            [
                'id' => 25,
                'number'=> '10',
                'series'=> '2017',
                'title'=> 'GRANTING FAVORABLE REVIEW OF ORDINANCE NO. 003, SERIES OF 2016 [AN ORDINANCE REGULATING THE USE OF BARANGAY COVERED COURT], OF MIDDLE QUIRINO HILL; BARANGAY, BAGUIO CITY.',
                'keywords' => '2017, BARANGAY COVERED COURT, MIDDLE QUIRINO HILL',
                'is_monitoring' => 1,
            ],
            [
                'id' => 26,
                'number'=> '11',
                'series'=> '2017',
                'title'=> 'SUPPORTING THE CAMPAIGN INITIATED BY THE BAGUIO CORRESPONDENTS AND BROADCASTERS CLUB, INC. (BCBC) AND THE PHILIPPINE INFORMATION AGENCY-CORDILLERA ADMINISTRATIVE REGION (PIA-CAR) FOR FREE DIALYSIS TREATMENT OR SERVICE TO FILIPINO PATIENTS.',
                'keywords' => '2017, CAMPAIGN, BAGUIO CORRESPONDENTS AND BROADCASTERS CLUB, INC. (BCBC), PHILIPPINE INFORMATION AGENCY-CORDILLERA ADMINISTRATIVE REGION (PIA-CAR), DIALYSIS',
                'is_monitoring' => 1,
            ],
            [
                'id' => 27,
                'number'=> '12',
                'series'=> '2017',
                'title'=> 'RESOLVING THAT THE BAGUIO FLOWER FESTIVAL, INC. (BFFI) COMPLY WITHT EH AUDIT OBSERATION MEMORANDUM NO. 16-020 DATED 17 MARCH 2016 OF THE OFFICE OF THE SUPERVISING AUDITOR AND THE AUDIT TEAM LEADER, LGS-AUDIT GROUP G - TEAM NO. CAR 01, COMMISSION ON AUDIT',
                'keywords' => '',
                'is_monitoring' => 1,
            ],
            [
                'id' => 28,
                'number'=> '13',
                'series'=> '2017',
                'title'=> 'GRANTING A 25% DISCOUNT TO CONCOCTIONS BAR AND RESTO FOR THE USE OF THE BAGUIO CONVENTION CENTER, BAGUIO CITY, AS VENUE OF THEIR VARIOUS EVENTS ON 29 TO 29 JANUARY 2017',
                'keywords' => '2017, DISCOUNT, CONCOCTIONS, BAGUIO CONVENTION CENTER, JANUARY',
                'is_monitoring' => 1,
            ],
            [
                'id' => 29,
                'number'=> '14',
                'series'=> '2017',
                'title'=> 'APPROVING THE REQUEST OF MR. PETER S.I. SANTOS, PRESIDENT, ASIA PINE HILLS DEVELOPMENT CORPORATION, FOR THE ALTERATION OF PLAN OF MARYLAND SUBDIVISION LOCATED AT IRISAN BARANGAY, BAGUIO CITY, SUBJECT TO CONDITIONS.',
                'keywords' => '2017, MR. PETER S.I. SANTOS, ASIA PINE HILLS DEVELOPMENT CORPORATION, ALTERATION',
                'is_monitoring' => 1,
            ],
            [
                'id' => 30,
                'number'=> '15',
                'series'=> '2017',
                'title'=> 'REQUESTING THE DEPARTMENT OF TRANSPORTATION TO AMEND ITS CIRCULARS ON THE 20% DISCOUNT FOR STUDENTS FARE TO INCLUDE SATURDAYS, SUNDAYS, AND HOLIDAYS.',
                'keywords' => '2017, DPARTMENT OF TRANSPORTATION, DISCOUNT, FARE, WEEKENDS, HOLIDAYS',
                'is_monitoring' => 1,
            ],
        );
        Resolution::insert($monitoringAndEvaluationResolutions);

        //            [
//               'id' => 1,
//               'number'=> '1',
//               'series'=> '2017',
//               'title'=> '',
//                'keywords' => '',
//               'is_monitoring' => 1,
//            ],

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
