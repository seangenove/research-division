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
        $questionnaires_ordinances = [
            [
                'id' => 1,
                'name' => 'Questionnaire for Ordinance #1',
                'description' => 'Desc for Questionnaire #1',
                'isAccepting' => 1,
                'ordinance_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Questionnaire for Ordinance #2',
                'description' => 'Desc for Questionnaire #2',
                'isAccepting' => 1,
                'ordinance_id' => 2

            ],

        ];

        $questionnaires_resolutions = [
            [
                'id' => 3,
                'name' => 'Questionnaire for Resolution #1',
                'description' => 'Desc for Questionnaire #3',
                'resolution_id' => 1
            ]
        ];

        $questions = [
            // For Qstnr #1
            [
                'id' => 1,
                'question' => 'Name',
                'required' => 1,
                'type' => 'short',
                'questionnaire_id' => 1,
            ],
            // For Qstnr #1
            [
                'id' => 2,
                'question' => 'Gender',
                'required' => 0,
                'type' => 'radio',
                'questionnaire_id' => 1,
            ],
            // For Qstnr #1
            [
                'id' => 3,
                'question' => 'What is your opinion about ordinance #1',
                'required' => 1,
                'type' => 'long',
                'questionnaire_id' => 1,
            ],
            // For Qstnr #2
            [
                'id' => 4,
                'question' => 'Name',
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
                'question' => 'Name',
                'required' => 1,
                'type' => 'short',
                'questionnaire_id' => 3,
            ],
            [
                'id' => 7,
                'question' => 'Gender',
                'required' => 0,
                'type' => 'radio',
                'questionnaire_id' => 3,
            ],
            // For Qstnr #1
            [
                'id' => 8,
                'question' => 'Do you approve this resolution?',
                'required' => 1,
                'type' => 'radio',
                'questionnaire_id' => 3,
            ],

        ];

        $values = [
            // Question #1
            [
                'id' => 1,
                'value' => 'Male',
                'question_id' => 2
            ],
            [
                'id' => 2,
                'value' => 'Female',
                'question_id' => 2
            ],
            // Question #5
            [
                'id' => 3,
                'value' => 'Family supports it',
                'question_id' => 5
            ],
            [
                'id' => 4,
                'value' => 'Ethical Reasons',
                'question_id' => 5
            ],
            [
                'id' => 5,
                'value' => 'Church',
                'question_id' => 5
            ],
            // Question #7
            [
                'id' => 6,
                'value' => 'Male',
                'question_id' => 7
            ],
            [
                'id' => 7,
                'value' => 'Female',
                'question_id' => 7
            ],

        ];

        // Order: Questionnaire, Questions then values
        Questionnaire::insert($questionnaires_ordinances);
        Questionnaire::insert($questionnaires_resolutions);
        Question::insert($questions);
        Value::insert($values);
    }
}
