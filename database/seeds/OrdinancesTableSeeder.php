<?php

use Illuminate\Database\Seeder;
use App\Ordinance;

class OrdinancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ordinances = array(
            [
                'number'=> 'I',
                'title'=> 'Pre Ordinance of Baguio City',
                'description' => 'Test ordinance',
                'authors' => 'Ricky Tan'
            ]
        );
        Ordinance::insert($ordinances);
    }
}
