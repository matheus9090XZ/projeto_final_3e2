<?php
 if(isset($_GET['c'])){
        $controller = ucfirst($_GET['c']);
        $path_controller = "controller/$controller.php";

        //verifica se o arquivo de controller existe
        if(file_exists($path_controller)){
            require $path_controller;
            
            
            //verifica se foi enviada a variavel $_GET['m']
            //que contém o método do controlador
            if(isset($_GET['m'])){
                $metodo = $_GET['m'];


                //cria um objeto controlador
                $obj = new controller();

                //verifica se o controlador possui uma função
                if(is_callable(array($obj,$metodo))){
                    echo "existe a função";    
                }
            }

            echo $path_controller;
        }
 }