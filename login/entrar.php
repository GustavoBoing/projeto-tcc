<?php

    // function entrar () {
    //     // Informações de conexão com o banco de dados
    //     $servername = "localhost";
    //     $dbname = "almoxarifado";
    //     $username = "root";
    //     $password = "";


    //     if (isset($_POST['login']) && isset($_POST['senha'])){
    //         // Dados do formulário
    //         $login = $_POST['login'];
    //         $senha = $_POST['senha'];


    //         try {
    //             // Criar conexão PDO
    //             $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //             $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //             // Consulta para verificar o usuário e a senha
    //             $query = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
    //             $stmt = $conn->prepare($query);
    //             $stmt->bindParam(':login', $login);
    //             $stmt->bindParam(':senha', $senha);
    //             $stmt->execute();


    //             // Verificar se o usuário foi encontrado
    //             if ($stmt->rowCount() > 0) {
    //                 $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //                 session_start();  // Inicia a sessão (se ainda não tiver sido iniciada)
    //                 $_SESSION['login'] = $login;
    //                 $_SESSION['isAdmin'] = $user['isAdmin'];  // Armazena o nome de usuário na sessão
    //                 header("Location: ./telas/index.php");  // Redireciona para a página de dashboard
    //                 exit();  // Encerra o script após redirecionar
    //             } else {
    //                 // Apenas envie os scripts JavaScript se houver erro no login
    //                 echo '<script>alert("Usuário ou senha incorretos. Por favor, tente novamente.");</script>';
    //                 // echo "<script>document.querySelector('.entrar').setCustomValidity('Usuário ou senha incorretos');</script>";
    //                 echo '<script>window.location.href = "./index.php";</script>';
    //                 exit();
    //             }
    //         } catch (PDOException $e) {
    //             echo "Erro: " . $e->getMessage();
    //         }
    //     }
    //     /*Lembre-se de adaptar as informações do banco de dados e a tabela de usuários de acordo com o seu ambiente. 
    //     Além disso, considere implementar medidas adicionais de segurança, como o uso de senhas criptografadas, 
    //     proteção contra ataques de injeção SQL e sessões para manter os usuários autenticados.*/
    // }

    
    function entrar () {
        // Informações de conexão com o banco de dados
        $servername = "localhost";
        $dbname = "almoxarifado";
        $username = "root";
        $password = "";


        if (isset($_POST['login']) && isset($_POST['senha'])){
            // Dados do formulário
            $login = $_POST['login'];
            $senha = $_POST['senha'];


            try {
                // Criar conexão PDO
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Consulta para verificar o usuário e a senha
                $query = "SELECT * FROM usuario WHERE login = :login";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':login', $login);
                $stmt->execute();
            
                // Verificar se o usuário foi encontrado
                if ($stmt->rowCount() > 0) {
                    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            
                    // Verificar a senha usando password_verify
                    if (password_verify($senha, $usuario['Senha'])) {
                        session_start();
                        $_SESSION['login'] = $login;
                        $_SESSION['isAdmin'] = $usuario['isAdmin'];
                        header("Location: ./telas/index.php");
                        exit();
                    } else {
                        echo '<script>alert("Usuário ou senha incorretos. Por favor, tente novamente.");</script>';
                        echo '<script>window.location.href = "./index.php";</script>';
                        exit();
                    }
                } else {
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



