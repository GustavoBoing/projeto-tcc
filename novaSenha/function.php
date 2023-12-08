<?php

require_once ('../config.php');
require_once(DBAPI);


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

// function novaSenha() {

//     $servername = "localhost";
//     $dbname = "almoxarifado";
//     $username = "root";
//     $password = "";

//     try {
//         // Criar conexão PDO
//         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         // Verificar se o formulário foi enviado
//         if ($_SERVER["REQUEST_METHOD"] == "POST") {
//             // Recuperar os valores do formulário
//             $login = $_POST['login']; // Substitua 'id' pelo nome do campo que contém a chave primária
//             $senha = $_POST['senha']; // Substitua 'novoValor' pelo nome do campo de atualização

//             // Consulta para realizar o UPDATE
//             $query = "UPDATE usuario SET Senha = :senha WHERE Login = :login";
//             $stmt = $conn->prepare($query);
//             $stmt->bindParam(':login', $login);
//             $stmt->bindParam(':senha', $senha);
//             $stmt->execute();

//             echo "Atualização realizada com sucesso.<a href='../index.php'>faça o login</a>";
//         }
//     } catch (PDOException $e) {
//         echo "Erro: " . $e->getMessage();
//     }
// }

function NovaSenha() {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Adicione estes var_dump para verificar o valor de $id
        var_dump($id);

        if (isset($_POST['usuario'])) {
            $usuario = $_POST['usuario'];

            $usuario['Senha'] = password_hash($usuario['Senha'], PASSWORD_DEFAULT);

            updateUser('usuario', $id, $usuario );
            echo '<script>alert("Atualização realizada com sucesso. Faça seu login!!");</script>';
            echo '<script>window.location.href = "../index.php";</script>';
        } else {
            global $usuario; 
            $usuario = findUser('usuario', $id);
        }
    } else {
        echo '<script>alert("Usuário não encontrado. Tente Novamente!");</script>';
        echo '<script>window.location.href = "./redefinirSenha.php";</script>';
    }
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

//digitar o usuário, ele precisa saber se o usuário esta correto
//digitar a palavra passe e saber se a palavra passe está correta
