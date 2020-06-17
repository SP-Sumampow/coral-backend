<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice\Pages;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use App\Infrastructure\Persistence\Page\PageBDDRepository;
use Psr\Log\LoggerInterface;
use Slim\Views\Twig;

/**
 * Class BackOfficePagesAction
 * @package App\Application\Actions\BackOffice\Pages
 */
class BackOfficePagesAction extends Action
{
    /**
     * @var PageBDDRepository
     */
    private $pageBDDRepository;

    /**
     * BackOfficePagesAction constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->pageBDDRepository = new PageBDDRepository();
    }

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        if (isset($_SESSION["userId"])) {
            if ($this->request->getMethod() == '')
                $data = [];
            $data["pages"] = $this->pageBDDRepository->findAll();
            if (isset($this->request->getQueryParams()["error"])) {
                $data["error"] = $this->request->getQueryParams()["error"];
            }
            if (isset($this->request->getQueryParams()["success"])) {
                $data["success"] = $this->request->getQueryParams()["success"];
            }
            $view = Twig::fromRequest($this->request);
            return $view->render($this->response, 'pages_back_office.twig', $data);
        } else {
            return $this->response->withRedirect('/', 301);
        }
    }
}
