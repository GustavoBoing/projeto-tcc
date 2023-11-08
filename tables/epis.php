<?php
        require_once('function.php');
        indexEPI();
        include(HEADER_TEMPLATE);

        session_start();
        if(!isset($_SESSION['login']))
          header("Location: ../index.php");
?>
    
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="styleTbl.css"/>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
        <script src="<?php echo BASEURL; ?>inc/script.js"defer></script>
    </head>
    <body>
        <div class="tittle">
            <h2 class="titulos" style="color:#F06E2D; text-shadow: 1px 2px 5px black; letter-spacing:2px;"><i class='bx bx-hard-hat'></i>&nbsp EPI's </h2>
            <p id="subtitulo" style="font-size:small; margin:0 0 0 70px">Visão geral dos itens de EPI</p>
        </div>
        <main>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Valor em Estoque</th>
                        <th>Alterações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($produtos) : ?>
                    <?php foreach($produtos as $produto) : 
                        echo '<tr>';
                            if ($produto['Tipo'] == '1') 
                            {
                                // echo '<td>'.$produto['id_produto'].'</td>';
                                echo '<td>'.$produto['Descricao'].'</td>';
                                if($produto['Quantidade'] < 10 ){
                                    echo '<td>' . '<span class="vermelho">' . $produto['Quantidade'] . '</span>' . '</td>';
                                } else if ($produto['Quantidade'] <= 40){
                                     echo '<td>' . '<span class="amarelo">' . $produto['Quantidade'] . '</span>' . '</td>' ;
                                } else {
                                     echo '<td>' . '<span class="verde">' . $produto['Quantidade'] . '</span>' . '</td>';
                                }
                                echo '<td>'. 'R$ ' . $produto['Valor'].'</td>';
                                echo '<td>' . 'R$ ' . number_format($produto['Valor'] * $produto['Quantidade'], 2, ',', '.') . '</td>'
                            ?>
                            <td class="changes">
                                <a href="edit.php?id=<?php echo $custumer['id']; ?>" class="btn btn-sm btn-secondary"><i class='bx bx-plus-circle'></i> Adicionar</a>
                                <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary"><i class='bx bx-minus-circle'></i> Retirar</a>
                                <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-user-pen"></i> Editar</a>
                            </td>
                            <?php } 
                        echo '</tr>';
                    endforeach ; 
                    else : 
                        echo '<tr>';
                            echo '<td colspan="7">Nenhum registro encontrado.</td>';
                        echo '</tr>';
                    endif ; ?>
                </tbody>
            </table>
        </main>
    </body>

