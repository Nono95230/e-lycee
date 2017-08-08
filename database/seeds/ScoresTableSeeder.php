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
                'user_id'      => '1',
                'note'         => '13'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '2',
                'user_id'      => '2',
                'note'         => '14'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '3',
                'user_id'      => '3',
                'note'         => '16'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '4',
                'user_id'      => '4',
                'note'         => '09'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '5',
                'user_id'      => '5',
                'note'         => '15'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '6',
                'user_id'      => '6',
                'note'         => '06'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '7',
                'user_id'      => '7',
                'note'         => '09'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '8',
                'user_id'      => '8',
                'note'         => '17'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '9',
                'user_id'      => '9',
                'note'         => '14'
            ],
            [   
                'status'       => 'pas fait',
                'question_id'  => '7',
                'user_id'      => '3',
                'note'         => ''
            ],
            [   
                'status'       => 'pas fait',
                'question_id'  => '7',
                'user_id'      => '3',
                'note'         => ''
            ],
            [   
                'status'       => 'pas fait',
                'question_id'  => '7',
                'user_id'      => '3',
                'note'         => ''
            ],
            [   
                'status'       => 'pas fait',
                'question_id'  => '7',
                'user_id'      => '3',
                'note'         => ''
            ],
            [   
                'status'       => 'pas fait',
                'question_id'  => '10',
                'user_id'      => '9',
                'note'         => ''
            ],
            [   
                'status'       => 'pas fait',
                'question_id'  => '9',
                'user_id'      => '16',
                'note'         => ''
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '8',
                'user_id'      => '16',
                'note'         => '12'
            ],
            [   
                'status'       => 'pas fait',
                'question_id'  => '9',
                'user_id'      => '18',
                'note'         => ''
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '10',
                'user_id'      => '10',
                'note'         => '15'
            ],
            
            
            

    	]);
    }
}
