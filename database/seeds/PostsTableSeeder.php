<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [   
                'user_id'       => '1',
                'title'         => 'Unsung Story',
                'abstract'      => 'Unsung Story repart de zéro avec un nouveau développeur',
                'content'       => 'La bonne nouvelles pour ces derniers est que Little Orbit entend bien honorer les récompenses promises durant la campagne Kickstarter et cela sans coût additionnel. Pour rappel, la campagne de Unsung Story avait aussi basé son succès sur la présence de Akihiko Yoshida (Bravely Default, NieR Automata) aux illustrations et de Hitoshi Sakimoto (Odin Sphere, Dragon\'s Crown) aux musiques. Leur présence dans le Unsung Story de Little Orbit n\'a pas été évoquée pour le moment.',
                'url_thumbnail' => 'unsung.jpg',
                'status'        => 'published',
                'published_at'  => '2017-05-18 12:34:10'
            ],
            [   
                'user_id'       => '1',
                'title'         => 'FIFA 18',
                'abstract'      => 'Les icônes FUT comptent triple dans FIFA 18',
                'content'       => 'EA Sports a dévoilé de nouvelles fonctionnalités pour le très lucratif mode Ultimate Team de son FIFA 18. Un épisode qui signe l\'arrivée des légendes/icônes sur toutes les plateformes principales (PS4, Xbox One, Switch et PC).',
                'url_thumbnail' => 'fifa.jpg',
                'status'        => 'unpublished',
                'published_at'  => '2017-06-15 16:56:10'
            ],
            [   
                'user_id'       => '1',
                'title'         => 'Dragon Quest XI',
                'abstract'      => 'Le Japon répond présent pour Dragon Quest XI',
                'content'       => 'Les chiffres de Dragon Quest XI sont tombés et ils ont de quoi ravir les amateurs de grosses performances avec un total de 2 080 806 exemplaires écoulés en l\'espace de 2 jours, selon les estimations de Famitsu, qui n\'incluent même pas les ventes en téléchargement. Les générations passent, mais l\'aura de Dragon Quest brûle encore très fort.',
                'url_thumbnail' => 'dragon.jpg',
                'status'        => 'published',
                'published_at'  => '2017-07-17 15:45:10'
            ],
            [   
                'user_id'       => '2',
                'title'         => 'The Lost Bear',
                'abstract'      => 'The Lost Bear cherche son chemin en VR',
                'content'       => 'Le carnet rose a pour ambition pas si extravagante de se pencher chaque matin sur la découverte quotidienne d\'un nouveau jeu vidéo, que celui-ci ait été fraîchement annoncé ou simplement détecté tardivement par le radar de la rédaction, que l\'on parle d\'un jeu indépendant aux parents sans le moindre pédigree ou du nouveau rejeton d\'une franchise établie.',
                'url_thumbnail' => 'lost.jpg',
                'status'        => 'published',
                'published_at'  => '2017-08-12 09:25:10'
            ],[   
                'user_id'       => '3',
                'title'         => 'Hob',
                'abstract'      => 'Hob a maintenant une date de sortie',
                'content'       => 'Il fallait bien que cela arrive un jour, Runic Games a dévoilé la date de sortie de Hob, un jeu d\'exploration qui s\'est offert quelques apparitions sporadiques depuis son annonce il y a maintenant deux ans. La nouvelle création du studio jusqu\'ici connu pour Torchlight sera disponible le 26 septembre sur PS4 et PC au tarif de 20 euros.',
                'url_thumbnail' => 'hob.jpg',
                'status'        => 'unpublished',
                'published_at'  => '2017-09-19 14:15:10'
            ],
            
            

    	]);
    }
}
