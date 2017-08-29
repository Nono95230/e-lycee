@extends('layouts.front')

@section('title', $title)

@section('sidebar')
    @parent
@endsection

@section('stylesheet')
    <!-- CSS Présentation Lycée -->
    <link href="{{ url('css/presentation-lycee.css')}}" rel="stylesheet">
@endsection

@section('content')
<h1>Un établissement de tradition d'excellence d'ouverture et d'innovation</h1>

<div>
    <img src="{{ url('image-site/lycee.jpg')}}" alt="Photo de notre lycée" title="Notre lycée">
</div>
<div>
    <h3>Un site lié à l'histoire de France et à celle de l'Université de Paris</h3>
    <p>La cité scolaire de notre lycée occupe les bâtiments de l'ancienne Abbaye Sainte Geneviève. Edifié par la volonté du Roi Clovis, premier roi Franc chrétien catholique et de son épouse Clotilde, au tout début du VIème siècle, cet établissement religieux est donc né à un moment où se constituait le premier royaume des Francs, les débuts de la France. Il abritait le tombeau de Geneviève, auprès de laquelle ont été inhumés Clovis et Clotilde. Après les temps difficiles des incursions des Vikings, cette Abbaye a connu une remarquable période de prospérité qui lui a permis de devenir, au milieu du Moyen Age, et avec sa concurrente, l'Abbaye Saint Victor (dont l'emplacement est aujourd'hui occupé par l'Université de Jussieu), un des lieux de naissance de l'Université de Paris. Celle-ci fut établie durablement au tout début du 13ème siècle, par une charte de Philippe Auguste, qui plaça ses sceaux sous la protection de l'abbé de Sainte Geneviève. Ainsi, ce lieu est-il fréquenté par des maîtres tels que le célèbre Abélard, et des étudiants, depuis plus de huit cents ans.</p>

    <p>Après un fort déclin pendant la période des guerres de religion, l'Abbaye connut un nouvel essor, grâce à la volonté du roi Louis XIII qui plaça à sa tête un grand ecclésiastique, le Cardinal de La Rochefoucauld, qui en fit un des fers de lance de la Contre Réforme, créant la congrégation des chanoines de Sainte Geneviève et installant sa bibliothèque dont ses successeurs assurèrent le développement, jusqu'à devenir la deuxième plus grande du royaume à la fin du XVIIIème siècle.</p>
</div>
<div>
    <h3>Un grand lycée</h3>


    <p>Sécularisés au début de la Révolution, les bâtiments furent affectés à l'enseignement dès 1796, devenant l'Ecole Centrale du Panthéon, puis le Lycée Napoléon en 1804. Après plusieurs changements, il devint définitivement, le Lycée à partir de 1873.</p>

    <p>Cet établissement est demeuré une cité scolaire car, s'il a perdu ses classes primaires au début des années 1960, il a conservé un 1er cycle qui constitue un collège de près de 700 élèves. Il a connu une forte croissance de ses effectifs au cours des années 1980-1990, grâce à la création de nouvelles classes préparatoires aux Grandes Ecoles.</p>
</div>
<div>
    <h3>La tradition de l'élitisme républicain</h3>

    <p>La cité scolaire accueille aujourd'hui près de 2 700 élèves, dont plus de 1 100 dans ses classes post bac. Elle constitue un des plus gros établissements de France et le deuxième de Paris par la taille, derrière le Lycée Janson de Sailly. Et, si son collège, qui est strictement sectorisé, scolarise presqu'exclusivement des enfants du quartier, le second cycle accueille, sur sélection au mérite, des jeunes issus de toute l'Ile de France, dont 15 à 17% issus de zones d'éducation prioritaire, perpétuant la tradition d'un élitisme républicain de bon aloi clairement assumé par la direction de l'établissement et confirmé au fil du temps par les autorités académiques. Quant aux classes préparatoires aux Grandes Ecoles (CPGE), elles recrutent près de la moitié de leurs effectifs hors d'Ile de France et bien au-delà de nos frontières.</p>
</div>

<div>
    <h3>Excellence, ouverture et innovation</h3>

    <p>Aujourd'hui, le Lycée se revendique comme un établissement d'excellence ce dont attestent ses résultats : 99 à 100% de réussite au diplôme national du brevet, 100 % de réussite au baccalauréat avec près de 99 % de mentions et 78 % de mentions TB, 95 % de ses bacheliers poursuivant des études supérieures sélectives (CPGE, médecine, droit, sciences politiques..), une moisson annuelle de prix ou récompenses au Concours Général des lycées et aux Olympiades de maths ou de sciences, et des intégrations massives dans les Grandes Ecoles les plus prestigieuses.</p>

    <p>A ce titre, l'année 2016 apparaît comme un très bon cru avec un cumul de 1ères places et notamment aux concours de l'ENS de Paris (en lettres classiques AL en BL, et en Bio), à l'Ecole Polytechnique, à l'ENS de Cachan (Maths et anglais) à HEC, à l'Agro Paris, à l'Ecole des Mines, à l'Ecole des Chartes. Au total, chaque année, 1 normalien sur 5 (toutes filières confondues) sort du lycée, 1 sur 3 en lettres (et même près de 1 sur 2 à l'ENS Paris). 30 % des élèves présentés réussissent le concours de l'X. Et, pour HEC, le lycée est toujours le premier lycée pourvoyeur ! Des résultats dans la tradition d'un établissement qui ne compte pas moins de quatre Prix Nobel parmi ses anciens élèves.</p>

    <p>Mais, au-delà de ses remarquables résultats qui lui valent sa renommée et sa croissante attractivité, l'établissement est aussi un lieu très ouvert à la diversité comme à l'innovation, s'étant fortement engagé en faveur de la promotion du mérite et de l'égalité des chances. Cela s'est traduit en second cycle par les partenariats développés avec des collèges de ZEP et, en CPGE, par une politique volontariste très innovante, permettant d'accueillir un nombre croissant d'étudiants boursiers sociaux (7 à 8 % jusqu'à la rentrée 2005, 30 % depuis la rentrée 2012 !), tout en consolidant les résultats aux concours comme en attestent les palmarès publiés chaque année par les magazines spécialisés.</p>

    <p>De plus, après avoir ouvert une classe expérimentale pour des étudiants méritants boursiers issus de milieux sociaux très modestes, l'établissement est devenu membre d'une prestigieuse communauté de grands établissements et d'universités, Paris Sciences et Lettres (PSL*) aux côtés notamment de l'Ecole Normale Supérieure, de l'Ecole des Mines, de l'ESPCI du Collège de France, de l'Université Paris Dauphine, de l'Observatoire de Paris et des grandes écoles d'art, créant un cycle pluridisciplinaire d'enseignement supérieur de très haut niveau et fort prometteur.</p>
</div>
<div>
    
    <h3>Domus Omnibus Una</h3>

    <p>Etablissement d'excellence ouvert aux talents de toutes origines, sociales, culturelles, géographiques,le lycée est aussi un lieu de foisonnement culturel très libéral. Elèves, professeurs, anciens élèves, associations internes telles que le Foyer Socio Educatif ou le Conseil de la Vie Lycéenne, des établissements voisins tels que le Collège International de Philosophie, tous encouragés par la direction de la cité scolaire, développent chaque année en ses murs, une vie culturelle très intense et multiforme qui prend un éclat tout particulier chaque fin d'année sous la forme d'une floraison de spectacles, concerts, conférences, colloques et rencontres largement ouverts à des publics variés.</p>

    <p>Du reste, il suffit de consulter la rubrique "actualité" du site Internet de l'établissement pour se faire une idée de l'ambiance culturelle féconde propre à éveiller tous les talents qui y règne et qui contribue à perpétuer en ces lieux les idéaux humanistes d'une sorte d'Abbaye de Thélème.</p>

    <h4>Le Proviseur</h4>

</div>
@endsection

@section('javascript')
@endsection