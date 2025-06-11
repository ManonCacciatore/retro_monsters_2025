<?php

if (isset($_GET['monsters'])) :
    include_once '../app/controllers/monstersController.php';
    \App\Controllers\MonstersController\indexAction($connexion);

// ROUTER par défaut
else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;
