<?php
    include_once("./conexao.php");
    require_once('./function.php');
    indexEPI();
    include(HEADER_TEMPLATE);
    if(!isset($_SESSION['login'])) {
        die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\"> Voltar</a></p>");
    }

    $id_produto = filter_input(INPUT_GET, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
    $result_produto = "SELECT * FROM produto WHERE id_produto = '" . $_GET['id'] . "'";
    $resultado_produto = mysqli_query($conn, $result_produto);
    $row_produto = mysqli_fetch_assoc($resultado_produto);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Query para obter os funcionários
    $query = "SELECT id_funcionario, Nome FROM funcionario";
    $result = $conn->query($query);

    $user = $_SESSION['login'];
    $query2user = "SELECT id_usuario FROM usuario WHERE login = ?";
    $stmt = $conn->prepare($query2user);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($id_usuario);
    $stmt->fetch();
?>
<!DOCTYPE html>

    <head>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/styleSubmit.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <body>
        <div class="TituloARE">
            <h2 class="titulosare"><i class='bx bx-minus-circle'></i>&nbsp Retirar </h2>
        </div>
        <form class="tela-editar" method="POST" action="functions/retira.php" enctype="multipart/form-data">
            <div class="deixar-column">
                <div class="inputValues">
                    <input type="hidden" name="id_produto" value="<?php echo $row_produto['id_produto']; ?>">

                    <div class="Nome">
                        <label for="Nome">
                            Nome:
                            <input type="text" name="descricao" value="<?php echo $row_produto['Descricao']; ?>" disabled><br><br>
                        </label>
                    </div>

                    <div class="QtdAtual">
                        <label for="Qtd">
                            Quantidade Atual:
                            <input type="number" value="<?php echo $row_produto['Quantidade']; ?>"disabled br><br>
                        </label>
                    </div>

                    <div class="Qtd">
                        <label for="Qtd">
                            Quantidade:
                            <input type="number" name="quantidade_a_subtrair" placeholder="Digite a quantidade"><br><br>
                        </label>
                    </div>

                    <div class="Valor">
                        <label for="Valor">
                            Valor:
                            <input type="text" step="0.01" name="valor" min="0.01" placeholder="Digite o valor" value="R$ <?php echo $row_produto['Valor']; ?>" disabled><br><br>
                        </label>
                    </div>

                    <div class="Modelo">
                        <label for="Modelo">
                            Modelo:
                            <input type="text" name="modelo" placeholder="Digite o modelo" value="<?php echo $row_produto['Modelo']; ?>" disabled><br><br>
                        </label>
                    </div>
                    <div class="Funcionario">
                        <label for="Funcionario">
                            Funcionário:
                            <select type="text" name="funcionario">
                                <option value=""><?php echo $_SESSION['login']?></option>
                                <?php
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value=\"{$row['id_funcionario']}\">{$row['Nome']}</option>";
                                    }
                                ?>
                            </select><br><br>
                        </label>
                    </div>
                    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                </div>
                <div class="btnFuncoes">
                    <div class="btnSalvar">
                        <button type="submit" name="" class="btn btn-primary">Salvar</button>
                    </div> 
                    <div class="btnCancela">
                        <a href="<?php echo BASEURL;?>tables/insumos.php">Cancelar</a>
                    </div>
                </div>
            </div>
        </form>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="<?php echo BASEURL; ?>js/index.js"></script>
    <script src="<?php echo BASEURL; ?>js/script.js"></script>
    <script src="<?php echo BASEURL; ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo BASEURL?>js/main.js"></script>
</html>