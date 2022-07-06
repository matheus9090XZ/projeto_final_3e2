<?php

   require "model/CategoriaModel.php";
   require "controller/controller.php";
   
   class Categoria extends Controller{

      function __construct(){
         $this->model = new CategoriaModel();

      }


      function index(){
         $categorias = ($this->model->buscarTodos());         
         include "view/template/cabeçalho.php";
         include "view/template/menu.php";
         include "view/categoria/listagem.php";
         include "view/template/rodapé.php";
     }
      

      function add(){
         include "view/template/cabeçalho.php";
         include "view/template/menu.php";
         include "view/categoria/form.php";
         include "view/template/rodapé.php";
     }

      function excluir($id){
         $this->model->excluir($id);
         header('Location: ?c=categoria');
      }

      function editar($id){
         $categoria = $this->model->buscarPorId($id);
         include "view/template/cabeçalho.php";
         include "view/template/menu.php";
         include "view/categoria/form.php";
         include "view/template/rodapé.php";
     }

      function salvar(){
         if(isset($_POST['categoria']) && !empty($_POST['categoria'])){
            if(empty($_POST['idcategoria'])){
               $this->model->inserir($_POST['categoria']);
            }else{
               $this->model->atualizar($_POST['categoria'], $_POST['idcategoria']);
            }
            header('Location: ?c=categoria');
         }else{
            echo "Ocorreu um erro, pois os dados não foram enviados";
         }
      }
   }

   //$model->inserir("Produto de Limpeza");
   //$model->excluir(1);
   //$model->atualizar("Smartphone", 2);


