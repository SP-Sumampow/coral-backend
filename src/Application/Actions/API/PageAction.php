<?php
declare(strict_types=1);

namespace App\Application\Actions\Api;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class PageAction extends Action
{
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
    }

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $coralId = (int) $this->resolveArg('id');
        $data = array();
         if ($coralId == 1) {
             $data = array(
                     "id" => 1,
                     "name" => "Explication",
                     "picture" =>  "http://167.71.55.113/assets/movies/backgroundPic.jpg",
                     "title" => "Les coraux, la vie se meurt",
                     "video" => null,
                     "music" => "http://167.71.55.113/assets/movies/main-song_low.mp3",
                     "article1" => array(
                         "name" => "disclaimer",
                         "title" => "Attention",
                         "text" => "Ce site a été réalisé à des fins pédagogiques dans le cadre du cursus Bachelor de l’école HETIC.  Les contenus présentés n'ont pas fait l'objet d'une demande de droit d'utilisation.  Ce site ne sera en aucun cas exploité à des fins commerciales et ne sera pas publié."
                     ),
                     "article2" => array(
                         "title" => "Plongez à la découverte des coraux",
                         "text" => "Pour une immersion totale à travers ce webdocumentaire,\r\nil est préférable de porter un casque audio Utilisez le scroll ou les flèches du clavier pour naviguer",
                     ),
             );
         } else if ($coralId == 2) {
             $data = array(
                 "id" => 2,
                 "name" => "Intro",
                 "picture" =>  "http://167.71.55.113/assets/movies/backgroundPic.jpg",
                 "video" => "http://167.71.55.113/assets/movies/introduction-corals.mp4",
                 "music" => "http://167.71.55.113/assets/movies/main-song_low.mp3",
             );
         } else if ($coralId == 3) {
             $data = array(
                 "id" => 3,
                 "name" => "Position of corals on the maps",
                 "picture" =>  "http://167.71.55.113/assets/movies/backgroundPic.jpg",
                 "video" => null,
                 "music" => "http://167.71.55.113/assets/movies/main-song_low.mp3",
                 "title" => "Bienvenue dans la mer de Corail ",
                 "text" => "Découvrez la Grande Barrière vue du ciel !",
             );
         } else if ($coralId == 4) {
             $data =  array(
                 "id" => 4,
                 "name" => "What is coral?",
                 "title" => "Qu'est ce qu'un corail ?",
                 "article1" => array(
                     "name" => "pop up 1/ id=4",
                     "title" => "Et si vous aviez la même vue que les poissons ? ",
                     "text" => "Au soleil couchant, un étonnant mirage se produit, un rayon vert apparaît à l’horizon. Il ne dure qu’une ou deux secondes et indique que la surface de l’eau est plus chaude que l’air.  Ces couleurs fantôme demeurent cachées à moins que l’on sache où et comment regarder. C’est exactement ce que propose de faire le moniteur de plongée Padi Colwell, il va observer les profondeurs de la Mer de Corail sous un nouvel aspect.  En plongeant avec des lumières bleues, il pourra observer le récif comme le voient les poissons.  On ne s’attend pas à cela, tout un monde caché se révèle. Filtrée par des verres jaunes, la lumière ultra-violette éclaire un univers que seul les poissons perçoivent. Elle nous plonge au cœur d’un royaume secret.  De nombreux animaux récifaux émettent des couleurs fluorescentes invisibles à nos yeux. Les ultras-violets révèlent des couleurs insoupçonnée, mais également des créatures cachées. Certains animaux sont invisibles à l’œil humain, mais visible pour les poissons.  Les coraux brillent à leur façon, ils utilisent les couleurs fluorescentes pour nourrir les algues qu’ils abritent, d’autres ont les tentacules vivement colorés à la limite du psychédélique pour attirer les proies.  De nombreux scientifiques affirment que l’on aura compris le cerveau humain avant de comprendre la Grande Barrière de Corail, une façon de dire qu’elle est trop riche pour que l’on décrypte un jour.",
                     "video" => null,
                 ),
                 "article2" => array(
                     "name" => "pop up 2/ id=4",
                     "title" => "Animal, minéral ou végétal?",
                     "text" => "Les coraux sont constitués de milliers de petits organismes appelés polybes, principalement formé d’une bouche et d’un estomac.\r\nLe squelette des polypes est constitué à l’exterieur de ses tissus et se compose de carbonate de calcium tout comme la roche calcaire.\r\nLe corail est également composé de micro algues qui vivent dans les cellules des polypes.\r\nIl est donc à la fois animal, minéral et végétale!",
                     "picture" => null,
                 ),
                 "picture" =>  "http://167.71.55.113/assets/movies/backgroundPic.jpg",
                 "video" => "http://167.71.55.113/assets/movies/immersive-ch1.mp4",
                 "music" => "http://167.71.55.113/assets/movies/main-song_low.mp3",
                 "quiz1" => array(
                     "question" => "Le corail est animal, minéral ou un végétal?",
                     "answer"  => array(
                         array(
                             "name" => "answer1",
                             "text" => "A: Végétal bien sûr !",
                             "state" => false,
                             "quizAnswer" => array(
                                 "title" => false,
                                 "text" => "Dommage! Le squlette qui protège le corail est un minéral, les polybes qui vivent à l’intérieur son des animaux et enfin les algues qui vivent à l’intérieur des polybes sont des végétaux.",
                             ),
                         ),
                         array(
                             "name" => "answer2",
                             "text" => "B: Mineral vu comme c’est dur...",
                             "state" => null,
                             "quizAnswer" => array(
                                 "title" => false,
                                 "text" => "Dommage! Le squlette qui protège le corail est un minéral, les polybes qui vivent à l’intérieur son des animaux et enfin les algues qui vivent à l’intérieur des polybes sont des végétaux.",
                             ),
                         ),
                         array(
                             "name" => "answer3",
                             "text" => "C: Les 3 trois à la fois !",
                             "state" => null,
                             "quizAnswer" => array(
                                 "title" => true,
                                 "text" => "Et oui! Le squlette qui protège le corail est un minéral, les polybes qui vivent à l’intérieur son des animaux et enfin les algues qui vivent à l’intérieur des polybes sont des végétaux.",
                             ),
                         ),
                         array(
                             "name" => "answer4",
                             "text" => "D: Un animal marin",
                             "state" => null,
                             "quizAnswer" => array(
                                 "title" => false,
                                 "text" => "Dommage! Le squlette qui protège le corail est un minéral, les polybes qui vivent à l’intérieur son des animaux et enfin les algues qui vivent à l’intérieur des polybes sont des végétaux.",
                             ),
                         ),
                     ),
                 ),
                 "quiz2" => array(
                     "question" => "Un centimètre carré de corail abrite combien de Zooxanthelles ?",
                     "answer"  => array(
                         array(
                             "name" => "answer1",
                             "text" => "A: Une grosse poignée",
                             "state" => false,
                             "quizAnswer" => "Dommage, un centimètre carré de corail abrite un million de zooxanthelles, qui lui fournit 90 à 95% de l'énergie dont il a besoin pour survivre.",
                         ),
                         array(
                             "name" => "answer2",
                             "text" => "B: C’est quoi le Zooxanthelle ?",
                             "state" => false,
                             "quizAnswer" => "Dommage, un centimètre carré de corail abrite un million de zooxanthelles, qui lui fournit 90 à 95% de l'énergie dont il a besoin pour survivre.",
                         ),
                         array(
                             "name" => "answer3",
                             "text" => "C: 100 000",
                             "state" => false,
                             "quizAnswer" => "Dommage, un centimètre carré de corail abrite un million de zooxanthelles, qui lui fournit 90 à 95% de l'énergie dont il a besoin pour survivre.",
                         ),
                         array(
                             "name" => "answer4",
                             "text" => "D: 1 million",
                             "state" => true,
                             "quizAnswer" => "Exact, un centimètre carré de corail abrite un million de zooxanthelles, qui lui fournit 90 à 95% de l'énergie dont il a besoin pour survivre.",
                         ),
                     ),
                 ),
             );
         } else if ($coralId == 5 ) {
             $data =
                 array(
                     "id" => 5,
                     "name" => "Role of the corals",
                     "title" => "Quel est leur rôle ?",
                     "article1" => array(
                         "name" => "pop up 1/id=5",
                         "title" => "L’incroyable “Triangle de Corail”",
                         "text" => "Le Triangle de corail est l’épicentre de la biodiversité marine de la planète.  Il possède plus de biodiversité que partout ailleurs dans le monde: 76% des espèces de coraux, et 56% des poissons de récifs coralliens dans la région Indo-Pacifique.  L’épicentre de cette diversité corallienne se trouve dans la péninsule de Papouasie indonésienne. Il est fréquenté par la baleine bleue, les dauphins, les marsouins, et le dugong en voie de disparition.",
                         "video" => "http://167.71.55.113/assets/movies/rajaampat.mp4",
                     ),
                     "picture" =>  "http://167.71.55.113/assets/movies/backgroundPic.jpg",
                     "video" => "http://167.71.55.113/assets/movies/chapter-2.mp4",
                     "music" => "http://167.71.55.113/assets/movies/main-song_low.mp3",
                     "quiz1" => array(
                         "question" => "Les récifs coraliens représentent 0.2 de la surface martime, mais quel part de la biodiversité marine en %?",
                         "answer"  => array(
                             array(
                                 "name" => "answer1",
                                 "text" => "A: New South Wales",
                                 "state" => false,
                                 "quizAnswer" => "Une autre fois, le Queensland est l’Etat Australien situé au Nord-Est du pays, son climas tropical est un véritable paradis pour les récifs coraliens.",
                             ),
                             array(
                                 "name" => "answer2",
                                 "text" => "B: Victoria",
                                 "state" => false,
                                 "quizAnswer" => "Une autre fois, le Queensland est l’Etat Australien situé au Nord-Est du pays, son climas tropical est un véritable paradis pour les récifs coraliens.",
                             ),
                             array(
                                 "name" => "answer3",
                                 "text" => "C: Northern Territories",
                                 "state" => false,
                                 "quizAnswer" => "Une autre fois, le Queensland est l’Etat Australien situé au Nord-Est du pays, son climas tropical est un véritable paradis pour les récifs coraliens.",
                             ),
                             array(
                                 "name" => "answer4",
                                 "text" => "D: Queensland",
                                 "state" => true,
                                 "quizAnswer" => "Oui! Le Queensland est l’Etat Australien situé au Nord-Est du pays, son climas tropical est un véritable paradis pour les récifs coraliens.",
                             ),
                         ),
                     ),
             );
         } else if ($coralId == 6 ) {
             $data = array(
                 "id" => 6,
                 "name" => "Actual situation",
                 "title" => "Mais que se passe t-il ?",
                 "article1" => array(
                         "name" => "pop up1/ id=6",
                         "title" => "Le réchauffemnt des océans",
                         "text" => "Le réchauffement des océans est le facteur principal du blanchiment des coraux. Si les tempérratures de surface des océans continuent d’augmenter, la fréquence et la gravité du blanchiment des coraux va également augmenter, affectant probablement la capacité des récifs coralliens à s’addapter et à fournir la plupart des services que nous leur demandons"
                     ),
                 "article2" => array(
                     "name" => "pop up2 / id=6",
                     "title" => "L’acidification des océan",
                     "text" => "Le dioxyde de carbone présent dans l’atmosphère est absorbé par les océans. Ceci cause la baisse du pH des océans, entraînant l’acidification de ces derniers. Cette diminution du pH a des conséquences négatives, surtout pour les organismes carbonatés océaniques tels que les récifs que les récifs corallliens. "
                 ),
                 "article3" => array(
                     "name" => "pop up3/ id=6",
                     "title" => "L’élévation du niveaux des océans",
                     "text" => "Les observations depuis 1961 montrent que la température moyenne des océans a augmenté, même, aux grandes profondeurs et que l’océan aa absorbé plus de 80% de la chaleur ajoutée au systeme climatique. Ce réchauffement provoque l’élévation du niveau de la mer et crée des problèmes pour les zones côtières. "
                 ),
                 "picture" =>  "http://167.71.55.113/assets/movies/backgroundPic.jpg",
                 "video" => "http://167.71.55.113/assets/movies/bleaching%20process%20.mp4",
                 "music" => "http://167.71.55.113/assets/movies/main-song_low.mp3",
                 "quiz" => array(
                     "question" => "Quel est la principale cause du blacnshissement des coraux?",
                     "answer"  => array(
                         "name" => "answer1",
                         "text" => "La surpêche",
                         "state" => false,
                         "quizAnswer" => "Lorsque la température de l’eau est trop élevé pour les algues à l’intérieur des corails, elles cessent de produire des nutriment pour le corail qui les expulse pour ne plus avoir à les nourrir.",
                     ),
                     array(
                         "name" => "answer2",
                         "text" => "La déforestation",
                         "state" => true,
                         "quizAnswer" => "Lorsque la température de l’eau est trop élevé pour les algues à l’intérieur des corails, elles cessent de produire des nutriment pour le corail qui les expulse pour ne plus avoir à les nourrir.",
                     ),
                     array(
                         "name" => "answer3",
                         "text" => "Le réchauffement climatique",
                         "state" => false,
                         "quizAnswer" => "Lorsque la température de l’eau est trop élevé pour les algues à l’intérieur des corails, elles cessent de produire des nutriment pour le corail qui les expulse pour ne plus avoir à les nourrir."
                     ),
                     array(
                         "name" => "answer4",
                         "text" => "La hausse du niveau de la mer",
                         "state" => false,
                         "quizAnswer" => "Lorsque la température de l’eau est trop élevé pour les algues à l’intérieur des corails, elles cessent de produire des nutriment pour le corail qui les expulse pour ne plus avoir à les nourrir.",
                     ),
                 ),
             );
         } else if( $coralId == 7) {
             $data = array(
                 "id" => 7,
                 "name" => "bleaching status",
                 "title" => "Le blanchiment devient régulier",
                 "picture" =>  "http://167.71.55.113/assets/movies/backgroundPic.jpg",
                 "video" => "http://167.71.55.113/assets/movies/bleaching tracks.mp4",
                 "music" => "http://167.71.55.113/assets/movies/main-song_low.mp3",
                 "article1" => array(
                     "name" => "pop up1/ id=7",
                     "title" => "Le phénomène de Blanchissement",
                     "text" => "Tous les coraux des mers chaudes vivant près de la surface abritent des symbiotiques microscopiques appelés les zooxanthelles.  Ce sont des algues qui utilisent les déchets métaboliques des coraux pour faire la photosynthèse. En échange d'un abri, et d'une exposition lumineuse suffisante, les zooxanthelles fournissent à leur hôte de l'oxygène, ainsi que les restes de nutriments produits n’ayant pas été consommés, dont le corail se nourrit.\r\n Or le corail, en situation de stress, peut expulser ses zooxanthelles.\r\n Les algues fournissent presque 90% de leur énergie grâce à la photosynthèse, c’est pourquoi le blanchiment mène à la mort de certaines espèces de coraux. Le phénomène a lieu en premier lieu à cause du changement de température des océans, de bactéries causant des maladies, de la pollution et de l’acidification des océans liées aux émissions de gaz à effet de serre dans l’atmosphère.\r\n Suite à un stress causé par divers facteurs, le corail ne reconnait plus la zooxanthelle comme son symbiote. Alors la symbiose entre les coraux et celle-ci s’arrêtent ce qui entrainent ainsi la perte de ces mico-algue et un blanchissement rapide de l’hôte corallien. Ce qu’on appelle le phénomène de Blanchissement !",
                     "picture" => null,
                 ),
                 "quiz" => array(
                     "question" => "Combien d’épisode de blachissement mondiale des coraux on eu lieu?",
                     "answer"  => array(
                         array(
                             "name" => "answer1",
                             "text" => "A: 0",
                             "state" => false,
                             "quizAnswer" => "Dommage, depuis les années 80, deux phases de blanchissement de masse ont touché les coraux du globe, et ces phénomènes tendent à se raprocher temporèlement.",
                         ),
                         array(
                             "name" => "answer2",
                             "text" => "B: 1",
                             "state" => false,
                             "quizAnswer" => "Dommage, depuis les années 80, deux phases de blanchissement de masse ont touché les coraux du globe, et ces phénomènes tendent à se raprocher temporèlement.",
                         ),
                         array(
                             "name" => "answer3",
                             "text" => "C: 2",
                             "state" => true,
                             "quizAnswer" => "Vous avez juste ! Depuis les années 80, deux phases de blanchissement de masse ont touché les coraux du globe, et ces phénomènes tendent à se raprocher temporèlement.",
                         ),
                         array(
                             "name" => "answer4",
                             "text" => "D: 3",
                             "state" => false,
                             "quizAnswer" => "Dommage, depuis les années 80, deux phases de blanchissement de masse ont touché les coraux du globe, et ces phénomènes tendent à se raprocher temporèlement.",
                         ),
                     ),
                 ),
             );
         } else if ( $coralId == 8 ) {
             $data = array(
                 "id" => 8,
                 "name" => "situation up to date",
                 "title" => " Aujourd’hui, 50% sont déjà morts ...",
                 "picture" =>  "http://167.71.55.113/assets/movies/backgroundPic.jpg",
                 "video" => "http://167.71.55.113/assets/movies/deathCoralsCh6.mp4",
                 "music" => "http://167.71.55.113/assets/movies/main-song_low.mp3",
                 "article1" => array(
                     "name" => "pop up1/ id=8",
                     "title" => "Une autre concéquence",
                     "text" => "L’impact de la disparition des coraux ne se fait pas seulement resentir sur la biodiversité.\r\nEn effet, ils occupent un rôle majeure dans la protection des côtes contre les vagues, tempêtes et marrées qui sont responsable de l’érosion des litoraux.\r\nPour palier à ce manque, des millions d’euros sont inverstis mais l’mpact de ces nouvelles structures (marina, docks etc...) peuvent eux aussi à leur tour avoir un impact négatif sur les coraux survivant, les endommagents sur le long terme.",
                     "picture1" => null,
                     "picture2" => null,
                 ),
                 "quiz" => array(
                     "question" => "Parmis ces propositions, laquelle est vrais?",
                     "answer"  => array(
                         array(
                             "name" => "answer1",
                             "text" => "A: Une photosynthèse des algues à l’intérieur des polybes impossible",
                             "state" => false,
                             "quizAnswer" => "Et non ! Les coraux protège nos côtes de la corosion engendré par les tempêtes.",
                         ),
                         array(
                             "name" => "answer2",
                             "text" => "B:Sans coraux, les failles tectoniques seront plus active",
                             "state" => false,
                             "quizAnswer" => "Et non ! Les coraux protège nos côtes de la corosion engendré par les tempêtes.",
                         ),
                         array(
                             "name" => "answer3",
                             "text" => "C: Une hausse du niveau de la mer qui menace l’environnement des coraux",
                             "state" => true,
                             "quizAnswer" => "Yup !Les coraux protège nos côtes de la corosion engendré par les tempêtes.",
                         ),
                         array(
                             "name" => "answer4",
                             "text" => "D: Une réduction de la surface de déploiement des coraux",
                             "state" => false,
                             "quizAnswer" => "Et non ! Les coraux protège nos côtes de la corosion engendré par les tempêtes.",
                         ),
                     ),
                 ),
             );
         } else if ( $coralId == 9 ) {
             $data = array(
                 "id" => 9,
                 "name" => "what we can do",
                 "title" => "Il est encore temps d’agir...",
                 "picture" =>  "http://167.71.55.113/assets/movies/backgroundPic.jpg",
                 "video" => null,
                 "music" => "http://167.71.55.113/assets/movies/main-song_low.mp3",
                 "article1" => array(
                     "name" => "pop up1/ id=9",
                     "title" => "Richesse exceptionnelle d’un récif coralien",
                     "text" => "Pour essayer d'aider l'écosystème à continuer de fournir les services écologiques nécessaires, des méthodes très récentes sont apparues, comme la restauration écologique active. Il faut considérer ces méthodes avec prudence car de nos jours il est impossible de recréer un récif comme ceux présents naturellement. Si nous ne voulons pas perdre la richesse en biodiversité, il faut agir localement, mais surtout globalement. Limiter le réchauffement climatique à moins de 2 °C est l'urgence absolue. Chacun peut aussi agir en en parlant autour de soi, en essayant d'adopter un mode de vie plus respectueux de l'environnement et en faisant un petit geste : l'adoption d’un corail ! Il est donc important d’agir immédiatement, en sensibilisant en premier lieu les populations qui en dépendent directement.",
                     "picture1" => null,
                     "picture2" => null,
                 ),
             );
         } else if ( $coralId == 10 ) {
             $data = array(
                 "id" => 10,
                 "name" => "associations",
                 "title" => "Soutenez les associations",
                 "article" => "",
                 "picture" =>  "http://167.71.55.113/assets/movies/backgroundPic.jpg",
                 "video" => null,
                 "music" => "http://167.71.55.113/assets/movies/main-song_low.mp3",
             );
         };

        return $this->respondWithData($data);
    }
}
