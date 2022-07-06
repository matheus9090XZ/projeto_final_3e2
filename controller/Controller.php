<?php 
class Controller{

    public function load_template($url_view){
        include "view/template/cabeçalho.php";
        include "view/template/menu.php";
        include "view/$url_view";
        include "view/template/rodapé.php";
    }

}