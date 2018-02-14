<?php

use Illuminate\Database\Seeder;
use App\Question;
use App\Questionnaire;
use App\Value;

class QuestionnairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Questionnaires
//        $questionnaires_ordinances = [
//            [
//                'id' => 1,
//                'name' => 'Questionnaire for Ordinance #1',
//                'description' => 'Desc for Questionnaire #1',
//                'isAccepting' => 1,
//                'ordinance_id' => 1
//            ],
//            [
//                'id' => 2,
//                'name' => 'Questionnaire for Ordinance #2',
//                'description' => 'Desc for Questionnaire #2',
//                'isAccepting' => 1,
//                'ordinance_id' => 2
//
//            ],
//
//        ];
//
//        $questionnaires_resolutions = [
//            [
//                'id' => 3,
//                'name' => 'Questionnaire for Resolution #1',
//                'description' => 'Desc for Questionnaire #3',
//                'resolution_id' => 1
//            ]
//        ];
//
//        $questions = [
//            // For Qstnr #1
//            [
//                'id' => 1,
//                'question' => 'Name',
//                'required' => 1,
//                'type' => 'short',
//                'questionnaire_id' => 1,
//            ],
//            // For Qstnr #1
//            [
//                'id' => 2,
//                'question' => 'Gender',
//                'required' => 0,
//                'type' => 'radio',
//                'questionnaire_id' => 1,
//            ],
//            // For Qstnr #1
//            [
//                'id' => 3,
//                'question' => 'What is your opinion about ordinance #1',
//                'required' => 1,
//                'type' => 'long',
//                'questionnaire_id' => 1,
//            ],
//            // For Qstnr #2
//            [
//                'id' => 4,
//                'question' => 'Name',
//                'required' => 0,
//                'type' => 'short',
//                'questionnaire_id' => 2,
//            ],
//            [
//                'id' => 5,
//                'question' => 'Reasons why you approve this ordinance',
//                'required' => 0,
//                'type' => 'checkbox',
//                'questionnaire_id' => 2,
//            ],
//            // For Qstnr #3
//            [
//                'id' => 6,
//                'question' => 'Name',
//                'required' => 1,
//                'type' => 'short',
//                'questionnaire_id' => 3,
//            ],
//            [
//                'id' => 7,
//                'question' => 'Gender',
//                'required' => 0,
//                'type' => 'radio',
//                'questionnaire_id' => 3,
//            ],
//            // For Qstnr #1
//            [
//                'id' => 8,
//                'question' => 'Do you approve this resolution?',
//                'required' => 1,
//                'type' => 'radio',
//                'questionnaire_id' => 3,
//            ],
//
//        ];
//
//        $values = [
//            // Question #1
//            [
//                'id' => 1,
//                'value' => 'Male',
//                'question_id' => 2
//            ],
//            [
//                'id' => 2,
//                'value' => 'Female',
//                'question_id' => 2
//            ],
//            // Question #5
//            [
//                'id' => 3,
//                'value' => 'Family supports it',
//                'question_id' => 5
//            ],
//            [
//                'id' => 4,
//                'value' => 'Ethical Reasons',
//                'question_id' => 5
//            ],
//            [
//                'id' => 5,
//                'value' => 'Church',
//                'question_id' => 5
//            ],
//            // Question #7
//            [
//                'id' => 6,
//                'value' => 'Male',
//                'question_id' => 7
//            ],
//            [
//                'id' => 7,
//                'value' => 'Female',
//                'question_id' => 7
//            ],
//
//        ];
        $questionnaires_ordinances = [
            [
                'id' => 1,
                'name' => '',
                'description' => 'Description test',
                'isAccepting' => 1,
                'ordinance_id' => 9
            ],
            [
                'id' => 2,
                'name' => '',
                'description' => 'Description test',
                'isAccepting' => 0,
                'ordinance_id' => 8

            ],

        ];

        $questionnaires_resolutions = [
            [
                'id' => 3,
                'name' => '',
                'description' => 'Description test',
                'isAccepting' => 1,
                'resolution_id' => 8
            ],
            [
                'id' => 4,
                'name' => '',
                'description' => 'Description test',
                'isAccepting' => 0,
                'resolution_id' => 10

            ],
        ];

        $questions = [
            // For Qstnr #1
            [
                'id' => 1,
                'question' => 'Are you aware of the realignment of funds from the AIP in the project of Pacdal Barangay?',
                'required' => 1,
                'type' => 'radio',
                'questionnaire_id' => 1,
            ],
            // For Qstnr #1
            [
                'id' => 2,
                'question' => 'Why do think it is necessary for the funds to be realigned?',
                'required' => 0,
                'type' => 'long',
                'questionnaire_id' => 1,
            ],
            // For Qstnr #1
            [
                'id' => 3,
                'question' => 'What is your opinion about the aforementioned ordinance?',
                'required' => 1,
                'type' => 'long',
                'questionnaire_id' => 1,
            ],
            // For Qstnr #2
            [
                'id' => 4,
                'question' => 'Why do think Team Lakay should be exempted from paying the tax?',
                'required' => 0,
                'type' => 'short',
                'questionnaire_id' => 2,
            ],
            [
                'id' => 5,
                'question' => 'Reasons why you approve this ordinance',
                'required' => 0,
                'type' => 'checkbox',
                'questionnaire_id' => 2,
            ],
            // For Qstnr #3
            [
                'id' => 6,
                'question' => 'Do you agree with the memorandum of agreement that Wright Park should be protected and conserved?',
                'required' => 1,
                'type' => 'radio',
                'questionnaire_id' => 3,
            ],
            [
                'id' => 7,
                'question' => 'What are your thoughts regarding the protection and conservation?',
                'required' => 0,
                'type' => 'long',
                'questionnaire_id' => 3,
            ],
            // For Qstnr #4
            [
                'id' => 8,
                'question' => 'What are your suggestions on this resolution?',
                'required' => 1,
                'type' => 'long',
                'questionnaire_id' => 4,
            ],

        ];

        $values = [
            // Question #1
            [
                'id' => 1,
                'value' => 'Yes',
                'question_id' => 1
            ],
            [
                'id' => 2,
                'value' => 'No',
                'question_id' => 1
            ],
            // Question #5
            [
                'id' => 3,
                'value' => 'I am a member of the organization',
                'question_id' => 5
            ],
            [
                'id' => 4,
                'value' => 'I think it is fair to the organization',
                'question_id' => 5
            ],
            [
                'id' => 5,
                'value' => 'The event runs on solely on the organization itself',
                'question_id' => 5
            ],
            // Question #7
            [
                'id' => 6,
                'value' => 'Yes',
                'question_id' => 6
            ],
            [
                'id' => 7,
                'value' => 'No',
                'question_id' => 6
            ],

        ];

        // Order: Questionnaire, Questions then values
        Questionnaire::insert($questionnaires_ordinances);
        Questionnaire::insert($questionnaires_resolutions);
        Question::insert($questions);
        Value::insert($values);
    }
}
