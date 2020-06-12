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
                 "video" => null
             );
         }

        return $this->respondWithData($data);
    }
}
