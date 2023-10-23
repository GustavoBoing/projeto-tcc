<!DOCTYPE html>

<?php
    require_once "../config.php";
    include(HEADER_TEMPLATE);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo BASEURL; ?>./inc/style.css" />
        <link rel="stylesheet" href="<?php echo BASEURL; ?>./images" />
        <link rel="stylesheet" href="<?php echo BASEURL; ?>./css/styleSobre.css" />
        <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">
        <script src="<?php echo BASEURL; ?>inc/script.js"defer></script>
        
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
                    <p><strong>Segurança Aperfeiçoada:</strong> A Plataforma de Controle de Almoxarifado prioriza a segurança de
                        informações sensíveis. Através da tela de login, garantimos que somente usuários autorizados tenham
                        acesso ao sistema, protegendo seus dados e mantendo a confidencialidade.</p>
                    <p><strong>Visão Global no Início:</strong> Ao adentrar o sistema, nossa tela de início oferece uma
                        visão abrangente da situação do almoxarifado. Apresentamos gráficos intuitivos e cards informativos
                        que destacam materiais em grande quantidade, aqueles em escassez e os itens mais utilizados. Essa
                        visualização estratégica auxilia na tomada de decisões assertivas.</p>
                    <p><strong>Gerenciamento Preciso de Insumos e EPIs:</strong> Nossa plataforma dispõe de telas
                        específicas para insumos e EPIs. Através de tabelas interativas, os usuários têm a possibilidade de
                        ajustar as quantidades de materiais, seja para retirada ou adição. Isso assegura a manutenção do
                        estoque conforme as necessidades operacionais.</p>
                    <p><strong>Transparência no Histórico:</strong> A funcionalidade de histórico de transações permite
                        rastrear as ações mais recentes realizadas no sistema. Cada movimentação, seja relacionada a insumos
                        ou EPIs, é registrada, garantindo transparência e fornecendo insights valiosos para análises
                        futuras.</p>
                    <p><strong>Configurações Personalizadas:</strong> A tela de configurações proporciona uma maneira
                        flexível de personalizar a experiência do usuário. Mesmo que os detalhes específicos desta seção
                        estejam sendo finalizados, nosso sistema já oferece um espaço para você definir parâmetros conforme
                        suas necessidades.</p>
                    <p>A Plataforma de Controle de Almoxarifado é uma ferramenta que alavanca a eficiência, a organização e
                        a tomada de decisões informadas dentro do nosso ambiente industrial. Nosso compromisso é continuar
                        desenvolvendo recursos e funcionalidades que atendam às exigências dinâmicas de nossa empresa,
                        garantindo uma gestão de materiais precisa e estratégica.</p>
                </div>
            </div>

            <!-- Slideshow container -->
            <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <div class="numbertext">1 / 3</div>
                 <img src="soldador.jpg" style="width:100%">
                <div class="text">Trabalhamos para novas Tecnologias</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                    <img src="/images/img2.png" style="width:100%">
                <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                    <img src="soldador2.jpg" style="width:100%">
                <div class="text">Caption Three</div>
            </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>


            <div class="centralizar">
                <div class="divisor" >
                    <h3>A REALTECH</h3>
                    <div class="image">
                        <img src="./images/realtech.png">
                    </div>
                </div>


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
        </main>
        <script src="js/script.js" defer></script>
    </body>
</html>