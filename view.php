<?php
    require_once("lib\smarty-3.1.39\libs\Smarty.class.php");

    class View{
        private $smarty;

        function __construct(){
            $this->smarty = new Smarty();
        }

        function showHome($juegos){
            $this->smarty->assign('juegos', $juegos);
            $this->smarty->display('templates/renderHome.tpl');
        }

        function showFormAdmin(){
            $this->smarty->display("templates/showFormAdmin.tpl");
        }

        function showFormAddSong($categorias){
            $this->smarty->assign("categorias", $categorias);
            $this->smarty->display("templates/showFormAddSong.tpl");
        }  

        function showCardGame($game){
            $this->smarty->assign("games", $game);
            $this->smarty->display("templates/ShowCardGame.tpl");
        }
    }