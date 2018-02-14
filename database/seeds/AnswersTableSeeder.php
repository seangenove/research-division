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
                'answer'=> 'Yes',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'question_id'=> 2,
                'response_id'=> 1,
                'answer'=> 'Because it is for the good of the local barangay, and it is best to make use use for the resources we have.',
                'created_at' => \Carbon\Carbon::now()

            ],
            [
                'question_id'=> 3,
                'response_id'=> 1,
                'answer'=> 'I think it is better to let be used for public facilities rather than keeping the money again with nothing to use for.',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'question_id'=> 1,
                'response_id'=> 2,
                'answer'=> 'No',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'question_id'=> 2,
                'response_id'=> 2,
                'answer'=> 'Because it is better to use the previous budget rather than to receive a new one.',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'question_id'=> 3,
                'response_id'=> 2,
                'answer'=> 'Impressed on this because it shows that the budget is being well spent on.',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'question_id'=> 6,
                'response_id'=> 3,
                'answer'=> 'Yes',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'question_id'=> 7,
                'response_id'=> 3,
                'answer'=> 'Agreeable, I think people should be reminded that maintaining cleanliness of the environment is a must to enjoy the tourism.',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'question_id'=> 6,
                'response_id'=> 4,
                'answer'=> 'Yes',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'question_id'=> 7,
                'response_id'=> 4,
                'answer'=> 'It is time to learn to take care of the surroundings for everyone to be able to enjoy what the park offers for us.',
                'created_at' => \Carbon\Carbon::now()
            ]
        );
        Answer::insert($answers);
    }
}
