<?php 

require_once ('../config.php');
require_once(DBAPI);

$funcionarios = null;
$usuarios = null;
$fornecedores = null;
global $conn; 
$conn = open_database();

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

    function criptografia($senha) {
      /*
        criptografia Blowfish
      */ 
      //criptografia na senha
      $custo = "08";
      $salt = "CflfllePArKlBJomMOF6aJ";

      //gera um hash baseado em bcrypt
      $hash = crypt($senha, "$2a$" . $custo . "$" . $salt . "$");

      return $hash; //retorna a senha criptografada
    }

    function criarHashSenha($senha) {
      return password_hash($senha, PASSWORD_BCRYPT);
    }

    function add()
    {

      if (!empty($_POST['usuario'])) {
        try
        {
          $usuario = $_POST['usuario'];

          $usuario['Senha'] = password_hash($usuario['Senha'], PASSWORD_DEFAULT);
          $usuario['palavraPasse'] = password_hash($usuario['palavraPasse'], PASSWORD_DEFAULT);

          save('usuario', $usuario);
          header('location: ../tables/okConfirma.php');

        } 
        catch (Exception $e)
        {
            $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
            $_SESSION['type'] = "danger";
        }
      } 
    }

    function addFuncionario(){
        if (!empty($_POST['funcionario'])) {
            $funcionario = $_POST['funcionario'];
            
            if(isset($funcionario['CPF'])) {

              // $cpfSemFormato = str_replace(['.', '-'], '', $cpfFormatado);
              $funcionario['CPF'] = str_replace(['.', '-'], "", $funcionario['CPF']);
            }

            if(isset($funcionario['TelContato'])) {

              // $cpfSemFormato = str_replace(['.', '-'], '', $cpfFormatado);
              $funcionario['TelContato'] = str_replace(['(', ')', '-', ' '], "", $funcionario['TelContato']);
            }

            save('funcionario', $funcionario);
            header('location: ../tables/okConfirma.php');
        }
    }
    function addFornecedor(){
        if (!empty($_POST['fornecedor'])) {
            $fornecedor = $_POST['fornecedor'];
            
            if(isset($fornecedor['CNPJ'])){
              $fornecedor['CNPJ'] = str_replace(['.', '-', '/'], '', $fornecedor['CNPJ']);
            }
            
            save('fornecedor', $fornecedor);
            header('location: ../tables/okConfirma.php');
        }
    }

    function editFornecedor() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            // Adicione estes var_dump para verificar o valor de $id
            var_dump($id);
    
            if (isset($_POST['fornecedor'])) {
                $fornecedor = $_POST['fornecedor'];

                if(isset($fornecedor['CNPJ'])){
                  $fornecedor['CNPJ'] = str_replace(['.', '-', '/'], '', $fornecedor['CNPJ']);
                }

                updateFornecedor('fornecedor', $id, $fornecedor );
                header('location: ../tables/okConfirma.php');
            } else {
                global $fornecedor; 
                $fornecedor = findFuncionario('fornecedor', $id);
            }
        } else {
            header('location: ../tables/erradoIndex.php');
        }
    }

	function findFuncionario( $table = null, $id = null ) {
	  
		$database = open_database();
		$found = null;

		try {
		  if ($id) {
			$sql = "SELECT * FROM " . $table . " WHERE id_fornecedor = " . $id;
			$result = $database->query($sql);
			
			if ($result->num_rows > 0) {
			  $found = $result->fetch_assoc();
			}
			
		  } else {
			
			$sql = "SELECT * FROM " . $table;
			$result = $database->query($sql);
			
			if ($result->num_rows > 0) {
			  $found = $result->fetch_all(MYSQLI_ASSOC);
			
			/* Metodo alternativo
			$found = array();
			while ($row = $result->fetch_assoc()) {
			  array_push($found, $row);
			} */
			}
		  }
		} catch (Exception $e) {
		  $_SESSION['message'] = $e->GetMessage();
		  $_SESSION['type'] = 'danger';
	  }
		
		close_database($database);
		return $found;
	}

    function updateFornecedor($table = null, $id = 0, $data = null) {

      $database = open_database();

      $items = null;

      foreach ($data as $key => $value) {
        $items .= trim($key, "'") . "='$value',";
      }

      // remove a ultima virgula
      $items = rtrim($items, ',');

      $sql  = "UPDATE " . $table;
      $sql .= " SET $items";
      $sql .= " WHERE id_fornecedor=" . $id . ";";

      try {
        $database->query($sql);

        $_SESSION['message'] = 'Registro atualizado com sucesso.';
        $_SESSION['type'] = 'success';

      } catch (Exception $e) { 

        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
      } 

      close_database($database);
    }


    function editUser() {
      if (isset($_GET['id'])) {
          $id = $_GET['id'];
  
          // Adicione estes var_dump para verificar o valor de $id
          var_dump($id);
  
          if (isset($_POST['usuario'])) {
              $usuario = $_POST['usuario'];

              updateUser('usuario', $id, $usuario );
              header('location: ../tables/okConfirma.php');
          } else {
              global $usuario; 
              $usuario = findUser('usuario', $id);
          }
      } else {
          header('location: ../tables/erradoIndex.php');
      }
  }

  function updateUser($table = null, $id = 0, $data = null) {

    $database = open_database();

    $items = null;

    foreach ($data as $key => $value) {
      $items .= trim($key, "'") . "='$value',";
    }

    // remove a ultima virgula
    $items = rtrim($items, ',');

    $sql  = "UPDATE " . $table;
    $sql .= " SET $items";
    $sql .= " WHERE id_usuario=" . $id . ";";

    try {
      $database->query($sql);

      $_SESSION['message'] = 'Registro atualizado com sucesso.';
      $_SESSION['type'] = 'success';

    } catch (Exception $e) { 

      $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
      $_SESSION['type'] = 'danger';
    } 

    close_database($database);
  }

  function findUser( $table = null, $id = null ) {
    
    $database = open_database();
    $found = null;

    try {
      if ($id) {
      $sql = "SELECT * FROM " . $table . " WHERE id_usuario = " . $id;
      $result = $database->query($sql);
      
      if ($result->num_rows > 0) {
        $found = $result->fetch_assoc();
      }
      
      } else {
      
      $sql = "SELECT * FROM " . $table;
      $result = $database->query($sql);
      
      if ($result->num_rows > 0) {
        $found = $result->fetch_all(MYSQLI_ASSOC);
      
      /* Metodo alternativo
      $found = array();
      while ($row = $result->fetch_assoc()) {
        array_push($found, $row);
      } */
      }
      }
    } catch (Exception $e) {
      $_SESSION['message'] = $e->GetMessage();
      $_SESSION['type'] = 'danger';
    }
    
    close_database($database);
    return $found;
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