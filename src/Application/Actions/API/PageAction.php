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
                         "title" => "La belle amitiée entre le corail et l’algue :",
                         "article" => "Le corail est un organisme qui vit en symbiose avec une micro-algue, la zooxantelle (appartenant au genre Symbiodinium). C’est d’ailleurs grâce a celle-ci que le corail tire ses si belles couleurs attractives.\r\nComme tous les animaux, les polypes de corail mangent. Ils capturent leurs proies à l'aide de crochets microscopiques libérés de leurs tentacules. Mais la plupart de l'énergie du corail provient d'algues connues sous le nom de zooxanthelles qui résident dans les tissus du polype, convertissant la lumière du soleil en sucres riches en énergie que les coraux peuvent absorber comme combustible.\r\nUn centimètre carré de corail abrite un million de zooxanthelles, qui lui fournit 90 à 95% de l'énergie dont il a besoin pour survivre. Mais lorsque le corail stresse, parce que la température de l'eau augmente, par exemple, la symbiose est rompue.  Les micro-algues s'échappent et le corail blanchit : si la rupture dure trop longtemps, le corail finit par mourir de \" faim \" et à terme devient gris foncé.",
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
         };

        return $this->respondWithData($data);
    }
}
