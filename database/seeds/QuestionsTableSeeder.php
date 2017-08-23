<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertion dans la table QUESTIONS
        DB::table('questions')->insert([
            [   
                'title'         => 'Connaissances historiques',
                'class_level'   => 'premiere',
                'status'        => 'published'
            ],
            [   
                'title'         => 'Connaissances historiques Suite',
                'class_level'   => 'premiere',
                'status'        => 'unpublished'
            ],
            [   
                'title'         => 'Connaissances historiques Suite',
                'class_level'   => 'terminale',
                'status'        => 'published'
            ],
            [   
                'title'         => 'Connaissances historiques Suite',
                'class_level'   => 'terminale',
                'status'        => 'unpublished'
            ],
            
    	]);
    }
}
