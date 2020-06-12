<?php
declare(strict_types=1);

use App\Application\Actions\API\ListOfCoralAction;
use App\Application\Actions\API\TeamCoralAction;
use App\Application\Actions\API\PagesCoralAction;
use App\Application\Actions\API\CoralAction;
use App\Application\Actions\BackOffice\LoginAction;
use App\Application\Actions\BackOffice\LogoutAction;
use App\Application\Actions\API\PageAction;
use App\Application\Actions\BackOffice\HomeBackOfficeAction;
use App\Application\Actions\BackOffice\Users\BackOfficeUsersAction;
use App\Application\Actions\BackOffice\Pages\BackOfficePagesAction;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Views\Twig;

return function (App $app) {

    $app->get('/', function ($request, $response, $args) {
        if (isset($_SESSION["userId"])) {
            return $response->withRedirect('/backoffice', 301);
        }
        $view = Twig::fromRequest($request);
        return $view->render($response, 'login.twig', [
            'name' => "coucou"
        ]);
    });


    // Backend
    $app->group('/backoffice', function (Group $group) {
        $group->get('', HomeBackOfficeAction::class);

        // USERS CRUD
        $group->get('/users', BackOfficeUsersAction::class);
        $group->post('/use/{id}', BackOfficeUsersAction::class);
        $group->put('/user/{id}', BackOfficeUsersAction::class);
        $group->delete('/user/{id}', BackOfficeUsersAction::class);

        // PAGES CRUD
        $group->get('/pages', BackOfficePagesAction::class);
        $group->post('/page/{id}', BackOfficePagesAction::class);
        $group->put('/page/{id}', BackOfficePagesAction::class);
        $group->delete('/page/{id}', BackOfficePagesAction::class);

        // SESSIONS
        $group->post('/login', LoginAction::class);
        $group->get('/logout', LogoutAction::class);
    });


    // API
    $app->group('/api', function (Group $group) {
        $group->get('/team', TeamCoralAction::class);
        $group->get('/pages', PagesCoralAction::class);
        $group->get('/corals', ListOfCoralAction::class);
        $group->get('/coral/{id}', CoralAction::class);
        $group->get('/page/{id}', PageAction::class);
    });
};
