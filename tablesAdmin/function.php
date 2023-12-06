<?php 

require_once ('../config.php');
require_once(DBAPI);

$funcionarios = null;
$usuarios = null;
$fornecedores = null;

    function fornecedores() {
        global $fornecedores;
        if (!empty($_POST['filtro'])){
            $fornecedores = filter("fornecedor", "Nome LIKE '%" . $_POST['filtro'] . "%'");
        } else {
            $fornecedores = find_all('fornecedor');
        }
    }

    function usuarios() {
        global $usuarios;
        if (!empty($_POST['filtro'])){
            $usuarios = filter("usuario", "Login LIKE '%" . $_POST['filtro'] . "%'");
        } else {
            $usuarios = find_all('usuario');
        }
    }

    function funcionarios() {
        global $funcionarios;
        if (!empty($_POST['filtro'])){
            $funcionarios = filter("funcionario", "Nome LIKE '%" . $_POST['filtro'] . "%'");
        } else {
            $funcionarios = find_all('funcionario');
        }
    }

    function add(){
        if (!empty($_POST['usuario'])) {
            $usuario = $_POST['usuario'];
            
            save('usuario', $usuario);
            header('location: ../tables/okConfirma.php');
          }
    }

    function addFuncionario(){
        if (!empty($_POST['funcionario'])) {
            $funcionario = $_POST['funcionario'];
            
            save('funcionario', $funcionario);
            header('location: ../tables/okConfirma.php');
        }
    }
    function addFornecedor(){
        if (!empty($_POST['fornecedor'])) {
            $fornecedor = $_POST['fornecedor'];
            
            save('fornecedor', $fornecedor);
            header('location: ../tables/okConfirma.php');
        }
    }

    function editFuncionario() {
    
        if (isset($_GET['id'])) {
    
            $id = $_GET['id'];
        
            if (isset($_POST['funcionario'])) {
    
            $funcionario = $_POST['funcionario'];
    
            update('funcionario', $id, $funcionario);
            header('location: index.php');
          } else {
    
            global $funcionario;
            $funcionario = find('funcionario', $id);
          } 
        } else {
          header('location: index.php');
        }
      }

    function filter ($table = null, $p = null) {

        $database = open_database();
        $found = null;
    
        try{
            if($p) {
              $sql = "SELECT * FROM " . $table . " WHERE " . $p;
              $result = $database->query($sql);
              if($result->num_rows > 0) {
                  $found = array();
                  while ($row = $result->fetch_assoc()) {
                    array_push($found, $row);
                  }
              } else{
                  throw new Exception("Não foram encontrados registros de dados!");
              }
            }
        } catch (Exception $e)  {
            $_SESSION['message'] = "Ocorreu um erro: " . $e->getMessage();
            $_SESSION['type'] = "danger";
        }
        close_database($database);
        return $found;
    }
?>