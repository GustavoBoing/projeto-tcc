<!DOCTYPE html>

<?php
  require_once "../config.php";
  require_once "function.php";
?>

<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/style.css"/>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>inc/styleDark.css">  
    
  </head>

  <header>
    <div class="sidebar" id="sidebar">
      <div class="logo_details">
        <i class="bx bxl-audible icon" id="icons"></i>
        <div class="logo_name">RealTech</div>
          <i class="bx bx-menu" id="btn"></i>
        </div>
        <ul class="nav-list">
          <li>
            <a href="<?php echo BASEURL; ?>telas/index.php">
              <i class='bx bx-home-alt-2' id="icons"></i>
              <span class="link_name">Início</span>
            </a>
            <span class="tooltip">Início</span>
          </li>
          <li>
            <a href="<?php echo BASEURL; ?>./tables/insumos.php">
              <i class='bx bx-grid-alt' id="icons"></i>
              <span class="link_name">Insumos</span>
            </a>
            <span class="tooltip">Insumos</span>
          </li>
          <li>
            <a href="<?php echo BASEURL; ?>./tables/epis.php">
              <i class='bx bx-hard-hat' id="icons"></i>
              <span class="link_name">EPI's</span>
            </a>
            <span class="tooltip">EPI's</span>
          </li>
          <li>
            <a href="<?php echo BASEURL; ?>telas/historico.php">
              <i class='bx bx-transfer-alt' id="icons"></i>
              <span class="link_name">Histórico de transações</span>
            </a>
            <span class="tooltip">Histórico de transações</span>
          </li>
          <li>
            <a href="<?php echo BASEURL; ?>telas/sobre.php">
              <i class='bx bx-info-circle' id="icons"></i>
              <span class="link_name">O Software</span>
            </a>
            <span class="tooltip">O Software</span>
          </li>
          <li>
            <a  href="#">
              <i class="bx bx-cog" id="icons"></i>
              <span class="link_name">Configurações</span>
            </a>
            <span class="tooltip">Configurações</span>
          </li>
          <!-- <div class="darkLight-searchBox">
            <div class="dark-light">
                <i class='bx bx-moon moon'></i>
                <i class='bx bx-sun sun'></i>
            </div>
          </div> -->
          <li>
            <a class="darkLight-searchBox">
              <div class="dark-light">
                <i class='bx bx-moon moon'></i>
                <i class='bx bx-sun sun'></i>
                <span class="link_name">Modo escuro</span>
              </div>
            </a>
            <span class="tooltip">Modo escuro</span>
          </li>
        </ul>
      </div>
    </div>
  </header>
    <section class="home-section">
      <div class="topnav" id="myTopnav"> 
        <nav>
          <a class="logo_rv" href="#">
            <img src="<?php echo BASEURL; ?>images/logo.png" alt="logo" width="45" height="">
          </a>
          <ul class="container">
            <a class="logo" href="#">RV Soluções Industriais</a>
          </ul>
          <ul>
            <p class="user-logado">Você está logado como </p>
          </ul>
          <ul class="navlist">
            <li><a href="#" class="login"><i class="fa-solid fa-circle-user fa-xl" style="color: #e16223;"></i></a></li>
          </ul>
        </nav>
      </div>
