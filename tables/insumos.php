<!DOCTYPE html>
    <?php
        require_once('function.php');
        indexINS();
        include(HEADER_TEMPLATE);
    ?>
<html>
    <head>
        <link rel="stylesheet" href="styleTbl.css"/>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
        <script src="<?php echo BASEURL; ?>inc/script.js"defer></script>
    </head>
    <body>
        <div class="tittle">
            <h2 class="titulos" style="color:#F06E2D; text-shadow: 1px 2px 5px black; letter-spacing:1px;"><i class='bx bx-grid-alt'></i>&nbsp Insumos </h2>
            <p id="subtitulo" style="font-size:small; margin:0 0 0 70px">Visão geral dos itens de Insumo</p>
        </div>
            <!-- <h2>&nbsp <i class='bx bx-grid-alt' id="icons"></i>&nbsp &nbsp ESTOQUE - INSUMOS </h2>
            <hr> -->
            <!-- <div id="botoes">
                <div class="pill-nav" id="adicionar">
                    <a href="#contact">Adicionar</a>
                </div>
                <div class="pill-nav" id="editar">
                    <a href="#about">Editar</a>
                </div>
            </div> -->
        <main>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Insumo</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Valor em Estoque</th>
                        <th>Alterações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($produtos) : ?>
                        <?php foreach($produtos as $produto) :?>
                            <tr>
                                <?php 
                                if ($produto['Tipo'] == '2') 
                                {
                                    echo '<td>'.$produto['id_produto'].'</td>';
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
                                    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black"><i class='bx bx-plus-circle'></i>Adicionar</button>
                                    <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-black"><i class='bx bx-minus-circle'></i>Retirar</button>
                                    <button onclick="document.getElementById('id03').style.display='block'" class="w3-button w3-black"><i class="fa-solid fa-user-pen"></i>Editar</button>
                                </td>
                                <?php } ?>
                            </tr>
                        <?php endforeach ; ?>    
                    <?php endif ; ?>
                </tbody>
            </table>
        </main>

    <div class= "modaltbl">                  
        <div class="w3-container ">
            <div id="id01" class="w3-modal">
                <div class="w3-modal-content w3-round">

                <header class="w3-container w3-black w3-center"> 
                    <span onclick="document.getElementById('id01').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                    <h2>Adicionar</h2>
                </header>

                <div class="w3-container">
                    <form method="POST" id="form-edit-usuario">
                        <input type="hidden" name="id" id="editid">
                        <div class="row mb-3 w3-padding-16">
                            <label for="quantidade" class="col-sm-2 col-form-label">Quantidade</label>
                            <div class="col-sm-10">
                                <input type="number" name="quantidade" class="form-control" id="editquantidade" placeholder="Digite a quantidade que deseja inserir">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-warning btn-sm" value="Salvar">Salvar</button>
                        <hr>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div> 

        <div class="w3-container">
            <div id="id02" class="w3-modal">
                <div class="w3-modal-content w3-round">
                <header class="w3-container w3-black w3-center"> 
                    <span onclick="document.getElementById('id02').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                    <h2>Retirar</h2>
                </header>
                <div class="w3-container">
                <form method="POST" id="form-edit-usuario">
                        <input type="hidden" name="id" id="editid">

                        <div class="row mb-3 w3-padding-16">
                            <label for="quantidade" class="col-sm-2 col-form-label">Quantidade</label>
                            <div class="col-sm-10">
                                <input type="number" name="quantidade" class="form-control" min="0" id="editquantidade" placeholder="Quantidade">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-warning btn-sm" value="Salvar">Salvar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <div class="w3-container">
            <div id="id03" class="w3-modal">
                <div class="w3-modal-content w3-round">
                <header class="w3-container w3-black w3-center"> 
                    <span onclick="document.getElementById('id03').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                    <h2>Editar</h2>
                </header>
                <div class="w3-container">
                    <form method="POST" id="form-edit-usuario">
                        <input type="hidden" name="id" id="editid">

                        <div class="row mb-3 w3-padding-16">
                            <label for="quantidade" class="col-sm-2 col-form-label">Quantidade</label>
                            <div class="col-sm-10">
                                <input type="text" name="quantidade" class="form-control" id="editquantidade" placeholder="Quantidade">
                            </div>
                        </div>

                        <div class="row mb-3 w3-padding-16">
                            <label for="valor" class="col-sm-2 col-form-label">Valor</label>
                            <div class="col-sm-10">
                                <input type="text" name="valor" class="form-control" id="editvalor" placeholder="Valor">
                            </div>
                        </div>

                        <div class="row mb-3 w3-padding-16">
                            <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
                            <div class="col-sm-10">
                                <input type="text" name="modelo" class="form-control" id="editmodelo" placeholder="Modelo">
                            </div>
                        </div>

                        <div class="row mb-3 w3-padding-16">
                            <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                            <div class="col-sm-10">
                                <input type="text" name="descricao" class="form-control" id="editdescricao" placeholder="Descrição">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-warning btn-sm" value="Salvar">Salvar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </body>
    <script src="<?php echo BASEURL ?>js/tabelas.js"></script>
</html>
