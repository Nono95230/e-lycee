<?php

use Illuminate\Database\Seeder;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertion dans la table SCORES
        DB::table('scores')->insert([
            [   
                'status'       => 'fait',
                'question_id'  => '1',
                'user_id'      => '4',
                'note'         => '1'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '2',
                'user_id'      => '4',
                'note'         => '1'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '3',
                'user_id'      => '4',
                'note'         => '1'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '4',
                'user_id'      => '4',
                'note'         => '1'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '5',
                'user_id'      => '4',
                'note'         => '1'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '6',
                'user_id'      => '4',
                'note'         => '1'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '7',
                'user_id'      => '4',
                'note'         => '1'
            ]
    	]);
    }
}
