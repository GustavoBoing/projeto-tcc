<?php

    function entrar () {
        // Informações de conexão com o banco de dados
        $servername = "localhost";
        $dbname = "almoxarifado";
        $username = "root";
        $password = "";


        if (isset($_POST['login']) && isset($_POST['senha']) && isset($_POST['isAdmin'])){
            // Dados do formulário
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            $isAdmin = $_POST['isAdmin'];


            try {
                // Criar conexão PDO
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Consulta para verificar o usuário e a senha
                $query = "SELECT * FROM usuario WHERE login = :login AND senha = :senha AND isAdmin = :isAdmin";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':login', $login);
                $stmt->bindParam(':senha', $senha);
                $stmt->bindParam(':isAdmin', $isAdmin);
                $stmt->execute();


                // Verificar se o usuário foi encontrado
                if ($stmt->rowCount() > 0) {
                    session_start();  // Inicia a sessão (se ainda não tiver sido iniciada)
                    $_SESSION['login'] = $login;
                    $_SESSION['isAdmin'] = $isAdmin;  // Armazena o nome de usuário na sessão
                    header("Location: ../telas/index.php");  // Redireciona para a página de dashboard
                    exit();  // Encerra o script após redirecionar
                } else {
                    // Apenas envie os scripts JavaScript se houver erro no login
                    echo '<script>alert("Usuário ou senha incorretos. Por favor, tente novamente.");</script>';
                    echo '<script>window.location.href = "./index.php";</script>';
                    exit();
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        /*Lembre-se de adaptar as informações do banco de dados e a tabela de usuários de acordo com o seu ambiente. 
        Além disso, considere implementar medidas adicionais de segurança, como o uso de senhas criptografadas, 
        proteção contra ataques de injeção SQL e sessões para manter os usuários autenticados.*/
    }



