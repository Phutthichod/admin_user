<?php
    include 'controller.php';
    // include 'app/model/p_u_model.php';
    class p_u_controller extends controller{
        private $model;
        public function __construct(){
               }
        public    function index(){
                require 'view/plant/user_plant_select.php';
            }
        public  function loadModel(){
            
            echo '550';
            //  $this->model = new p_u_model();
         }
         public function data1(){
          echo $this->model->getData1();
         }
    }
    if(isset($_GET['data1'])){
        $c = new p_u_controller();
        // $c->loadModel();
        // $c->data1();
        // echo 'pinto';
    }
?>