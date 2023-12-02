<!DOCTYPE html>
<?php 
    require_once "config.php";
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href="<?php echo BASEURL; ?>login/styles.css">
    <!-- <link rel="stylesheet" href="<?php echo BASEURL; ?>css/styleSubmit.css"/> -->
    <title>Tela de login</title>
</head>
<body>
    <div class="background-container">
        <div class="background-image"></div>
        <form action="<?php echo BASEURL; ?>login/entrar.php" method="post">
            <div class="content">
                <div class="imagem-logo">
                    <p></p>
                </div>
                <p>
                    <p><label class="label-email" for="usuario">Usuário</label></p>
                    <input class="login" type="text" name="login" placeholder="Digite seu nome de usuário" required>
                </p>
                <p>
                    <p><label for="password">Senha</label></p>
                    <input class="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                </p>
                <p>
                    <p><label for="password">É administrador?</label></p>
                    <select name="isAdmin" id="">
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </p>
                <p>
                    <a href="<?php echo BASEURL; ?>novaSenha/index.php"><label class="esqueceu" for="esqueceu">Esqueceu sua senha?</label></a>
                </p>
                <p>
                    <button class="entrar">Entrar</button>
                </p>
            </div>
        </form>
    </div>
</body>
</html>