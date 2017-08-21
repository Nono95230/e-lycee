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
                'title'         => 'Conversion',
                'content'       => 'Si l\'on convertit en litres un volume de 18,78 m3, on obtient :',
                'class_level'   => 'premiere',
                'status'        => 'published'
            ],
            [   
                'title'         => 'Poucentage',
                'content'       => 'On a place une somme a un taux de t%. A la fin de la première année, le montant des intérêts s\'élève a 286 €. Si on avait place la même somme au taux de t + 2%, à la fin de cette année, le montant des intérêts aurait été de 341 €. Quel est le montant ',
                'class_level'   => 'premiere',
                'status'        => 'published'
            ],
            [   
                'title'         => 'Résolution',
                'content'       => '38 - Résoudre dans R Y= 2X -1 Y = 3X - 16',
                'class_level'   => 'premiere',
                'status'        => 'unpublished'
            ],
            [   
                'title'         => 'Soustraction',
                'content'       => 'L\'opération - 5,6 - 3,9 a pour résultat :',
                'class_level'   => 'premiere',
                'status'        => 'published'
            ],
            [   
                'title'         => 'Calendrier Julien',
                'content'       => 'Afin de rattraper le retard pris par le calendrier Julien, le calendrier actuel a été instauré par le Pape Grégoire XIII le 15 octobre 1582. Ce calendrier, dit Grégorien, est constitué en années de 365 jours ou 366, dites bissextiles',
                'class_level'   => 'premiere',
                'status'        => 'published'
            ],
            [   
                'title'         => 'Le grand immeuble',
                'content'       => 'Dans un grand immeuble, un ascenseur possède un panneau de contrôle où il n\'y a que quatre boutons : Un pour monter de 7 étages, Un pour monter de 4 étages, Un pour descendre de 4 étages, Et enfin un dernier pour descendre de 7 étages.',
                'class_level'   => 'terminale',
                'status'        => 'published'
            ],
            [   
                'title'         => 'Système d\'équations',
                'content'       => 'Le système d\'équations suivant a pour solution : 3X - 2y =5 X + 3y = 9',
                'class_level'   => 'terminale',
                'status'        => 'published'
            ],
            [   
                'title'         => 'Sportif',
                'content'       => 'Un sportif a couru un marathon en 3 h 13 mn et 27 s. Il est arrive 57 mn et 49 s après le vainqueur. Quel est le temps du vainqueur ?',
                'class_level'   => 'terminale',
                'status'        => 'published'
            ],
            [   
                'title'         => 'Distance',
                'content'       => 'Un terrain de jeux mesure 30 m sur 40 m. On augmente ses dimensions de 50 %. De combien augmente sa surface ?',
                'class_level'   => 'terminale',
                'status'        => 'published'
            ],
            [   
                'title'         => 'Progression',
                'content'       => 'Un prix augmente de 1,2 % au ler trimestre, de 1,5 % au 2eme trimestre, de 1 % au 3eme trimestre, et baisse de 0,8 % au 4eme trimestre. Quelle a été sa progression totale sur l\'année ?',
                'class_level'   => 'terminale',
                'status'        => 'published'
            ],
            
    	]);
    }
}
