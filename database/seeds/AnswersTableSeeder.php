<?php
use App\Answer;
use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answers = array(
            [
                'question_id'=> 1,
                'response_id'=> 1,
                'answer'=> 'Dean',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'question_id'=> 2,
                'response_id'=> 1,
                'answer'=> 'Male',
                'created_at' => \Carbon\Carbon::now()

            ],
            [
                'question_id'=> 3,
                'response_id'=> 1,
                'answer'=> 'Comment # 1',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'question_id'=> 1,
                'response_id'=> 2,
                'answer'=> 'Jay',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'question_id'=> 2,
                'response_id'=> 2,
                'answer'=> 'Female',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'question_id'=> 3,
                'response_id'=> 2,
                'answer'=> 'Comment # 2',
                'created_at' => \Carbon\Carbon::now()
            ]
        );
        Answer::insert($answers);
    }
}
