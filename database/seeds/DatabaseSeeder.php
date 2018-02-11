<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PagesTableSeeder::class);
//        $this->call(SuggestionsTableSeeder::class);
        $this->call(OrdinancesTableSeeder::class);
        $this->call(ResolutionsTableSeeder::class);
//        $this->call(QuestionnairesTableSeeder::class);
//        $this->call(ResponsesTableSeeder::class);
//        $this->call(AnswersTableSeeder::class);


    }
}
