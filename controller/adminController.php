<?php
    require_once('model.php');
    require_once('view.php');
    require_once('authHelper/authHelper.php');

    class adminController{
        
        private $view;
        private $model;
        private $authHelper;

        function __construct(){
            $this->view = new View();
            $this->model = new Model();
            $this->authHelper = new AuthHelper();
       }   

       function formAdmin(){
           $this->view->showFormAdmin();
       }

       function validateLogin(){
           if(isset($_REQUEST['user']) && isset($_REQUEST['password'])){
             $user = $_REQUEST['user'];
             $pass = $_REQUEST['password'];

             $admin = $this->model->validateAdmin($user,$pass);
             if ($admin) {
                 $this->authHelper->login($admin);
             }
             header("Location: " . BASE_URL);
           }
       }

       function logout(){
           $this->authHelper->logout();
       }

    }