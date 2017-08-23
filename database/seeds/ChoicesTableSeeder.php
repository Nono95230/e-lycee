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

            //QCM 1 : 15 questions : Niveau première
            [   
                'content'       => 'Isaac Newton était un savant anglais.',
                'status'        => 'yes',
                'question_id'   => '1'
            ],
            [   
                'content'       => 'Isaac Newton était un homme politique américain.',
                'status'        => 'no',
                'question_id'   => '1'
            ],
            [   
                'content'       => 'Isaac Newton était un musicien de jazz.',
                'status'        => 'no',
                'question_id'   => '1'
            ],
            [   
                'content'       => 'Isaac Newton était un premier ministre israélien.',
                'status'        => 'no',
                'question_id'   => '1'
            ],
            [   
                'content'       => 'Pendant ses deux septennats, François Mitterrand a nommé 3 premiers ministres.',
                'status'        => 'no',
                'question_id'   => '1'
            ],
            [   
                'content'       => 'Pendant ses deux septennats, François Mitterrand a nommé 5 premiers ministres.',
                'status'        => 'no',
                'question_id'   => '1'
            ],
            [   
                'content'       => 'Pendant ses deux septennats, François Mitterrand a nommé 7 premiers ministres.',
                'status'        => 'yes',
                'question_id'   => '1'
            ],
            [   
                'content'       => 'Le 6 juin 1944 s\'est produit :  L\'appel du général de Gaulle à ne pas capituler.',
                'status'        => 'no',
                'question_id'   => '1'
            ],
            [   
                'content'       => 'Le 6 juin 1944 s\'est produit : Le débarquement allié en Normandie.',
                'status'        => 'yes',
                'question_id'   => '1'
            ],
            [   
                'content'       => 'Le 6 juin 1944 s\'est produit : L\'armistice de la Seconde Guerre mondiale.',
                'status'        => 'no',
                'question_id'   => '1'
            ],
            [   
                'content'       => '« C\'est un petit pas pour l\'homme, mais un bond de géant pour l\' humanité ». Cette phrase célèbre a été prononcée en 1968 par John Kennedy.',
                'status'        => 'no',
                'question_id'   => '1'
            ],
            [   
                'content'       => '« C\'est un petit pas pour l\'homme, mais un bond de géant pour l\' humanité ». Cette phrase célèbre a été prononcée en 1969 par Neil Amstrong.',
                'status'        => 'yes',
                'question_id'   => '1'
            ],
            [   
                'content'       => '« C\'est un petit pas pour l\'homme, mais un bond de géant pour l\' humanité ». Cette phrase célèbre a été prononcée en 1971 par Martin Luther King.',
                'status'        => 'no',
                'question_id'   => '1'
            ],
            [   
                'content'       => 'Le président des États-Unis John Kennedy a été mêlé à l\'affaire dite du Watergate.',
                'status'        => 'no',
                'question_id'   => '1'
            ],
            [   
                'content'       => 'Le président des États-Unis Richard Nixon a été mêlé à l\'affaire dite du Watergate.',
                'status'        => 'yes',
                'question_id'   => '1'
            ],
            //QCM 2 : 12 questions : Niveau première
            [   
                'content'       => 'La première République française a été proclamée en 1792.',
                'status'        => 'yes',
                'question_id'   => '2'
            ],
            [   
                'content'       => 'La première République française a été proclamée en 1789.',
                'status'        => 'no',
                'question_id'   => '2'
            ],
            [   
                'content'       => 'La première République française a été proclamée en 1794.',
                'status'        => 'no',
                'question_id'   => '2'
            ],
            [   
                'content'       => 'Louis XVI s\'est fait arrêter à Versailles par les sans-culotte.',
                'status'        => 'no',
                'question_id'   => '2'
            ],
            [   
                'content'       => 'Sous la Quatrième République, le chef de l\'État était élu par les députés et sénateurs.',
                'status'        => 'yes',
                'question_id'   => '2'
            ],
            [   
                'content'       => 'Sous la Quatrième République, le chef de l\'État était élu au suffrage universel.',
                'status'        => 'no',
                'question_id'   => '2'
            ],
            [   
                'content'       => 'Sous la Quatrième République, le chef de l\'État était nommé par le Conseil d\'État.',
                'status'        => 'no',
                'question_id'   => '2'
            ],
            [   
                'content'       => 'L\'Académie française a été créée sous Louis XIII.',
                'status'        => 'yes',
                'question_id'   => '2'
            ],
            [   
                'content'       => 'L\'Académie française a été créée sous Louis XIV.',
                'status'        => 'no',
                'question_id'   => '2'
            ],
            [   
                'content'       => 'L\'Académie française a été créée sous Napoléon 1er.',
                'status'        => 'no',
                'question_id'   => '2'
            ],
            [
                'content'       => 'Christophe Colomb a découvert l\'Amérique en 1492.',
                'status'        => 'yes',
                'question_id'   => '2'
            ],
            [   
                'content'       => 'Christophe Colomb a découvert l\'Amérique en 1515.',
                'status'        => 'no',
                'question_id'   => '2'
            ],
            //QCM 3 : 15 questions : Niveau terminale
            [   
                'content'       => 'Le procès de Nuremberg a eu lieu en 1945.',
                'status'        => 'yes',
                'question_id'   => '3'
            ],
            [   
                'content'       => 'Le procès de Nuremberg a eu lieu en 1948.',
                'status'        => 'no',
                'question_id'   => '3'
            ],
            [   
                'content'       => 'La révocation de l\'Édit de Nantes a instauré le rattachement de la Vendée à la France.',
                'status'        => 'no',
                'question_id'   => '3'
            ],
            [   
                'content'       => 'La révocation de l\'Édit de Nantes a instauré l\'interdiction du protestantisme.',
                'status'        => 'yes',
                'question_id'   => '3'
            ],
            [   
                'content'       => 'Le conflit des Malouines a opposé le Royaume-Uni au Chili.',
                'status'        => 'no',
                'question_id'   => '3'
            ],
            [   
                'content'       => 'Le conflit des Malouines a opposé le Royaume-Uni à l\'Argentine.',
                'status'        => 'yes',
                'question_id'   => '3'
            ],
            [   
                'content'       => 'Alexandrie, la ville fondée par Alexandre le Grand se trouvait en Macédoine.',
                'status'        => 'no',
                'question_id'   => '3'
            ],
            [   
                'content'       => 'Alexandrie, la ville fondée par Alexandre le Grand se trouvait en Egypte.',
                'status'        => 'yes',
                'question_id'   => '3'
            ],
            [   
                'content'       => 'Alexandrie, la ville fondée par Alexandre le Grand se trouvait en Grèce.',
                'status'        => 'no',
                'question_id'   => '3'
            ],
            [   
                'content'       => 'Henri IV était issu de la famille des Bourbons.',
                'status'        => 'yes',
                'question_id'   => '3'
            ],
            [   
                'content'       => 'Henri IV était issu de la famille des Artois.',
                'status'        => 'no',
                'question_id'   => '3'
            ],
            [   
                'content'       => 'Mohandas Gandhi, était surnommé Mahatma. Ce surnom signifie "L\'éveillé".',
                'status'        => 'no',
                'question_id'   => '3'
            ],
            [   
                'content'       => 'Mohandas Gandhi, était surnommé Mahatma. Ce surnom signifie "Grande âme".',
                'status'        => 'yes',
                'question_id'   => '3'
            ],
            [   
                'content'       => 'Mohandas Gandhi, était surnommé Mahatma. Ce surnom signifie "Indépendant".',
                'status'        => 'no',
                'question_id'   => '3'
            ],
            [   
                'content'       => 'Mohandas Gandhi, était surnommé Mahatma. Ce surnom signifie "Sage dans ses paroles".',
                'status'        => 'no',
                'question_id'   => '3'
            ],
            //QCM 4 : 12 questions : Niveau terminale
            [   
                'content'       => 'Louis XVI a été arrêté à Varennes alors qu\'il tentait de fuir la France en 1791.',
                'status'        => 'yes',
                'question_id'   => '4'
            ],
            [   
                'content'       => 'Louis XVI a été arrêté à Varennes alors qu\'il tentait de fuir la France en 1789.',
                'status'        => 'no',
                'question_id'   => '4'
            ],
            [   
                'content'       => 'Louis XVI a été arrêté à Varennes alors qu\'il tentait de fuir la France en 1790.',
                'status'        => 'no',
                'question_id'   => '4'
            ],
            [   
                'content'       => 'L\'État du Suriname se trouve en Afrique.',
                'status'        => 'no',
                'question_id'   => '4'
            ],
            [   
                'content'       => 'L\'État du Suriname se trouve en Amérique du Sud.',
                'status'        => 'yes',
                'question_id'   => '4'
            ],
            [   
                'content'       => 'L\'État du Suriname se trouve en Asie.',
                'status'        => 'no',
                'question_id'   => '4'
            ],
            [   
                'content'       => 'La bataille de Marignan s\'est déroulé en 1515.',
                'status'        => 'yes',
                'question_id'   => '2'
            ],
            [   
                'content'       => 'La bataille de Marignan s\'est déroulé en 1615.',
                'status'        => 'no',
                'question_id'   => '2'
            ],
            [   
                'content'       => 'La bataille de Marignan s\'est déroulé en 1415.',
                'status'        => 'no',
                'question_id'   => '2'
            ],
            [   
                'content'       => 'La couleur du cheval Blanc d\'henri IV était : Noir et Blanc.',
                'status'        => 'no',
                'question_id'   => '4'
            ],
            [   
                'content'       => 'La couleur du cheval Blanc d\'henri IV était : Marron.',
                'status'        => 'no',
                'question_id'   => '4'
            ],
            [   
                'content'       => 'La couleur du cheval Blanc d\'henri IV était : Blanc.',
                'status'        => 'yes',
                'question_id'   => '4'
            ],
    	]);
    }
}
