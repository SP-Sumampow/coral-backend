<?php
declare(strict_types=1);

use App\Application\Actions\API\ListOfCoralAction;
use App\Application\Actions\API\TeamCoralAction;
use App\Application\Actions\API\PagesCoralAction;
use App\Application\Actions\API\CoralAction;
use App\Application\Actions\BackOffice\BackOfficeLoginAction;
use App\Application\Actions\BackOffice\BackOfficeLogoutAction;
use App\Application\Actions\API\PageAction;
use App\Application\Actions\BackOffice\BackOfficeHomeAction;
use App\Application\Actions\BackOffice\Users\BackOfficeUsersAction;
use App\Application\Actions\BackOffice\Users\BackOfficeUserAction;
use App\Application\Actions\BackOffice\Users\BackOfficeDeleteUserAction;
use App\Application\Actions\BackOffice\Pages\BackOfficePageAction;
use App\Application\Actions\BackOffice\Pages\BackOfficePagesAction;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use Slim\Views\Twig;

return function (App $app) {

    $app->get('/', function ($request, $response, $args) {
        if (isset($_SESSION["userId"])) {
            return $response->withRedirect('/backoffice', 301);
        } else {
            return $response->withRedirect('/backoffice/login', 301);
        }
    });


    // Backend
    $app->group('/backoffice', function (Group $group) {
        $group->get('', BackOfficeHomeAction::class);

        // USERS CRUD
        $group->get('/users', BackOfficeUsersAction::class);
        $group->get('/user', BackOfficeUserAction::class);
        $group->get('/user/{id}', BackOfficeUserAction::class);
        $group->post('/user/{id}', BackOfficeUserAction::class);
        $group->put('/user/{id}', BackOfficeUserAction::class);
        $group->get('/user/delete/{id}', BackOfficeDeleteUserAction::class);

        // PAGES CRUD
        $group->get('/pages', BackOfficePagesAction::class);
        $group->get('/page/{id}', BackOfficePageAction::class);
        $group->post('/page/{id}', BackOfficePageAction::class);
        $group->put('/page/{id}', BackOfficePageAction::class);
        $group->delete('/page/{id}', BackOfficePageAction::class);

        // SESSIONS
        $group->get('/login', BackOfficeLoginAction::class);
        $group->post('/login', BackOfficeLoginAction::class);
        $group->get('/logout', BackOfficeLogoutAction::class);
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
