<?php
declare(strict_types=1);

use App\Application\Actions\API\ListOfCoralAction;
use App\Application\Actions\API\Team\TeamCoralAction;
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
use App\Application\Actions\BackOffice\Pages\BackOfficePageDeleteAction;
use App\Application\Actions\BackOffice\Quizzes\BackOfficeQuizzesAction;
use App\Application\Actions\BackOffice\Quizzes\BackOfficeQuizAction;
use App\Application\Actions\BackOffice\Quizzes\BackOfficeDeleteQuizAction;
use App\Application\Actions\BackOffice\Articles\BackOfficeArticlesAction;
use App\Application\Actions\BackOffice\Articles\BackOfficeArticleAction;
use App\Application\Actions\BackOffice\Articles\BackOfficeDeleteArticleAction;

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

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
        $group->post('/user', BackOfficeUserAction::class);
        $group->post('/user/{id}', BackOfficeUserAction::class);
        $group->get('/user/{id}', BackOfficeUserAction::class);
        $group->get('/user/delete/{id}', BackOfficeDeleteUserAction::class);

        // Quiz CRUD
        $group->get('/quizzes', BackOfficeQuizzesAction::class);
        $group->get('/quiz', BackOfficeQuizAction::class);
        $group->post('/quiz', BackOfficeQuizAction::class);
        $group->post('/quiz/{id}', BackOfficeQuizAction::class);
        $group->get('/quiz/{id}', BackOfficeQuizAction::class);
        $group->get('/quiz/delete/{id}', BackOfficeDeleteQuizAction::class);

        // Article CRUD
        $group->get('/articles', BackOfficeArticlesAction::class);
        $group->get('/article', BackOfficeArticleAction::class);
        $group->post('/article', BackOfficeArticleAction::class);
        $group->post('/article/{id}', BackOfficeArticleAction::class);
        $group->get('/article/{id}', BackOfficeArticleAction::class);
        $group->get('/article/delete/{id}', BackOfficeDeleteArticleAction::class);

        // PAGES CRUD
        $group->get('/pages', BackOfficePagesAction::class);
        $group->get('/page', BackOfficePageAction::class);
        $group->post('/page', BackOfficePageAction::class);
        $group->post('/page/{id}', BackOfficePageAction::class);
        $group->get('/page/{id}', BackOfficePageAction::class);
        $group->get('/page/delete/{id}', BackOfficePageDeleteAction::class);

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
