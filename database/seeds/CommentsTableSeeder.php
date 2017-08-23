<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertion dans la table COMMENTAIRES
        DB::table('comments')->insert([
            [   
                'title'   => 'La base',
                'content' => 'tant que ça reste raisonnable',
                'user_id' => '7',
                'post_id' => '2'
                
            ],
            [   
                'title'   => 'Hummer rouge',
                'content' => '"J\'ai acheté un hummer rouge"',
                'user_id' => '3',
                'post_id' => '2'
                
            ],
            [   
                'title'   => 'Infos',
                'content' => 'pas mal comme information',
                'user_id' => '9',
                'post_id' => '3'
                
            ],
            [   
                'title'   => 'Vocaroo',
                'content' => 'tu peux faire un vocaroo pour me montrer le ton ?',
                'user_id' => '6',
                'post_id' => '3'
                
            ],
            [   
                'title'   => 'Chasseur',
                'content' => 'Un chasseur sachant chasser sans ses chaussetes est un bon chasseur (dit le vite)',
                'user_id' => '1',
                'post_id' => '5'
                
            ],
            [   
                'title'   => 'mobile',
                'content' => 'Je suis sur mobile',
                'user_id' => '2',
                'post_id' => '2'
                
            ],
            [   
                'title'   => 'Chasseur sans son chien',
                'content' => 'Un chasseur sachant chasser sans son chien des chaussettes de l\'archi duchesses sont elles sèches archis sèches car le caricaturiste caricature une caricature aux caractères caractéristiques.',
                'user_id' => '14',
                'post_id' => '2'
                
            ],
            [   
                'title'   => 'Avec impatience',
                'content' => 'cool, merci pour ce belle article je l\'attend avec impatience',
                'user_id' => '12',
                'post_id' => '3'
                
            ],
            [   
                'title'   => 'Trop Top ! ',
                'content' => 'merci pour cette article',
                'user_id' => '4',
                'post_id' => '4'
                
            ],
            [   
                'title'   => '1',
                'content' => 'j\'ai grandis dans ce lycée, il est temps de le quitter',
                'user_id' => '9',
                'post_id' => '5'
                
            ],
           
            
            

    	]);
    }
}
