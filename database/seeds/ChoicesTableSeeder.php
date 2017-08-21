<?php

use Illuminate\Database\Seeder;

class ChoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertion dans la table CHOICES
        DB::table('choices')->insert([
            [   
                'content'       => 'Si l\'on convertit en litres un volume de 18,78 m3, on obtient :',
                'status'        => 'no',
                'question_id'   => '1'
            ],
            [   
                'content'       => '25/36',
                'status'        => 'no',
                'question_id'   => '1'
            ],
            [   
                'content'       => '36/25',
                'status'        => 'yes',
                'question_id'   => '1'
            ],
            [   
                'content'       => '1/25',
                'status'        => 'no',
                'question_id'   => '1'
            ],
            [   
                'content'       => '1878 litres',
                'status'        => 'no',
                'question_id'   => '2'
            ],
            [   
                'content'       => '187,8 litres',
                'status'        => 'no',
                'question_id'   => '2'
            ],
            [   
                'content'       => '18 780 litres',
                'status'        => 'yes',
                'question_id'   => '2'
            ],
            [   
                'content'       => '187 800 litres',
                'status'        => 'no',
                'question_id'   => '2'
            ],
            [   
                'content'       => '2750€',
                'status'        => 'yes',
                'question_id'   => '3'
            ],
            [   
                'content'       => '3 200 €',
                'status'        => 'no',
                'question_id'   => '3'
            ],
            [   
                'content'       => '4 550 €',
                'status'        => 'no',
                'question_id'   => '3'
            ],
            [   
                'content'       => '5 000 €',
                'status'        => 'no',
                'question_id'   => '3'
            ],
            [   
                'content'       => '( 15 ; -29 )',
                'status'        => 'no',
                'question_id'   => '4'
            ],
            [   
                'content'       => '(15 ; 29)',
                'status'        => 'yes',
                'question_id'   => '4'
            ],
            [   
                'content'       => '( 15 ; -31)',
                'status'        => 'no',
                'question_id'   => '4'
            ],
            [   
                'content'       => '( 15 ; 31 )',
                'status'        => 'no',
                'question_id'   => '4'
            ],
            [   
                'content'       => '1,7',
                'status'        => 'no',
                'question_id'   => '5'
            ],
            [   
                'content'       => '-1,7',
                'status'        => 'no',
                'question_id'   => '5'
            ],
            [   
                'content'       => '-8,5',
                'status'        => 'no',
                'question_id'   => '5'
            ],
            [   
                'content'       => '-9,5',
                'status'        => 'yes',
                'question_id'   => '5'
            ],
            [   
                'content'       => '24 et 24',
                'status'        => 'no',
                'question_id'   => '6'
            ],
            [   
                'content'       => '24 et 25',
                'status'        => 'no',
                'question_id'   => '6'
            ],
            [   
                'content'       => '25 et 24 ',
                'status'        => 'yes',
                'question_id'   => '6'
            ],
            [   
                'content'       => '25 et 25 ',
                'status'        => 'no',
                'question_id'   => '6'
            ],
            [   
                'content'       => ' 5 fois',
                'status'        => 'no',
                'question_id'   => '7'
            ],
            [   
                'content'       => ' 7 fois',
                'status'        => 'no',
                'question_id'   => '7'
            ],
            [   
                'content'       => ' 9 fois',
                'status'        => 'yes',
                'question_id'   => '7'
            ],
            [   
                'content'       => ' 12 fois',
                'status'        => 'no',
                'question_id'   => '7'
            ],
            [   
                'content'       => ' (3 ; 2) ',
                'status'        => 'no',
                'question_id'   => '8'
            ],
            [   
                'content'       => ' (1 ; 3) ',
                'status'        => 'no',
                'question_id'   => '8'
            ],
            [   
                'content'       => ' (2 ; 3) ',
                'status'        => 'yes',
                'question_id'   => '8'
            ],
            [   
                'content'       => ' (1 ; 2) ',
                'status'        => 'no',
                'question_id'   => '8'
            ],
            [   
                'content'       => ' 2 h 44 mn 22',
                'status'        => 'no',
                'question_id'   => '9'
            ],
            [   
                'content'       => ' 2 h 17 mn 38 s ',
                'status'        => 'no',
                'question_id'   => '9'
            ],
            [   
                'content'       => ' 2 h 15 mn 38 s ',
                'status'        => 'yes',
                'question_id'   => '9'
            ],
            [   
                'content'       => ' 2 h 16 mn 26 s ',
                'status'        => 'no',
                'question_id'   => '9'
            ],
            [   
                'content'       => ' 50% ',
                'status'        => 'no',
                'question_id'   => '10'
            ],
            [   
                'content'       => ' 75% ',
                'status'        => 'no',
                'question_id'   => '10'
            ],
            [   
                'content'       => ' 100% ',
                'status'        => 'no',
                'question_id'   => '10'
            ],
            [   
                'content'       => ' 125% ',
                'status'        => 'yes',
                'question_id'   => '10'
            ],
            [   
                'content'       => ' + 2,90 % ',
                'status'        => 'no',
                'question_id'   => '11'
            ],
            [   
                'content'       => ' + 2,92 % ',
                'status'        => 'yes',
                'question_id'   => '11'
            ],
            [   
                'content'       => ' + 7,31 % ',
                'status'        => 'no',
                'question_id'   => '11'
            ],
            [   
                'content'       => ' - 4,55 % ',
                'status'        => 'no',
                'question_id'   => '11'
            ]
            
    	]);
    }
}
