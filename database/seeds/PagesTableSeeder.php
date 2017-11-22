<?php

use Illuminate\Database\Seeder;
use App\Page;
class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = array(
            [
                'title' => 'Testing Page',
                'description' => 'This page is for testing purposes only.',
                'content' => '<h1>Participatory Governance</h1>

<hr />
<p>The practice of enjoining citizens to take part on the decision making of the government on the regulations and legislation around the city. It is also to get involved for the improvement of the ordinances, and resolutions to have fair and square process of the law in both the citizens and the government.</p>

<hr />
<pre>
&quot;Be the leader who will serve the people, not the leader whom the people will serve.&quot;</pre>'
            ],
            [
                'title' => 'Another Page',
                'description' => 'This page is for testing purposes only.',
                'content' => '<h1>Research Division</h1>

<hr />
<p>The Research Division of the City Hall of Baguio. The section of the goverment wherein they monitor the status of each ordinance whether it contributes for the good of the public</p>'
            ]
        );
        Page::insert($pages);
    }
}
