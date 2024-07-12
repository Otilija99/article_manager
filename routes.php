<?php
return [
    ['GET', '/', 'App\Controllers\IndexController'],

    ['GET', '/articles', 'App\Controllers\Article\GetAllController'],
    ['GET', '/article/{id:\d+}', 'App\Controllers\Article\GetByIdController'],

    ['GET', '/article/create', 'App\Controllers\Article\CreateFormController'],
    ['POST', '/article/create', 'App\Controllers\Article\CreateController'],

    ['GET', '/article/{id:\d+}/edit', 'App\Controllers\Article\UpdateFormController'],
    ['POST', '/article/{id:\d+}/edit', 'App\Controllers\Article\UpdateController'],

    ['GET', '/article/{id:\d+}/delete', 'App\Controllers\Article\DeleteFormController'],
    ['POST', '/article/{id:\d+}/delete', 'App\Controllers\Article\DeleteController'],

    ['POST', '/article/{id:\d+}/like', 'App\Controllers\Article\ArticleLikeController'],

    ['POST', '/comment/{id:\d+}/delete', 'App\Controllers\Comment\DeleteCommentController'],
    ['POST', '/article/{id:\d+}/comment', 'App\Controllers\Comment\CreateCommentController'],

    ['POST', '/comment/{id:\d+}/like', 'App\Controllers\Comment\CommentLikeController'],
];
