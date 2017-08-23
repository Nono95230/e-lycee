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
                'status'        => 'unpublished',
                'published_at'  => null
            ],
            [   
                'user_id'       => '1',
                'title'         => 'FIFA 18',
                'abstract'      => 'Les icônes FUT comptent triple dans FIFA 18',
                'content'       => 'EA Sports a dévoilé de nouvelles fonctionnalités pour le très lucratif mode Ultimate Team de son FIFA 18. Un épisode qui signe l\'arrivée des légendes/icônes sur toutes les plateformes principales (PS4, Xbox One, Switch et PC).',
                'url_thumbnail' => 'fifa.jpg',
                'status'        => 'published',
                'published_at'  => '2017-04-15 16:56:10'
            ],
            [   
                'user_id'       => '1',
                'title'         => 'Dragon Quest XI',
                'abstract'      => 'Le Japon répond présent pour Dragon Quest XI',
                'content'       => 'Les chiffres de Dragon Quest XI sont tombés et ils ont de quoi ravir les amateurs de grosses performances avec un total de 2 080 806 exemplaires écoulés en l\'espace de 2 jours, selon les estimations de Famitsu, qui n\'incluent même pas les ventes en téléchargement. Les générations passent, mais l\'aura de Dragon Quest brûle encore très fort.',
                'url_thumbnail' => 'dragon.jpg',
                'status'        => 'published',
                'published_at'  => '2017-05-17 15:45:10'
            ],
            [   
                'user_id'       => '1',
                'title'         => 'The Lost Bear',
                'abstract'      => 'The Lost Bear cherche son chemin en VR',
                'content'       => 'Le carnet rose a pour ambition pas si extravagante de se pencher chaque matin sur la découverte quotidienne d\'un nouveau jeu vidéo, que celui-ci ait été fraîchement annoncé ou simplement détecté tardivement par le radar de la rédaction, que l\'on parle d\'un jeu indépendant aux parents sans le moindre pédigree ou du nouveau rejeton d\'une franchise établie.',
                'url_thumbnail' => 'lost.jpg',
                'status'        => 'published',
                'published_at'  => '2017-08-12 09:25:10'
            ],[   
                'user_id'       => '1',
                'title'         => 'Hob',
                'abstract'      => 'Hob a maintenant une date de sortie',
                'content'       => 'Il fallait bien que cela arrive un jour, Runic Games a dévoilé la date de sortie de Hob, un jeu d\'exploration qui s\'est offert quelques apparitions sporadiques depuis son annonce il y a maintenant deux ans. La nouvelle création du studio jusqu\'ici connu pour Torchlight sera disponible le 26 septembre sur PS4 et PC au tarif de 20 euros.',
                'url_thumbnail' => 'hob.jpg',
                'status'        => 'unpublished',
                'published_at'  => null
            ],
            [   
                'user_id'       => '1',
                'title'         => '10 août 1792 : prise des Tuileries',
                'abstract'      => 'Le 10 août 1792, les Sans-culottes s\'emparent du Palais des Tuileries et emprisonnent Louis XVI et sa famille au Temple.',
                'content'       => 'Le 10 août 1792, les Sans-culottes s\'emparent du Palais des Tuileries et emprisonnent Louis XVI et sa famille au Temple.
                                    Lors de cette journée sanglante qui marque la fin de la monarchie constitutionnelle, le roi est encore défendu par les « Gardes-Suisses », souvent cités mais bien mal connus.
                                    Le 10 août 1792, quatre cents « Gardes-Suisses », une véritable troupe d\'élite de l\'armée royale, furent massacrés aux Tuileries alors qu\'ils défendaient Louis XVI dont ils étaient les derniers fidèles.',
                'url_thumbnail' => 'prise_tuilerie.jpg',
                'status'        => 'unpublished',
                'published_at'  =>  null
            ],
            [   
                'user_id'       => '1',
                'title'         => 'Trajan vs Hadrien. Deux empereurs en miroir',
                'abstract'      => 'En 117, l\'empereur Trajan mourait et Hadrien lui succédait à la tête de l\'Empire romain. L\'histoire en a fait des modèles opposés.',
                'content'       => 'En 117, l\'empereur Trajan mourait et Hadrien lui succédait à la tête de l\'Empire romain. L\'histoire en a fait des modèles opposés.
                                    Trajan, devenu empereur de Rome en janvier 98, peu après son adoption par Nerva, est mort à Sélinonte, petite ville de Cilicie, au sud de l\'actuelle Turquie, dans la nuit du 8 au 9 août 117. Quelques jours plus tard, son parent et ancien pupille Hadrien, que l\'empereur défunt aurait, selon l\'impératrice Plotine, adopté sur son lit de mort, était proclamé empereur par les troupes de Syrie ; le sénat confirma avec plus ou moins bonne grâce sa nomination. Hadrien régna près de vingt et un ans, jusqu\'à sa mort en juillet 138.
                                    A première vue, tout oppose la manière dont ont été représentées ces deux figures, à leur époque et dans les siècles suivants. Trajan, regardé de son vivant comme « le meilleur des empereurs » (optimus princeps), apparaît comme un prince conquérant, qui chercha à étendre les frontières de l\'empire. Il jouit depuis le VIIIe siècle d\'une excellente réputation dans les milieux chrétiens, si bien que Dante voit en lui un des très rares païens à avoir accédé au paradis.
                                    L\'image d\'Hadrien, plus complexe et contrastée selon les périodes, a souvent été opposée à celle de son prédécesseur : esthète, ami des arts et de la culture hellénique, il est regardé par les historiens classiques comme celui qui a mis fin à l\'expansion en retranchant l\'Empire romain derrière le limes (ensemble de fortifications au long de la frontière de l\'empire). Ces représentations ont sans doute été actives dès le début du règne d\'Hadrien, qui s\'est situé dans la continuité de son prédécesseur, tout en s\'en démarquant. Elles se poursuivent jusqu\'aux productions historiques et artistiques les plus récentes, à commencer par le magnifique récit de Marguerite Yourcenar, Mémoires d\'Hadrien (Plon, 1951).
                                    Or bien des traits rapprochent ces deux personnages ; leurs portraits contraires sont en grande partie des constructions de la postérité. Appartenant tous deux à une famille de colons romains implantés en Bétique (Andalousie), ils sont les premiers Romains provinciaux à accéder à l\'empire. Ils sont apparentés (et même doublement par le mariage d\'Hadrien avec Sabine, la petite-nièce de Trajan), ce qui n\'est pas anecdotique puisque lors de la succession de 117 la logique de la parenté l\'a visiblement emporté sur le discours faisant valoir l\'optimus princeps.
                                    Tous deux ont aussi reçu une formation militaire : ce qui semble évident pour Trajan est aussi vrai du jeune Hadrien, qui a participé à bien des campagnes, comme celles contre les Daces.On a pu voir en Hadrien (en tout anachronisme) une figure de l\'homosexualité antique. La relation qu\'il a entretenue avec le jeune Antinoüs, puis la façon dont il a favorisé sa mémoire en créant son culte tiennent une grande place dans le jugement porté sur Hadrien, en particulier à l\'époque contemporaine : son attitude a été tantôt condamnée, tantôt admirée. Trajan au contraire, qui selon l\'historien Dion Cassius n\'était pas insensible au charme des garçons, n\'a jamais été traité de la sorte : son image de virilité n\'a pas été entamée.
                                    Dans cette répartition, même la pilosité s\'avère éclairante. Trajan est (comme ses prédécesseurs) glabre, alors qu\'Hadrien est (comme ses successeurs) barbu : le menton rasé du premier est celui du soldat romain, quand la barbe de l\'autre est celle du philosophe grec. Cette question d\'apparence triviale touche donc au rapport de chacun des deux empereurs à l\'hellénisme et à l\'art. Or si Hadrien a constamment été représenté comme un esthète, Trajan ne se désintéressait pas de l\'art, comme en témoigne son soutien à l\'architecte Apollodore de Damas1.
                                    La mémoire des deux princes reste de fait associée aux monuments qu\'ils ont patronnés. Les cendres de Trajan furent déposées dans la base de la colonne Trajane, emblématique d\'un prince considéré comme un héros de Rome ; quant au mausolée conçu par Hadrien, il devint le château Saint-Ange, forteresse médiévale. La mémoire d\'Hadrien est aussi associée à d\'autres constructions comme le mur de Bretagne en Écosse ou la célèbre villa de Tivoli près de Rome, symbole de raffinement, caractérisant sa qualité de patron des arts. La restauration du Panthéon est un trait d\'union entre eux : elle place Trajan dans la continuité d\'Auguste, tandis que la coupole révèle les talents architecturaux favorisés par Hadrien.
                                    Ces deux empereurs ont donc été pensés ensemble, comme des modèles quasi caricaturaux de princes diamétralement opposés : viril contre efféminé, conquérant contre prudent, ami du sénat contre meurtrier des « quatre consulaires »2, ouvert contre calculateur, soldat contre esthète. Depuis dix-neuf siècles, on n\'a cessé de comparer Trajan le Romain, défenseur de la tradition des anciens (mos maiorum), et Hadrien, le « petit Grec » (graeculus). Même la typographie reproduit ces stéréotypes : aux caractères Trajan, lettres capitales utilisées dans des génériques de films à grand spectacle, répond la police Hadriano, minuscule élégante et humaniste.',
                'url_thumbnail' => 'Trajan_VS_Hadrien.jpg',
                'status'        => 'published',
                'published_at'  => '2017-06-17 16:56:10'
            ],
            [   
                'user_id'       => '1',
                'title'         => '1532 : La Bretagne devient française',
                'abstract'      => 'Le 4 août 1532, les délégués des états de Bretagne acceptent l\'union de la Bretagne au royaume de France.',
                'content'       => 'Le 4 août 1532, les délégués des états de Bretagne acceptent l\'union de la Bretagne au royaume de France. Mais comment et pourquoi la Bretagne est-elle devenue française ?
                                    Dans notre numéro des Collections de L\'Histoire sur la Bretagne Jean Kerhervé répond à cette question et raconte plus d\'un siècle de conflits entre une monarchie centralisatrice et le véritable État qu\'était alors la Bretagne.
                                    Le contrat (ou le traité) de Vannes, signé en 1532 entre François Ier et les états de Bretagne, transforme le duché en une province française. Pour abolir tout risque d’une renaissance d’une principauté indépendante, le roi désirait qu’une convention de droit public sanctionne définitivement la réunion de la Bretagne au royaume. Mais, pour obtenir cette seigneurie « irrévocable », il fallait l’accord des délégués des états de Bretagne, représentants légaux du pays. Or ces députés avaient déjà manifesté leur hostilité à l’annexion pure et simple et exigé, en vain, que les actes royaux portent la mention expresse du « duché de Bretagne, principauté haute, belle, ample, de force et puissance ». Comment « forcer » les états ?
                                    L’arme principale fut l’argent. Les largesses royales se multiplièrent à la veille de l’acte d’union, pour anesthésier toute velléité d’opposition ; et François Ier gratifia la Bretagne d’un long séjour durant le grand « tour de France » qu’il entreprit en 1531 : en ce XVIe siècle qui voit la construction de l’État absolu, visiter le royaume, c’est gouverner.',
                'url_thumbnail' => 'bretagne_france.png',
                'status'        => 'published',
                'published_at'  => '2017-07-22 15:45:10'
            ],
            [   
                'user_id'       => '1',
                'title'         => '31 juillet 1914 : Jaurès assassiné',
                'abstract'      => 'En ce vendredi 31 juillet 1914, on vit, on aime, on trime comme un beau jour d\'été. Quelques signes, à peine, d\'un danger auquel on ne veut pas croire.',
                'content'       => 'En ce vendredi 31 juillet 1914, on vit, on aime, on trime comme un beau jour d\'été. Quelques signes, à peine, d\'un danger auquel on ne veut pas croire. Lorsque brusquement, Jaurès, qui a tenté de sauver la paix jusqu\'à la dernière minute, est assassiné.
                                    Dans nos archives, Jean-Pierre Rioux raconte cette "dernière journée de paix". Et avec Retronews, consultez le dernier éditorial de Jaurès ainsi que l\'annonce de sa mort dans L\'Humanité.',
                'url_thumbnail' => 'Jean_Jaures.png',
                'status'        => 'published',
                'published_at'  => '2017-07-21 15:45:10'
            ],
            [   
                'user_id'       => '1',
                'title'         => '28 juillet 1667 : Prise de Lille par Louis XIV',
                'abstract'      => 'Il y a 350 ans, grâce aux travaux de siège dirigés par Vauban, Lille est prise par Louis XIV sans grandes difficultés.',
                'content'       => 'Il y a 350 ans, grâce aux travaux de siège dirigés par Vauban, Lille est prise par Louis XIV sans grandes difficultés.
                                    Dans notre feuilleton sur Vauban, Joël Cornette revient sur cette victoire qui permis à l\'ingénieur de s\'imposer et de réfléchir à la façon dont il pourrait rendre la ville et sa forteresse imprenables.
                                    A lire : "Lille, la plus belle citadelle", Joël Cornette, L\'Histoire n°319, avril 2007. (accès libre)',
                'url_thumbnail' => 'siege_de_lille.jpg',
                'status'        => 'published',
                'published_at'  => '2017-07-20 15:45:10'
            ],
            [   
                'user_id'       => '1',
                'title'         => '27 juillet 1794 : chute de Robespierre',
                'abstract'      => 'Le 27 juillet 1794 (9 thermidor an II), accusé de tyrannie, Robespierre est arrêté par la Convention et guillotiné dès le lendemain.',
                'content'       => 'Le 27 juillet 1794 (9 thermidor an II), accusé de tyrannie, Robespierre est arrêté par la Convention et guillotiné dès le lendemain. La chute de l’ancienne idole de la Révolution a fait couler beaucoup d’encre. Que sait-on exactement des derniers jours de l’Incorruptible ?
                                    Parmi les journées qui ont fait la France, le 9 thermidor an II (27 juillet 1794) occupe une place singulière. Souvent ramenée à deux formules choc - « chute de Robespierre » et « fin de la Terreur » -, elle sert à marquer la fin de la Révolution française. Ligne de partage des eaux, elle est exclue de la série des grandes « journées révolutionnaires » qui virent intervenir le peuple (à l\'assaut de la Bastille le 14 juillet 1789 ou des Tuileries le 10 août 1792). Elle apparaît plutôt comme un règlement de comptes entre factions (comme lorsque le 2 juin 1793 les Girondins furent éliminés par les Montagnards).
                                    La vulgate en est bien établie : ce jour-là, une coalition de révolutionnaires, opposée à la toute-puissance de Robespierre, élimine le tyran et met un terme à la Terreur qu\'il avait incarnée.
                                    Sous l\'épaisseur des mythologies, des inventions et des interprétations, l\'examen des faits raconte une autre histoire : celle d\'une crise de gouvernement, un coup d\'État préventif, exécuté dans une grande improvisation par d\'anciens collègues de Robespierre qui, par un tour de passe-passe réussi, ont fait oublier leurs propres responsabilités.
                                    Le film des événements débute le 8 thermidor an II (26 juillet 1794), à 10 heures. Après trois semaines d\'absence à la Convention, Robespierre vient y prononcer un long discours d\'environ deux heures. Commençant par se présenter comme un « martyr vivant de la République », antienne bien connue, il exhorte ensuite le « peuple » à se rappeler que, « si dans la République, la justice ne règne pas avec un empire absolu, la liberté n\'est qu\'un vain mot ». Il conclut en appelant à se débarrasser d\'une « ligue de fripons ».
                                    Il parle d\'« hommes corrompus » sans les nommer, tout en dénonçant les responsables d\'une « fiscalité dévorante », en premier lieu Cambon, le tout-puissant chef du Comité des finances. A l\'initiative de Couthon, un proche de Robespierre, l\'Assemblée vote la publication de son discours. Mais Cambon explose : « Avant d\'être déshonoré, je parlerai à la France » et, pour sa défense, il accuse Robespierre de « paralyser la volonté de la Convention » et d\'« être presque tout ».
                                    Ce qui suit est inattendu : Robespierre bat en retraite, assurant ne pas se « mêler » des finances. Il refuse également de nommer les corrompus à Billaud-Varenne qui l\'exige. Malgré le vote de la Convention, le discours ne sera pas imprimé !
                                    Ce qui pourrait n\'être qu\'un incident sans importance signale, dans le monde si normé de la Convention, qu\'une lutte entre révolutionnaires est engagée. La preuve en est donnée le soir même. Devant le club des Jacobins, Robespierre énonce le même discours. La salle l\'acclame et conspue Billaud-Varenne et Collot d\'Herbois, également présents dans la salle, et ouvertement opposés à lui depuis l\'été. Dumas, le président du Tribunal révolutionnaire, menace même les deux hommes, criant qu\'il les verra demain pour les juger tandis que les slogans « A la guillotine ! » retentissent. Toute conciliation est devenue impossible.',
                'url_thumbnail' => 'ChuteRobespierre.png',
                'status'        => 'published',
                'published_at'  => '2017-07-24 15:45:10'
            ],
            [   
                'user_id'       => '1',
                'title'         => '19 juillet 1900 : Mise en service du métro parisien',
                'abstract'      => 'Le 19 juillet 1900, les premiers trains du métro parisien entrent en service à l\'occasion de l\'Exposition universelle.',
                'content'       => 'Le 19 juillet 1900, les premiers trains du métro parisien entrent en service à l\'occasion de l\'Exposition universelle.
                                    Le nouveau mode de transport connaît immédiatement le succès. Prouesses techniques, débats politiques et esthétiques : voici la grande saga du métro parisien racontée dans nos archives par Roger-Henri Guerrand.
                                    Et en partenariat avec Retronews, consultez les articles de journaux publiés à la naissance du métropolitain.
                                    Dans nos archives, Roger-Henri Guerrand raconte la grande saga du métro parisien : "La saga du métropolitain", Les Collections de L\'Histoire n°9, octobre 2000. (accès libre)',
                'url_thumbnail' => 'metro_mis_en_service.jpg',
                'status'        => 'published',
                'published_at'  => '2017-07-25 15:45:10'
            ]
            
            

    	]);
    }
}
