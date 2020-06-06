<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\API\ListOfCoral;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world priska!');
        return $response;
    });

    $app->get('/hello/{name}', function ($request, $response, $args) {
        return $this->get('view')->render($response, 'hello.twig', [
            'name' => $args['name']
        ]);
    });

    // API
    $app->group('/api', function (Group $group) {
        $group->get('/corals', ListOfCoral::class);
    });
};
