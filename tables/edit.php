<?php
session_start();

include_once("conexao.php");
require_once('function.php');
indexEPI();
include(HEADER_TEMPLATE);

$id_produto = filter_input(INPUT_GET, 'id_produto', FILTER_SANITIZE_NUMBER_INT);
$result_produto = "SELECT * FROM produto WHERE id_produto = '" . $_GET['id'] . "'";
$resultado_produto = mysqli_query($conn, $result_produto);
$row_produto = mysqli_fetch_assoc($resultado_produto);
?>
<!DOCTYPE html>

<head>
        <link rel="stylesheet" href="style.css"><link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
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
    <div class="TituloEdit">
        <h2 class="titulos"><i class='bx bx-hard-hat'></i>&nbsp Editar Dados </h2>
        </div>
        <form method="POST" action="proc_edit_prod.php">
            <input type="hidden" name="id" value="<?php echo $row_produto['id_produto']; ?>">

            <div class="Nome">
                <label for="Nome">
                    Nome:
                    <input type="text" name="descricao" value="<?php echo $row_produto['Descricao']; ?>"><br><br>
                </label>
            </div>

            <div class="Qtd">
                <label for="Qtd">
                    Quantidade:
                    <input type="number" name="quantidade" placeholder="Digite a quantidade" value="<?php echo $row_produto['Quantidade']; ?>"><br><br>
                </label>
            </div>

            <div class="Valor">
                <label for="Valor">
                    Valor:
                    <input type="number" step="0.01" name="Valor" min="0.01" placeholder="Digite o valor" value="<?php echo $row_produto['Valor']; ?>"><br><br>
                </label>
            </div>

            <div class="Modelo">
                <label for="Modelo">
                    Modelo:
                    <input type="text" name="modelo" placeholder="Digite o modelo" value="<?php echo $row_produto['Modelo']; ?>"><br><br>
                </label>
            </div>

        </form>

        <div class= "btnfuncoes">  
            <div class="btnSalvar">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

            <div class="btnCancela">
                <button type="submit" class="btn btn-primary">Cancelar</button>
            </div>                
        </div>


        
</body>

</html>