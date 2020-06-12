<?php
declare(strict_types=1);

use App\Application\Actions\API\ListOfCoralAction;
use App\Application\Actions\API\TeamCoralAction;
use App\Application\Actions\API\PagesCoralAction;
use App\Application\Actions\API\CoralAction;
use App\Application\Actions\Backend\LoginAction;
use App\Application\Actions\Backend\LogoutAction;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Views\Twig;

return function (App $app) {

    $app->get('/', function ($request, $response, $args) {
        if (isset($_SESSION["userId"])) {
            return $response->withRedirect('/backend', 301);
        }
        $view = Twig::fromRequest($request);
        return $view->render($response, 'login.twig', [
            'name' => "coucou"
        ]);
    });


    // Backend
    $app->group('/backend', function (Group $group) {
        $group->get('', LoginAction::class);
        $group->post('/login', LoginAction::class);
        $group->get('/logout', LogoutAction::class);
    });


    // API
    $app->group('/api', function (Group $group) {
        $group->get('/team', TeamCoralAction::class);
        $group->get('/pages', PagesCoralAction::class);
        $group->get('/corals', ListOfCoralAction::class);
        $group->get('/coral/{id}', CoralAction::class);
    });
};
