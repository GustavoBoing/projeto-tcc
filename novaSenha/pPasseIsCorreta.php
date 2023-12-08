<?php 

    $servername = "localhost";
    $dbname = "almoxarifado";
    $username = "root";
    $password = "";

    // if (isset($_POST['login']) && ($_POST['palavraPasse'])){
    //     // Dados do formulário
    //     $login = $_POST['login'];
    //     $palavraPasse = $_POST['palavraPasse'];

    //     try {
    //         // Criar conexão PDO
    //         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //         // Consulta para verificar o usuário e a senha
    //         $query = "SELECT * FROM usuario WHERE login = :login AND palavraPasse = :palavraPasse";
    //         $stmt = $conn->prepare($query);
    //         $stmt->bindParam(':login', $login);
    //         $stmt->bindParam(':palavraPasse', $palavraPasse);
    //         $stmt->execute();

    //         // Verificar se o usuário foi encontrado
    //         if ($stmt->rowCount() > 0) {
    //             // A senha está correta
    //             // Você pode realizar outras ações aqui se necessário
    //             session_start();  // Inicia a sessão (se ainda não tiver sido iniciada)
    //             $_SESSION['login'] = $login;
    //             $_SESSION['palavraPasse'] = $palavraPasse; 
    //             $_SESSION['id_usuario'] = $id_usuario;
    //             header("Location: ./redefinirSenha?id='$id_usuario'.php");  // Redireciona para a página de dashboard
    //             exit();  // Encerra o script após redirecionar
    //         } else {
    //             echo '<script>alert("Palavra passe ou usuário incorretos. Por favor, tente novamente.     (Caso tenha esquecido, fale com o administrador)");</script>';
    //             echo '<script>window.location.href = "./index.php";</script>';
    //             exit();
    //         }
    //     } catch (PDOException $e) {
    //         echo "Erro: " . $e->getMessage();
    //     }

    if (isset($_POST['login']) && isset($_POST['palavraPasse'])){
        // Dados do formulário
        $login = $_POST['login'];
        $senha = $_POST['palavraPasse'];


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
                if (password_verify($senha, $usuario['palavraPasse'])) {
                    session_start();
                    $_SESSION['login'] = $usuario['login'];
                    $_SESSION['id_usuario'] = $usuario['id_usuario'];

                    $url = "./redefinirSenha.php?id=" . $usuario['id_usuario'];

                    header("Location: $url");  // Redireciona para a página de dashboard
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
    //}