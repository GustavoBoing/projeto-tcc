<!DOCTYPE html>
<?php 
    require_once('./function.php');
    novaSenha();
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="<?php echo BASEURL; ?>login/styles.css">
    <title>Tela de login</title>
</head>
<body>
    <div class="background-container">
        <div class="background-image"></div>
        <form action="redefinirSenha.php" method="post">
            <div class="content">
                <div class="imagem-logo">
                    <p></p>
                </div>
                <p>
                    <p><label class="label-email" for="usuario">Usuário</label></p>
                    <input class="login" type="text" name="login" placeholder="Digite seu nome de usuário" required>
                </p>
                <p>
                    <p><label for="password">Nova Senha</label></p>
                    <input class="senha" type="password" name="senha" placeholder="Nova senha" required>
                </p>
                <p>
                    <button class="entrar">Confirmar</button>
                </p>
            </div>
        </form>
    </div>
</body>
</html>