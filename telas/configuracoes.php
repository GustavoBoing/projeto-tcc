<?php
    session_start();
    require_once('function.php');
    include(HEADER_TEMPLATE);
    if(!isset($_SESSION['login'])) {
        die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\"> Voltar</a></p>");
    }
    if($_SESSION['isAdmin'] != "Sim"){
        die ("Você não pode acessar esta página porque não é o administrador.<p><a href=\"../telas/index.php\"> Voltar</a></p>");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>./css/styleSobre.css" />
        <link rel="stylesheet" href="<?php echo BASEURL; ?>css/configuracoes.css">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
        <title>Almoxarifado - Configurações</title>
    </head>
    <body>
    <div class="tittle">
        <h2 class="titulos"><i class="bx bx-cog"></i>&nbsp Configurações </h2>
        <p id="subtitulo" style="font-size:small; margin:0 0 0 70px">Visão geral das configurações</p>
    </div>
    <main>
        <div id="boxes" class="boxes">
            <div id="caixa01" class="box">
                <h3>Adicionar Funcionario &nbsp &nbsp <i class="fa-solid fa-user"></i></h3>
                
                <p>Adicionar um funcionário como usuário no site da empresa é um processo fundamental para conceder acesso a recursos específicos, 
                como informações internas, ferramentas colaborativas ou outras áreas restritas do site.
                Esse procedimento geralmente envolve a criação de contas de usuário personalizadas e a atribuição de permissões adequadas.<p>
                <div class="btnInsereProduto">
                    <a href="<?php echo BASEURL; ?>telas/adicionarUser.php"><button>Adicionar Usuário</button></a>
                </div>
            </div>

            <div id="caixa02" class="box">
                    <h3>Adicionar Produto &nbsp &nbsp <i class="fa-solid fa-boxes-stacked"></i></h3>
                    <p>Adicionar um novo produto ao site da empresa é uma etapa crucial no gerenciamento do catálogo online. Essa prática não apenas mantém os clientes informados sobre os últimos lançamentos, mas também aprimora a experiência de compra, proporcionando um catálogo diversificado e atualizado. 
                        Neste guia, exploraremos os passos detalhados para adicionar um produto com eficiência ao seu site, garantindo que os clientes tenham acesso fácil às informações mais recentes sobre os produtos oferecidos.</p>
                    <div class="btnInsereUsuario">
                        <a href="<?php echo BASEURL; ?>telas/funcionario.php"><button>Adicionar Produto</button></a>
                    </div>
            </div>

            <div id="caixa03" class="box">
                    <h3>Adicionar Fornecedor &nbsp &nbsp <i class="fa-solid fa-boxes-stacked"></i></h3>
                    <p>Um fornecedor desempenha um papel fundamental no sucesso de uma empresa, desdobrando-se como um elo crucial na cadeia de suprimentos e desempenhando um papel estratégico em sua operação. 
                    A importância de um fornecedor vai muito além da simples entrega de produtos ou serviços, influenciando diretamente a eficiência operacional, a qualidade do produto final e, consequentemente, a satisfação do cliente.</p>
                    <div class="btnInsereUsuario01">
                        <a href="<?php echo BASEURL; ?>tables/fornecedor.php"><button>Adicionar Fornecedor</button></a>
                    </div>
            </div>
        </div>

    </main>
    </body>

    <script src="<?php echo BASEURL; ?>js/index.js"></script>
    <script src="<?php echo BASEURL; ?>js/script.js"defer></script>
    
</html>