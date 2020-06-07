<?php
declare(strict_types=1);

use App\Application\Actions\API\ListOfCoralAction;
use App\Application\Actions\API\TeamCoralAction;
use App\Application\Actions\API\CoralAction;
use App\Application\Actions\Backend\LoginAction;
use App\Application\Actions\Backend\LogoutAction;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {

    $app->get('/', function ($request, $response, $args) {
        return $this->get('view')->render($response, 'hello.twig', [
            'name' => "coucou"
        ]);
    });


    // Backend
    $app->group('/backend', function (Group $group) {
        $group->get('', LoginAction::class);
        $group->get('/login', LoginAction::class);
        $group->get('/logout', LogoutAction::class);
    });


    // API
    $app->group('/api', function (Group $group) {
        $group->get('/team', TeamCoralAction::class);
        $group->get('/corals', ListOfCoralAction::class);
        $group->get('/coral/{id}', CoralAction::class);
    });
};
