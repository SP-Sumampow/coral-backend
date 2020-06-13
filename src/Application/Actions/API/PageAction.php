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
                 "question" => "D’après vous, où se trouvent les plus grands recifs coraliens ?",
                 "text" => array(
                     "title" => "En Australie",
                     "text" => ""
                 )
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
                 "video" => "http://167.71.55.113/assets/movies/chapter-1-corals.mp4",
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
             $data = array(
                 array(
                     "id" => 5,
                     "name" => "Role of the corals",
                     "title" => "Quel est leur rôle ?",
                     "article1" => array(
                         "title" => "L’incroyable “Triangle de Corail”",
                         "text" => "Le Triangle de corail est l’épicentre de la biodiversité marine de la planète.  Il possède plus de biodiversité que partout ailleurs dans le monde: 76% des espèces de coraux, et 56% des poissons de récifs coralliens dans la région Indo-Pacifique.  L’épicentre de cette diversité corallienne se trouve dans la péninsule de Papouasie indonésienne. Il est fréquenté par la baleine bleue, les dauphins, les marsouins, et le dugong en voie de disparition.",
                     ),
                     "picture" =>  null,
                     "video" => null,
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
                 ),
             );
         }

        return $this->respondWithData($data);
    }
}
