<?php

namespace routes;

use controllers\Account;
use controllers\SampleWeb;
use controllers\TodoWeb;
use controllers\VideoWeb;
use routes\base\Route;
use utils\SessionHelpers;

class Web
{
    function __construct()
    {
        $main = new SampleWeb();
        $todo = new TodoWeb();

        Route::Add('/', [$main, 'home']);
        Route::Add('/about', [$main, 'about']);

        Route::Add('/registration', [$todo, 'registration']);

        Route::Add('/login', [$todo, 'login']);


        Route::Add('/todo/liste', [$todo, 'liste']);
        Route::Add('/todo/ajouter', [$todo, 'ajouter']);
        Route::Add('/todo/terminer', [$todo, 'terminer']);
        Route::Add('/todo/supprimer', [$todo, 'supprimer']);
        Route::Add('/todo/TodoNonTerminer', [$todo, 'supprimer']);

        if (SessionHelpers::isLogin()) {
            Route::Add('/logout', [$todo, 'logout']);
            Route::Add('/me', [$todo, 'me']);
        }
    }
}

