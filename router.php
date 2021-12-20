<?php
    require_once('controller/gamesController.php');
    require_once('controller/adminController.php');
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
    if(!empty($_REQUEST['action'])){
        $action = $_REQUEST['action'];
    }else{
        $action = "home";
    }

    $params = explode("/", $action);

    $catalogoController = new gamesController();
    $adminController = new adminController();

    switch ($params[0]) {
        case 'home':
            $catalogoController->showHome();
            break;
        case 'ShowFormAddGame';
            $catalogoController->showFormAdd();
            break;
        case 'addSong';
            $catalogoController->addSong();
            break;
        case 'game';
            $catalogoController->showCardGame($params[1]);
            break;
        case 'delete';
            $catalogoController->delete($params[1]);
            break;
        case 'login':
            $adminController->formAdmin();
            break;
        case 'validate';
            $adminController->validateLogin();
            break;
        case 'logout';
            $adminController->logout();
            break;
        
    }