<?php
declare(strict_types=1);

namespace App\Application\Actions\BackOffice;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

/**
 * Class BackOfficeLogoutAction
 * @package App\Application\Actions\BackOffice
 */
class BackOfficeLogoutAction extends Action
{
    /**
     * BackOfficeLogoutAction constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
    }

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        if (isset($_SESSION["userId"])) {
            $_SESSION["userId"] = null;
            return $this->response->withRedirect('/', 301);
        }
    }
}
