<?php
declare(strict_types=1);

namespace App\Application\Actions\Api;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class PagesCoralAction extends Action
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
            ),
            array(
                "id" => 2,
                "name" => "Introduction",
                "picture" =>  null,
                "video" => "http://167.71.55.113/assets/movies/introduction-corals.mp4"
            ),
            array(
                "id" => 3,
                "name" => "Position of corals on the maps",
                "picture" =>  null,
                "video" => null,
                "question" => "D’après vous, quel sont les endroit où il y a une masse de coraux ? ",
                "text" => array(
                    "title" => "En Australie",
                    "text" => ""
                )
            ),
            array(
                "id" => 4,
                "name" => "What is coral?",
                "title" => "Qu'est ce qu'un corail ?",
                "popUps" => array(
                    "popUp1" => "",
                    "popUp2" => "",
                ),
                "picture" =>  null,
                "video" => "http://167.71.55.113/assets/movies/chapter-1-corals.mp4",
                "text" => array(
                    "title" => "",
                    "story" => ""
                ),
                "quiz" => array(
                    "question" => "",
                    "answer"  => array(
                        "name" => "answer1",
                        "text" => "",
                        "state" => null,
                    ),
                        array(
                            "name" => "answer1",
                            "text" => "",
                             "state" => null,
                        ),
                        array(
                            "name" => "answer2",
                            "text" => "",
                            "state" => null,
                        ),
                        array(
                            "name" => "answer3",
                            "text" => "",
                            "state" => null,
                        ),
                        array(
                            "name" => "answer4",
                            "text" => "",
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
            ),
            array(
                "id" => 5,
                "name" => "Role of the corals",
                "title" => "Quel est leur rôle ?",
                "article1" => array(
                    "title" => "",
                    "text" => "",
                ),
                "picture" =>  null,
                "video" => null,
                "quiz" => array(
                    "question" => "",
                    "answer"  => array(
                        "name" => "answer1",
                        "text" => "",
                        "state" => null,
                    ),
                    array(
                        "name" => "answer2",
                        "text" => "",
                        "state" => null,
                    ),
                    array(
                        "name" => "answer3",
                        "text" => "",
                        "state" => null,
                    ),
                    array(
                        "name" => "answer4",
                        "text" => "",
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
            ),
            array(
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
                "video" => null,
                "quiz" => array(
                    "question" => "Quel est la principale cause du blacnshissement des coraux?",
                    "answer"  => array(
                        "name" => "answer1",
                        "text" => "",
                        "state" => null,
                    ),
                    array(
                        "name" => "answer2",
                        "text" => "",
                        "state" => null,
                    ),
                    array(
                        "name" => "answer3",
                        "text" => "",
                        "state" => null,
                    ),
                    array(
                        "name" => "answer4",
                        "text" => "",
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
            ),
            array(
                "id" => 7,
                "name" => "bleaching status",
                "title" => "Le blanchiment devient régulier",
                "picture" =>  null,
                "video" => null,
                "article" => array(
                    "title" => "Le blanchissement",
                    "text" => "La principale cause de blanchiment est un changement de la température de l'eau de mer supérieur ou inférieur à la normale.
                        Les coraux se développent bien ou de manière optimale en mer tropicale à une température de 28 à 290 C. 

                        S'il y a une augmentation de la température de 2 ou 3° C au-dessus ou au-dessous de la normale dans une période comprise entre 1 - 2 semaines,
                         le corail montrera des signes de blanchissement. 
                         Si la température augmente ou diminue pendant un mois, toutes les colonies de coraux, 
                         les coraux mous, les anémones et les zoanthides deviendront blancs et mourront si la température augmente 
                         ou diminue jusqu'à ce qu'elle atteigne la sixième semaine."
                ),
                "quiz" => array(
                    "question" => "Quel est la principale cause du blacnshissement des coraux?",
                    "answer"  => array(
                        "name" => "answer1",
                        "text" => "",
                        "state" => null,
                    ),
                    array(
                        "name" => "answer2",
                        "text" => "",
                        "state" => null,
                    ),
                    array(
                        "name" => "answer3",
                        "text" => "",
                        "state" => null,
                    ),
                    array(
                        "name" => "answer4",
                        "text" => "",
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

            ),
            array(
                "id" => 8,
                "name" => "",
                "title" => "93% des coraux ont blanchis",
                "article" => "",
                "picture" =>  null,
                "video" => null
            ),
            array(
                "id" => 7,
                "name" => "bleacheang",
                "title" => " Aujourd’hui, 50% sont déjà morts ...",
                "article" => "",
                "picture" =>  null,
                "video" => null
            ),
            array(
                "id" => 7,
                "name" => "bleaching",
                "title" => "Il est encore temps d’agir...",
                "article" => "",
                "picture" =>  null,
                "video" => null
            ),
            array(
                "id" => 7,
                "name" => "bleacheang",
                "title" => "Soutenez les associations",
                "article" => "",
                "picture" =>  null,
                "video" => null
            ),
            array(
                "id" => 7,
                "name" => "bleacheang",
                "title" => "Aujourd’hui, 50% sont déjà morts ...",
                "article" => "",
                "picture" =>  null,
                "video" => null
            )
        );
        return $this->respondWithData($data);
    }
}
