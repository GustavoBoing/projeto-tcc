<!DOCTYPE html>
    <?php
        require_once('function.php');
        indexEPI();
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
        <header>
            <h2>&nbsp<i class='bx bx-hard-hat' id="icons"></i>&nbsp &nbsp ESTOQUE - EPI´s </h2>
            <hr>
            <!-- <div id="botoes">
                <div class="pill-nav" id="adicionar">
                    <a href="#contact">Adicionar</a>
                </div>
                <div class="pill-nav" id="editar">
                    <a href="#about">Editar</a>
                </div>
            </div> -->
        </header>
        <main>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>EPI</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Valor em Estoque</th>
                        <th>Alterações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($produtos) : ?>
                    <?php foreach($produtos as $produto) : ?>
                        <tr>
                        <?php 
                            if ($produto['Tipo'] == '1') 
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
                    <?php else : ?>
                        <tr>
                            <td colspan="7">Nenhum registro encontrado.</td>
                        </tr>
                    <?php endif ; ?>
                </tbody>
                <!-- <tr>
                    <td>001</td>
                    <td>Óculos de segurança</td>
                    <td>EPI</td>
                    <td>
                        <?php
                            // for ($j = 0; $j < 1; $j++) {
                            //     $valor = rand(1,100);
                            // }
                            // if ($valor < 10) {
                            //     echo '<span class="vermelho">' . $valor . '</span>';
                            // } elseif ($valor >= 11 && $valor <= 40) {
                            //     echo '<span class="amarelo">' . $valor . '</span>';
                            // } else {
                            //     echo '<span class="verde">' . $valor . '</span>';
                            // }
                        ?>-->
            </table>
        </main>

        <div class="w3-container">
            <div id="id01" class="w3-modal">
                <div class="w3-modal-content">
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
                                <input type="text" name="quantidade" class="form-control" id="editquantidade" placeholder="Quantidade">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-warning btn-sm" value="Salvar">Salvar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>

        <div class="w3-container">
            <div id="id02" class="w3-modal">
                <div class="w3-modal-content">
                <header class="w3-container w3-teal"> 
                    <span onclick="document.getElementById('id02').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                    <h2>Retirar</h2>
                </header>
                <div class="w3-container">
                <form method="POST" id="form-edit-usuario">
                        <input type="hidden" name="id" id="editid">

                        <div class="row mb-3">
                            <label for="quantidade" class="col-sm-2 col-form-label">Quantidade</label>
                            <div class="col-sm-10">
                                <input type="text" name="quantidade" class="form-control" id="editquantidade" placeholder="Quantidade">
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
                <div class="w3-modal-content">
                <header class="w3-container w3-teal"> 
                    <span onclick="document.getElementById('id03').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                    <h2>Editar</h2>
                </header>
                <div class="w3-container">
                    <form method="POST" id="form-edit-usuario">
                        <input type="hidden" name="id" id="editid">

                        <div class="row mb-3">
                            <label for="quantidade" class="col-sm-2 col-form-label">Quantidade</label>
                            <div class="col-sm-10">
                                <input type="text" name="quantidade" class="form-control" id="editquantidade" placeholder="Quantidade">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="valor" class="col-sm-2 col-form-label">Valor</label>
                            <div class="col-sm-10">
                                <input type="text" name="valor" class="form-control" id="editvalor" placeholder="Valor">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
                            <div class="col-sm-10">
                                <input type="text" name="modelo" class="form-control" id="editmodelo" placeholder="Modelo">
                            </div>
                        </div>

                        <div class="row mb-3">
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

            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

            <script src="js/custom.js"></script>

    </body>
<html>
