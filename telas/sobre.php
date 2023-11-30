<?php
    session_start();
    require_once "../config.php";
    include(HEADER_TEMPLATE);
    if(!isset($_SESSION['login'])) {
        die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\"> Voltar</a></p>");
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>./inc/style.css" />
        <link rel="stylesheet" href="<?php echo BASEURL; ?>./css/styleSobre.css" />
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">

        <title>O Software</title>
    </head>

    <body>
        <div class="bgsolda">
            <h2>O Software</h2>
        </div>
        <main>
            <div class="textoSobre">
                <p>Temos o prazer de apresentar a Plataforma de Controle de Almoxarifado na versão 1.0.0, uma solução
                    desenvolvida com dedicação e expertise para otimizar a gestão de materiais na RV Soluções Industriais.
                    Nosso sistema foi projetado para atender às demandas específicas da empresa, proporcionando uma
                    abordagem eficaz e eficiente para administrar tanto insumos quanto Equipamentos de Proteção Individual
                    (EPIs).
                <div class="cTitulo">
                    <p>Características Principais:</p>
                </div>
                <div class="topicos">
                    <p class="top"><strong>Segurança Aperfeiçoada:</strong> A Plataforma de Controle de Almoxarifado prioriza a segurança de
                        informações sensíveis. Através da tela de login, garantimos que somente usuários autorizados tenham
                        acesso ao sistema, protegendo seus dados e mantendo a confidencialidade.</p>
                    <p class="top"><strong>Visão Global no Início:</strong> Ao adentrar o sistema, nossa tela de início oferece uma
                        visão abrangente da situação do almoxarifado. Apresentamos gráficos intuitivos e cards informativos
                        que destacam materiais em grande quantidade, aqueles em escassez e os itens mais utilizados. Essa
                        visualização estratégica auxilia na tomada de decisões assertivas.</p>
                    <p class="top"><strong>Gerenciamento Preciso de Insumos e EPIs:</strong> Nossa plataforma dispõe de telas
                        específicas para insumos e EPIs. Através de tabelas interativas, os usuários têm a possibilidade de
                        ajustar as quantidades de materiais, seja para retirada ou adição. Isso assegura a manutenção do
                        estoque conforme as necessidades operacionais.</p>
                    <p class="top"><strong>Transparência no Histórico:</strong> A funcionalidade de histórico de transações permite
                        rastrear as ações mais recentes realizadas no sistema. Cada movimentação, seja relacionada a insumos
                        ou EPIs, é registrada, garantindo transparência e fornecendo insights valiosos para análises
                        futuras.</p>
                    <p class="top"><strong>Configurações Personalizadas:</strong> A tela de configurações proporciona uma maneira
                        flexível de personalizar a experiência do usuário. Mesmo que os detalhes específicos desta seção
                        estejam sendo finalizados, nosso sistema já oferece um espaço para você definir parâmetros conforme
                        suas necessidades.</p>
                    <p class="top">A Plataforma de Controle de Almoxarifado é uma ferramenta que alavanca a eficiência, a organização e
                        a tomada de decisões informadas dentro do nosso ambiente industrial. Nosso compromisso é continuar
                        desenvolvendo recursos e funcionalidades que atendam às exigências dinâmicas de nossa empresa,
                        garantindo uma gestão de materiais precisa e estratégica.</p>
                </div>
            </div>

            <div class="centralizar">
                <div class="hidden">
                    <div class="divisor" >
                        <h3>A REALTECH</h3>
                        <div class="image">
                            <img src="./images/realtech.png">
                        </div>
                    </div>
                </div>

                <div class="hidden">
                    <div id="boxes" class="boxes">
                        <div id="caixa01" class="box">
                            <h3>Projetos Web &nbsp &nbsp <i class="fa-solid fa-display"></i></h3>
                            <p>Nossa empresa de tecnologia se destaca na criação de projetos de sites personalizados, que cativam o público e impulsionam o sucesso dos negócios.
                            Contamos com uma equipe experiente e comprometida em transformar ideias criativas em soluções digitais inovador.</p>
                        </div>

                        <div id="caixa02" class="box">
                            <h3>Projetos Mobile &nbsp &nbsp <i class="fa-solid fa-mobile-screen"></i></h3>
                            <p>Nossa empresa de tecnologia é líder no desenvolvimento de projetos mobiles inovadores, atendendo à crescente demanda por aplicativos e soluções móveis.
                            Nossa equipe altamente qualificada transforma ideias em aplicativos práticos e envolventes, adaptados às necessidades moveis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <script src="<?php echo BASEURL; ?>js/index.js"></script>
    <script src="<?php echo BASEURL; ?>js/script.js"defer></script>
</html>