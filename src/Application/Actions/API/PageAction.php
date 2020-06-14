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
                 array(
                     "id" => 1,
                     "name" => "Explication",
                     "picture" =>  null,
                     "title" => "Les coraux, la vie se meurt",
                     "video" => null,
                     "music" => "http://167.71.55.113/assets/movies/main-song.mov",
                     "textDisclame" => array(
                         "title" => "Attention",
                         "text" => "Ce site a été réalisé à des fins pédagogiques dans le cadre du cursus Bachelor de l’école HETIC.  Les contenus présentés n'ont pas fait l'objet d'une demande de droit d'utilisation.  Ce site ne sera en aucun cas exploité à des fins commerciales et ne sera pas publié."
                     ),
                     "textInstruction" => array(
                         "title" => "Plongez à la découverte des coraux",
                         "textINstruction" => array(
                             "instructionAudio" => "Pour une immersion totale à travers ce webdocumentaire, 
                            il est préférable de porter un casque audio",
                             "instructionControls" => "Utilisez le scroll ou les flèches du clavier pour naviguer"
                         )
                     )
                 )
             );
         } else if ($coralId == 2) {
             $data = array(
                 "id" => 2,
                 "name" => "Introduction",
                 "picture" =>  null,
                 "video" => "http://167.71.55.113/assets/movies/introduction-corals.mp4"
             );
         } else if ($coralId == 3) {
             $data = array(
                 "id" => 3,
                 "name" => "Position of corals on the maps",
                 "picture" =>  null,
                 "video" => null,
                 "title1" => "Bienvenue dans la mer de Corail",
                 "title2" => "Visitesz les recifs",
                 "text" => "Découvrez la Grande Barrière vue du ciel !",
             );
         } else if ($coralId == 4) {
             $data =  array(
                 "id" => 4,
                 "name" => "What is coral?",
                 "title" => "Qu'est ce qu'un corail ?",
                 "popUps" => array(
                     "popUp1" => array(
                         "title" => "Et si vous aviez la même vue que les poissons ? ",
                         "article" => "Les coraux sont constitués de milliers de petits organismes appelés polybes, \r\nprincipalement formé d’une bouche et d’un estomac.\r\nLe squelette des polypes est constitué à l’exterieur de ses tissus et se compose de carbonate de calcium tout comme la roche calcaire.\r\nLe corail est également composé de micro algues qui vivent dans les cellules des polypes.\r\nIl est donc à la fois animal, minéral et végétale!",
                     ),
                     "popUp2" => array(
                         "title" => "Animal, minéral ou végétal?",
                         "article" => "Les coraux sont constitués de milliers de petits organismes appelés polybes, principalement formé d’une bouche et d’un estomac.\r\nLe squelette des polypes est constitué à l’exterieur de ses tissus et se compose de carbonate de calcium tout comme la roche calcaire.\r\nLe corail est également composé de micro algues qui vivent dans les cellules des polypes.\r\nIl est donc à la fois animal, minéral et végétale!"
                     ),
                 ),
                 "picture" =>  null,
                 "video" => "http://167.71.55.113/assets/movies/immersive-ch1.mp4",
                 "quiz" => array(
                     "question" => "A quel reigne appartient le corail?",
                     "answer"  => array(
                         array(
                             "name" => "answer1",
                             "text" => "A: Végétal",
                             "state" => null,
                         ),
                         array(
                             "name" => "answer2",
                             "text" => "B: Animal",
                             "state" => null,
                         ),
                         array(
                             "name" => "answer3",
                             "text" => "C: Minéal",
                             "state" => null,
                         ),
                         array(
                             "name" => "answer4",
                             "text" => "D: Les trois",
                             "state" => null,
                         ),
                     ),

                 ),
                 "quizAnswer" => array(
                     "title" => "Vrai",
                     "text" => "",
                 ),
                 array(
                     "title" => "Faux",
                     "text" => "",
                 ),
             );
         } else if ($coralId == 5 ) {
             $data =
                 array(
                     "id" => 5,
                     "name" => "Role of the corals",
                     "title" => "Quel est leur rôle ?",
                     "article1" => array(
                         "title" => "L’incroyable “Triangle de Corail”",
                         "text" => "Le Triangle de corail est l’épicentre de la biodiversité marine de la planète.  Il possède plus de biodiversité que partout ailleurs dans le monde: 76% des espèces de coraux, et 56% des poissons de récifs coralliens dans la région Indo-Pacifique.  L’épicentre de cette diversité corallienne se trouve dans la péninsule de Papouasie indonésienne. Il est fréquenté par la baleine bleue, les dauphins, les marsouins, et le dugong en voie de disparition.",
                     ),
                     "picture" =>  null,
                     "video" => "http://167.71.55.113/assets/movies/chapter-2.mp4",
                     "quiz1" => array(
                         "question" => "Les récifs coraliens représentent 0.2 de la surface martime, mais quel part de la biodiversité marine en %?",
                         "answer"  => array(
                             array(
                                 "name" => "answer1",
                                 "text" => "A: 10%",
                                 "state" => null,
                             ),
                             array(
                                 "name" => "answer2",
                                 "text" => "B: 20%",
                                 "state" => null,
                             ),
                             array(
                                 "name" => "answer3",
                                 "text" => "C: 30%",
                                 "state" => null,
                             ),
                             array(
                                 "name" => "answer4",
                                 "text" => "D: 40%",
                                 "state" => null,
                             ),
                         ),
                     ),
                     "quizAnswer1" => array(
                         array(
                             "title" => "Vrai",
                             "text" => "",
                         ),
                         array(
                             "title" => "Faux",
                             "text" => "",
                         ),
                     ),
                     "quiz2" => array(
                         "question" => "Dans quel région d’Australie se situe la grande barrière?",
                         "answer"  => array(
                             array(
                                 "name" => "answer1",
                                 "text" => "A: New South Wales",
                                 "state" => null,
                             ),
                             array(
                                 "name" => "answer2",
                                 "text" => "B: Victoria",
                                 "state" => null,
                             ),
                             array(
                                 "name" => "answer3",
                                 "text" => "C: Northern Territories",
                                 "state" => null,
                             ),
                             array(
                                 "name" => "answer4",
                                 "text" => "D: Queensland",
                                 "state" => null,
                             ),
                         ),
                     ),
                     "quizAnswer2" => array(
                         array(
                             "title" => "Vrai",
                             "text" => "",
                         ),
                         array(
                             "title" => "Faux",
                             "text" => "",
                         ),
                     ),
             );
         } else if ($coralId == 6 ) {
             $data = array(
                 "id" => 06,
                 "name" => "Actual situation",
                 "title" => "Mais que se passe t-il ?",
                 "popUps" =>
                     array(
                         "name" => "pop up1",
                         "title" => "Le réchauffemnt des océans",
                         "text" => "Le réchauffement des océans est le facteur principal du blanchiment des coraux.
                     Si les tempérratures de surface des océans continuent d’augmenter,
                      la fréquence et la gravité du blanchiment des coraux va également augmenter, 
                          affectant probablement la capacité des récifs coralliens à s’addapter et à fournir la plupart des services que nous leur demandons"
                     ),
                 array(
                     "name" => "pop up2",
                     "title" => "L’acidification des océan",
                     "text" => "Le dioxyde de carbone présent dans l’atmosphère est absorbé par les océans. 
                        Ceci cause la baisse du pH des océans, entraînant l’acidification de ces derniers. 
                        Cette diminution du pH a des conséquences négatives, surtout pour les organismes carbonatés océaniques tels que les récifs que les récifs corallliens. "
                 ),
                 array(
                     "name" => "pop up3",
                     "title" => "L’élévation du niveaux des océans",
                     "text" => "Les observations depuis 1961 montrent que la température moyenne des océans a augmenté,
                         même, aux grandes profondeurs et que l’océan aa absorbé plus de 80% de la chaleur ajoutée au systeme climatique.
                          Ce réchauffement provoque l’élévation du niveau de la mer et crée des problèmes pour les zones côtières. "
                 ),
                 "picture" =>  null,
                 "video" => "http://167.71.55.113/assets/movies/bleaching%20process%20.mp4",
                 "quiz" => array(
                     "question" => "Quel est la principale cause du blacnshissement des coraux?",
                     "answer"  => array(
                         "name" => "answer1",
                         "text" => "La surpêche",
                         "state" => null,
                     ),
                     array(
                         "name" => "answer2",
                         "text" => "La déforestation",
                         "state" => null,
                     ),
                     array(
                         "name" => "answer3",
                         "text" => "Le réchauffement climatique",
                         "state" => null,
                     ),
                     array(
                         "name" => "answer4",
                         "text" => "La hausse du niveau de la mer",
                         "state" => null,
                     ),
                 ),
                 "quizAnswer" => array(
                     "title" => "Vrai",
                     "text" => "",
                 ),
                 array(
                     "title" => "Faux",
                     "text" => "",
                 ),
             );
         } else if( $coralId == 7) {
             array(
                 "id" => 7,
                 "name" => "bleaching status",
                 "title" => "Le blanchiment devient régulier",
                 "picture" =>  null,
                 "video" => "http://167.71.55.113/assets/movies/bleaching tracks.mp4",
                 "article" => array(
                     "title" => "Le phénomène de Blanchissement",
                     "text" => "Tous les coraux des mers chaudes vivant près de la surface abritent des symbiotiques microscopiques appelés les zooxanthelles.  Ce sont des algues qui utilisent les déchets métaboliques des coraux pour faire la photosynthèse. En échange d'un abri, et d'une exposition lumineuse suffisante, les zooxanthelles fournissent à leur hôte de l'oxygène, ainsi que les restes de nutriments produits n’ayant pas été consommés, dont le corail se nourrit.\r\n Or le corail, en situation de stress, peut expulser ses zooxanthelles.\r\n Les algues fournissent presque 90% de leur énergie grâce à la photosynthèse, c’est pourquoi le blanchiment mène à la mort de certaines espèces de coraux. Le phénomène a lieu en premier lieu à cause du changement de température des océans, de bactéries causant des maladies, de la pollution et de l’acidification des océans liées aux émissions de gaz à effet de serre dans l’atmosphère.\r\n Suite à un stress causé par divers facteurs, le corail ne reconnait plus la zooxanthelle comme son symbiote. Alors la symbiose entre les coraux et celle-ci s’arrêtent ce qui entrainent ainsi la perte de ces mico-algue et un blanchissement rapide de l’hôte corallien. Ce qu’on appelle le phénomène de Blanchissement !",
                 ),
                 "quiz" => array(
                     "question" => "Combien d’épisode de blachissement mondiale des coraux on eu lieu?",
                     "answer"  => array(
                         "name" => "answer1",
                         "text" => "A: 0",
                         "state" => null,
                     ),
                     array(
                         "name" => "answer2",
                         "text" => "B: 1",
                         "state" => null,
                     ),
                     array(
                         "name" => "answer3",
                         "text" => "C: 2",
                         "state" => null,
                     ),
                     array(
                         "name" => "answer4",
                         "text" => "D: 3",
                         "state" => null,
                     ),
                 ),
                 "quizAnswer" => array(
                     "title" => "Vrai",
                     "text" => "",
                 ),
                 array(
                     "title" => "Faux",
                     "text" => "",
                 ),

             );
         };

        return $this->respondWithData($data);
    }
}
