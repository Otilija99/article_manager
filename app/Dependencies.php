<?php

use DI\ContainerBuilder;
use function DI\create;
use App\Controllers\Article\CreateController;
use App\Controllers\Article\DeleteController;
use App\Controllers\Article\GetAllController;
use App\Controllers\Article\GetByIdController;
use App\Controllers\Article\UpdateController;
use App\Controllers\Article\CreateFormController;
use App\Controllers\Article\UpdateFormController;
use App\Controllers\Article\DeleteFormController;
use App\Controllers\Article\ArticleLikeController;
use App\Controllers\Comment\CreateCommentController;
use App\Controllers\Comment\DeleteCommentController;
use App\Controllers\Comment\CommentLikeController;
use App\Services\Article\Create;
use App\Services\Article\Delete;
use App\Services\Article\Index;
use App\Services\Article\Like;
use App\Services\Article\Show;
use App\Services\Article\Update;
use App\Services\Comment\Create as CommentCreate;
use App\Services\Comment\Delete as CommentDelete;
use App\Services\Comment\Like as CommentLike;
use Slim\Views\Twig;
use Slim\Factory\AppFactory;
use Slim\Views\TwigMiddleware;
use Psr\Container\ContainerInterface;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    PDO::class => function () {
        $dsn = 'sqlite:' . __DIR__ . '/../database/database.db';
        return new PDO($dsn);
    },
    Twig::class => function () {
        return Twig::create(__DIR__ . '/../views', ['cache' => false]);
    },
    CreateController::class => create(CreateController::class),
    DeleteController::class => create(DeleteController::class),
    GetAllController::class => create(GetAllController::class),
    GetByIdController::class => create(GetByIdController::class),
    UpdateController::class => create(UpdateController::class),
    CreateFormController::class => create(CreateFormController::class),
    UpdateFormController::class => create(UpdateFormController::class),
    DeleteFormController::class => create(DeleteFormController::class),
    ArticleLikeController::class => create(ArticleLikeController::class),
    CreateCommentController::class => create(CreateCommentController::class),
    DeleteCommentController::class => create(DeleteCommentController::class),
    CommentLikeController::class => create(CommentLikeController::class),
    Create::class => create(Create::class),
    Delete::class => create(Delete::class),
    Index::class => create(Index::class),
    Like::class => create(Like::class),
    Show::class => create(Show::class),
    Update::class => create(Update::class),
    CommentCreate::class => create(CommentCreate::class),
    CommentDelete::class => create(CommentDelete::class),
    CommentLike::class => create(CommentLike::class),
]);

$container = $containerBuilder->build();

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->add(TwigMiddleware::createFromContainer($app, Twig::class));

return $app;
