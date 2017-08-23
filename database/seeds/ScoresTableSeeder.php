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
            //Premiere
            [   
                'status'       => 'fait',
                'question_id'  => '1',
                'user_id'      => '4',
                'note'         => '11'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '2',
                'user_id'      => '4',
                'note'         => '9'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '1',
                'user_id'      => '5',
                'note'         => '6'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '2',
                'user_id'      => '5',
                'note'         => '7'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '1',
                'user_id'      => '7',
                'note'         => '4'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '2',
                'user_id'      => '7',
                'note'         => '2'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '1',
                'user_id'      => '3',
                'note'         => '8'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '2',
                'user_id'      => '3',
                'note'         => '7'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '1',
                'user_id'      => '8',
                'note'         => '11'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '1',
                'user_id'      => '9',
                'note'         => '15'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '1',
                'user_id'      => '10',
                'note'         => '14'
            ],
            //Terminale
            [   
                'status'       => 'fait',
                'question_id'  => '3',
                'user_id'      => '12',
                'note'         => '14'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '4',
                'user_id'      => '12',
                'note'         => '11'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '3',
                'user_id'      => '13',
                'note'         => '10'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '4',
                'user_id'      => '13',
                'note'         => '10'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '3',
                'user_id'      => '15',
                'note'         => '8'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '3',
                'user_id'      => '16',
                'note'         => '13'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '3',
                'user_id'      => '17',
                'note'         => '4'
            ],
            [   
                'status'       => 'fait',
                'question_id'  => '3',
                'user_id'      => '19',
                'note'         => '2'
            ]
    	]);
    }
}
