<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
		$users = [
	        "teacher"=> [
	            [
	                "username"=> "Alexandre"
	            ],
	            [
	                "username"=> "Guillaume"
	            ],
	            [
	                "username"=> "Bénédicte"
	            ]
	        ],
	        "first_class"=>
	                [
	                    [
	                        "username"=> "Abel"
	                    ],
	                    [
	                        "username"=> "Al"
	                    ],
	                    [
	                        "username"=> "Alan"
	                    ],
	                    [
	                        "username"=> "Arthur"
	                    ],
	                    [
	                        "username"=> "Carl"
	                    ],
	                    [
	                        "username"=> "Blaise"
	                    ],
	                    [
	                        "username"=> "Isaac"
	                    ],
	                    [
	                        "username"=> "Steve"
	                    ]
	                ],
	        "final_class"=> [
	            [
	                "username"=> "Alfred"
	            ],
	            [
	                "username"=> "Brendan"
	            ],
	            [
	                "username"=> "David"
	            ],
	            [
	                "username"=> "George"
	            ],
	            [
	                "username"=> "Jim"
	            ],
	            [
	                "username"=> "Leslie"
	            ],
	            [
	                "username"=> "Maria"
	            ],
	            [
	                "username"=> "Rasmus"
	            ],
	            [
	                "username"=> "Tim"
	            ]
	        ]
		];

		$allUser = array();


		foreach ($users as $key => $value) {
			$numberOfUser = count($value);
			//echo 'Liste des user du role '.$key.'<br>';
			for ($i=0; $i < $numberOfUser; $i++) { 
				//echo $value[$i]['username'].'<br>';
		        $thisUser = [
		        	"username"=>$value[$i]['username'],
		        	"password"=>password_hash(strtolower($value[$i]['username']), PASSWORD_DEFAULT),
		        	"role"=> $key
		        	];
		        array_push($allUser, $thisUser);
			}
		}


        DB::table('users')->insert($allUser);
    }
}
