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
        // Insertion dans la table CHOICES
        DB::table('questions')->insert([

            //QCM 1 : 15 questions : Niveau première
            [   
                'content'       => 'Isaac Newton était un savant anglais.',
                'answer'        => 'yes',
                'qcm_id'   => '1'
            ],
            [   
                'content'       => 'Isaac Newton était un homme politique américain.',
                'answer'        => 'no',
                'qcm_id'   => '1'
            ],
            [   
                'content'       => 'Isaac Newton était un musicien de jazz.',
                'answer'        => 'no',
                'qcm_id'   => '1'
            ],
            [   
                'content'       => 'Isaac Newton était un premier ministre israélien.',
                'answer'        => 'no',
                'qcm_id'   => '1'
            ],
            [   
                'content'       => 'Pendant ses deux septennats, François Mitterrand a nommé 3 premiers ministres.',
                'answer'        => 'no',
                'qcm_id'   => '1'
            ],
            [   
                'content'       => 'Pendant ses deux septennats, François Mitterrand a nommé 5 premiers ministres.',
                'answer'        => 'no',
                'qcm_id'   => '1'
            ],
            [   
                'content'       => 'Pendant ses deux septennats, François Mitterrand a nommé 7 premiers ministres.',
                'answer'        => 'yes',
                'qcm_id'   => '1'
            ],
            [   
                'content'       => 'Le 6 juin 1944 s\'est produit :  L\'appel du général de Gaulle à ne pas capituler.',
                'answer'        => 'no',
                'qcm_id'   => '1'
            ],
            [   
                'content'       => 'Le 6 juin 1944 s\'est produit : Le débarquement allié en Normandie.',
                'answer'        => 'yes',
                'qcm_id'   => '1'
            ],
            [   
                'content'       => 'Le 6 juin 1944 s\'est produit : L\'armistice de la Seconde Guerre mondiale.',
                'answer'        => 'no',
                'qcm_id'   => '1'
            ],
            [   
                'content'       => '« C\'est un petit pas pour l\'homme, mais un bond de géant pour l\' humanité ». Cette phrase célèbre a été prononcée en 1968 par John Kennedy.',
                'answer'        => 'no',
                'qcm_id'   => '1'
            ],
            [   
                'content'       => '« C\'est un petit pas pour l\'homme, mais un bond de géant pour l\' humanité ». Cette phrase célèbre a été prononcée en 1969 par Neil Amstrong.',
                'answer'        => 'yes',
                'qcm_id'   => '1'
            ],
            [   
                'content'       => '« C\'est un petit pas pour l\'homme, mais un bond de géant pour l\' humanité ». Cette phrase célèbre a été prononcée en 1971 par Martin Luther King.',
                'answer'        => 'no',
                'qcm_id'   => '1'
            ],
            [   
                'content'       => 'Le président des États-Unis John Kennedy a été mêlé à l\'affaire dite du Watergate.',
                'answer'        => 'no',
                'qcm_id'   => '1'
            ],
            [   
                'content'       => 'Le président des États-Unis Richard Nixon a été mêlé à l\'affaire dite du Watergate.',
                'answer'        => 'yes',
                'qcm_id'   => '1'
            ],
            //QCM 2 : 12 questions : Niveau première
            [   
                'content'       => 'La première République française a été proclamée en 1792.',
                'answer'        => 'yes',
                'qcm_id'   => '2'
            ],
            [   
                'content'       => 'La première République française a été proclamée en 1789.',
                'answer'        => 'no',
                'qcm_id'   => '2'
            ],
            [   
                'content'       => 'La première République française a été proclamée en 1794.',
                'answer'        => 'no',
                'qcm_id'   => '2'
            ],
            [   
                'content'       => 'Louis XVI s\'est fait arrêter à Versailles par les sans-culotte.',
                'answer'        => 'no',
                'qcm_id'   => '2'
            ],
            [   
                'content'       => 'Sous la Quatrième République, le chef de l\'État était élu par les députés et sénateurs.',
                'answer'        => 'yes',
                'qcm_id'   => '2'
            ],
            [   
                'content'       => 'Sous la Quatrième République, le chef de l\'État était élu au suffrage universel.',
                'answer'        => 'no',
                'qcm_id'   => '2'
            ],
            [   
                'content'       => 'Sous la Quatrième République, le chef de l\'État était nommé par le Conseil d\'État.',
                'answer'        => 'no',
                'qcm_id'   => '2'
            ],
            [   
                'content'       => 'L\'Académie française a été créée sous Louis XIII.',
                'answer'        => 'yes',
                'qcm_id'   => '2'
            ],
            [   
                'content'       => 'L\'Académie française a été créée sous Louis XIV.',
                'answer'        => 'no',
                'qcm_id'   => '2'
            ],
            [   
                'content'       => 'L\'Académie française a été créée sous Napoléon 1er.',
                'answer'        => 'no',
                'qcm_id'   => '2'
            ],
            [
                'content'       => 'Christophe Colomb a découvert l\'Amérique en 1492.',
                'answer'        => 'yes',
                'qcm_id'   => '2'
            ],
            [   
                'content'       => 'Christophe Colomb a découvert l\'Amérique en 1515.',
                'answer'        => 'no',
                'qcm_id'   => '2'
            ],
            //QCM 3 : 15 questions : Niveau terminale
            [   
                'content'       => 'Le procès de Nuremberg a eu lieu en 1945.',
                'answer'        => 'yes',
                'qcm_id'   => '3'
            ],
            [   
                'content'       => 'Le procès de Nuremberg a eu lieu en 1948.',
                'answer'        => 'no',
                'qcm_id'   => '3'
            ],
            [   
                'content'       => 'La révocation de l\'Édit de Nantes a instauré le rattachement de la Vendée à la France.',
                'answer'        => 'no',
                'qcm_id'   => '3'
            ],
            [   
                'content'       => 'La révocation de l\'Édit de Nantes a instauré l\'interdiction du protestantisme.',
                'answer'        => 'yes',
                'qcm_id'   => '3'
            ],
            [   
                'content'       => 'Le conflit des Malouines a opposé le Royaume-Uni au Chili.',
                'answer'        => 'no',
                'qcm_id'   => '3'
            ],
            [   
                'content'       => 'Le conflit des Malouines a opposé le Royaume-Uni à l\'Argentine.',
                'answer'        => 'yes',
                'qcm_id'   => '3'
            ],
            [   
                'content'       => 'Alexandrie, la ville fondée par Alexandre le Grand se trouvait en Macédoine.',
                'answer'        => 'no',
                'qcm_id'   => '3'
            ],
            [   
                'content'       => 'Alexandrie, la ville fondée par Alexandre le Grand se trouvait en Egypte.',
                'answer'        => 'yes',
                'qcm_id'   => '3'
            ],
            [   
                'content'       => 'Alexandrie, la ville fondée par Alexandre le Grand se trouvait en Grèce.',
                'answer'        => 'no',
                'qcm_id'   => '3'
            ],
            [   
                'content'       => 'Henri IV était issu de la famille des Bourbons.',
                'answer'        => 'yes',
                'qcm_id'   => '3'
            ],
            [   
                'content'       => 'Henri IV était issu de la famille des Artois.',
                'answer'        => 'no',
                'qcm_id'   => '3'
            ],
            [   
                'content'       => 'Mohandas Gandhi, était surnommé Mahatma. Ce surnom signifie "L\'éveillé".',
                'answer'        => 'no',
                'qcm_id'   => '3'
            ],
            [   
                'content'       => 'Mohandas Gandhi, était surnommé Mahatma. Ce surnom signifie "Grande âme".',
                'answer'        => 'yes',
                'qcm_id'   => '3'
            ],
            [   
                'content'       => 'Mohandas Gandhi, était surnommé Mahatma. Ce surnom signifie "Indépendant".',
                'answer'        => 'no',
                'qcm_id'   => '3'
            ],
            [   
                'content'       => 'Mohandas Gandhi, était surnommé Mahatma. Ce surnom signifie "Sage dans ses paroles".',
                'answer'        => 'no',
                'qcm_id'   => '3'
            ],
            //QCM 4 : 12 questions : Niveau terminale
            [   
                'content'       => 'Louis XVI a été arrêté à Varennes alors qu\'il tentait de fuir la France en 1791.',
                'answer'        => 'yes',
                'qcm_id'   => '4'
            ],
            [   
                'content'       => 'Louis XVI a été arrêté à Varennes alors qu\'il tentait de fuir la France en 1789.',
                'answer'        => 'no',
                'qcm_id'   => '4'
            ],
            [   
                'content'       => 'Louis XVI a été arrêté à Varennes alors qu\'il tentait de fuir la France en 1790.',
                'answer'        => 'no',
                'qcm_id'   => '4'
            ],
            [   
                'content'       => 'L\'État du Suriname se trouve en Afrique.',
                'answer'        => 'no',
                'qcm_id'   => '4'
            ],
            [   
                'content'       => 'L\'État du Suriname se trouve en Amérique du Sud.',
                'answer'        => 'yes',
                'qcm_id'   => '4'
            ],
            [   
                'content'       => 'L\'État du Suriname se trouve en Asie.',
                'answer'        => 'no',
                'qcm_id'   => '4'
            ],
            [   
                'content'       => 'La bataille de Marignan s\'est déroulé en 1515.',
                'answer'        => 'yes',
                'qcm_id'   => '2'
            ],
            [   
                'content'       => 'La bataille de Marignan s\'est déroulé en 1615.',
                'answer'        => 'no',
                'qcm_id'   => '2'
            ],
            [   
                'content'       => 'La bataille de Marignan s\'est déroulé en 1415.',
                'answer'        => 'no',
                'qcm_id'   => '2'
            ],
            [   
                'content'       => 'La couleur du cheval Blanc d\'henri IV était : Noir et Blanc.',
                'answer'        => 'no',
                'qcm_id'   => '4'
            ],
            [   
                'content'       => 'La couleur du cheval Blanc d\'henri IV était : Marron.',
                'answer'        => 'no',
                'qcm_id'   => '4'
            ],
            [   
                'content'       => 'La couleur du cheval Blanc d\'henri IV était : Blanc.',
                'answer'        => 'yes',
                'qcm_id'   => '4'
            ],
    	]);
    }
}
