<?php
    require_once('model.php');
    require_once('view.php');

    class gamesController{
        
        private $view;
        private $model;
        
        function __construct(){
            $this->view = new View();
            $this->model = new Model();
        }   

        function showHome(){
            $juegos = $this->model->getAllGames();
            $this->view->showHome($juegos);
        }

        function showFormAdd(){
            $categorias = $this->model->getCategorys(); 
            $this->view->showFormAddSong($categorias);
        }

        function addSong(){
            if( isset($_REQUEST['nombre']) && !empty($_REQUEST['nombre']) && 
                isset($_REQUEST['compañia']) && !empty($_REQUEST['compañia']) && 
                isset($_REQUEST['compatibilidad']) && !empty($_REQUEST['compatibilidad']) && 
                isset($_REQUEST['lanzamiento']) && !empty($_REQUEST['lanzamiento']) &&
                isset($_REQUEST['categorias']) && !empty($_REQUEST['categorias']) &&  
                isset($_REQUEST['trailer']) && !empty($_REQUEST['trailer'])){
                    
                $nombre = $_REQUEST['nombre'];
                $compañia = $_REQUEST['compañia'];
                $compatibilidad = $_REQUEST['compatibilidad'];
                $lanzamiento = $_REQUEST['lanzamiento'];
                $trailer = $_REQUEST['trailer'];
                $categorias = $_REQUEST['categorias'];

                if ($_FILES['input_name']['type'] == "image/jpg" || 
                    $_FILES['input_name']['type'] == "image/jpeg"|| 
                    $_FILES['input_name']['type'] == "image/png"){
                    
                    $imagen = $_FILES['input_name']['tmp_name'];
                    $songAdd = $this->model->addSong($nombre,$compañia,$compatibilidad,$lanzamiento,$trailer,$categorias,$imagen);  
                    
                }else{
                    $songAdd = $this->model->addSong($nombre,$compañia,$compatibilidad,$lanzamiento,$trailer,$categorias,null); 
                }

                if($songAdd){
                    header("Location:" . BASE_URL);
                }
            }
        }

        function showCardGame($id){
           $game = $this->model->GameById($id);
        
           if(!empty($game)){
            
               $this->view->showCardGame($game);
           }else{
                header("Location:" . BASE_URL);
           }
        }

        function delete($id){
            
           $game = $this->model->GameById($id);

           if(isset($game)){
                $this->model->delete($id);
           }
           header("Location:" . BASE_URL);
        }
    }