<?php

if (isset($_GET['monsters'])) :
    include_once '../app/controllers/monstersController.php';
    \App\Controllers\MonstersController\indexAction($connexion);

// ROUTER par défaut

elseif (isset($_GET['form'])) :
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\formAction($connexion);
else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;
