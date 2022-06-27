<?php
  if(isset($_GET['c'])){
      $controller = ucfirst($_GET['c']);
      $path_controller = "controller/$controller.php";

      //verifica se o arquivo de controller existe
      if(file_exists($path_controller)){
          require $path_controller;

          //verifica se foi enviada a variável $_GET['m']
          //que contém o método do controlador que desejo exec      
              $metodo = $_GET['m'] ?? "index";

              //cria o objeto controlador
              $obj = new $controller();

              //verifica se o controlador possui uma função
              if(is_callable(array($obj, $metodo))){
                 //executa o método do controlador
                call_user_func_array(array($obj,$metodo),array());
              }
      }

  }
