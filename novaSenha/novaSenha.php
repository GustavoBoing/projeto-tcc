<?php
    $servername = "localhost";
    $dbname = "almoxarifado";
    $username = "root";
    $password = "";

    try {
        // Criar conexão PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Verificar se o formulário foi enviado

        // Recuperar os valores do formulário
        $login = $_POST['login']; // Substitua 'id' pelo nome do campo que contém a chave primária
        $senha = $_POST['senha']; // Substitua 'novoValor' pelo nome do campo de atualização

        // Consulta para realizar o UPDATE
        $query = "UPDATE usuario SET Senha = :senha WHERE Login = :login";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $senha);

        if($stmt->execute()) {

            // echo ".<a href='../index.php'>faça o login</a>";
            echo '<script>alert("Atualização realizada com sucesso. Faça seu login!!");</script>';
            echo '<script>window.location.href = "./index.php";</script>';
        } else {
            echo '<script>alert("Usuário não encontrado. Tente Novamente!");</script>';
            echo '<script>window.location.href = "./redefinirSenha.php";</script>';
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }