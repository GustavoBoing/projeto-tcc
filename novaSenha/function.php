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


function esqueceuSenha() {  
    // global $esqueceu;

    // $login = $_POST['login'];
    // $palavraPasse = $_POST['palavraPasse'];

    // $esqueceu = filter("usuario", "login = :login AND palavraPasse = :palavraPasse");
    $servername = "localhost";
    $dbname = "almoxarifado";
    $username = "root";
    $password = "";

    // Dados do formulário
    $login = $_POST['login'];
    $palavraPasse = $_POST['palavraPasse'];

    try {
        // Criar conexão PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta para verificar o usuário e a senha
        $query = "SELECT * FROM usuario WHERE login = :login AND palavraPasse = :palavraPasse";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':palavraPasse', $palavraPasse);
        $stmt->execute();

        // Verificar se o usuário foi encontrado
        if ($stmt->rowCount() > 0) {
            // A senha está correta
            // Você pode realizar outras ações aqui se necessário
            header("Location: ./redefinirSenha.php");  // Redireciona para a página de dashboard
            exit();  // Encerra o script após redirecionar
        } else if ($stmt->rowCount() <= 0){
            // echo "<p>Você esqueceu sua palavra passe?</p>
            // <p><a href='../novaSenha/index.php'>aperte aqui e volte</a> ou entre em contato com o administrador</p>";
            // // header("Location: ./msgErro.php");
            // exit();
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

function novaSenha() {

    $servername = "localhost";
    $dbname = "almoxarifado";
    $username = "root";
    $password = "";

    try {
        // Criar conexão PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Verificar se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recuperar os valores do formulário
            $login = $_POST['login']; // Substitua 'id' pelo nome do campo que contém a chave primária
            $senha = $_POST['senha']; // Substitua 'novoValor' pelo nome do campo de atualização

            // Consulta para realizar o UPDATE
            $query = "UPDATE usuario SET Senha = :senha WHERE Login = :login";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            echo "Atualização realizada com sucesso.<a href='../index.php'>faça o login</a>";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

//digitar o usuário, ele precisa saber se o usuário esta correto
//digitar a palavra passe e saber se a palavra passe está correta
