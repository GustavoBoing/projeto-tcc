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
        <form action="" method="post">
            <div class="content">
                <div class="imagem-logo">
                    <p></p>
                </div>
                <!-- <p>CRIAR NOVA SENHA</p> -->
                <p>
                    <?php //var_dump($usuario); ?>
                    <p><label class="label-email" for="usuario">Usuário</label></p>
                    <input class="login" type="text" name="login" value="<?php echo $usuario['Login']; ?>" placeholder="Digite seu nome de usuário" disabled>
                </p>
                <p>
                    <p><label for="password">Nova Senha</label></p>
                    <input class="senha" type="password" name="usuario[Senha]" placeholder="Nova senha" required>
                </p>
                <p>
                    <button class="entrar">Confirmar</button>
                </p>
            </div>
        </form>
    </div>
</body>
</html>