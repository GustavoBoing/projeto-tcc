<!DOCTYPE html>

<?php
  session_start();
  require_once "../config.php";
?>
  <?php include('../inc/modalLogout.php');?>
<html lang="pt-br">
  <head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>bootstrap/css/bootstrap.min.css"/>
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
          <?php if ($_SESSION['isAdmin'] === "Sim"){?>
            <li>
              <a  href="<?php echo BASEURL; ?>tablesAdmin/tableFornecedor.php">
                <i class="fa-solid fa-truck-fast" id="icons" ></i>
                <span class="link_name">Fornecedores</span>
              </a>
              <span class="tooltip">Fornecedores</span>
            </li>
            <li>
              <a  href="<?php echo BASEURL; ?>tablesAdmin/tableFuncionario.php">
                <i class="fa-solid fa-people-group" id="icons" ></i>
                <span class="link_name">Colaboradores</span>
              </a>
              <span class="tooltip">Colaboradores</span>
            </li>
            <li>
              <a  href="<?php echo BASEURL; ?>tablesAdmin/tableUser.php">
                <i class="fa-regular fa-user" id="icons"></i>
                <span class="link_name">Usuários</span>
              </a>
              <span class="tooltip">Usuários</span>
            </li>
          <?php } ?>
          <li>
            <a class="darkLight-searchBox">
              <div class="dark-light">
                <i id="icons" class='bx bx-moon moon'></i>
                <i id="icons" class='bx bx-sun sun'></i>
                <!-- <span class="link_name">Modo escuro</span> -->
                <span class="link_name">Modo escuro</span>
              </div>
              <!-- <span class="link_name">Modo escuro</span> -->
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

          <ul class="navlist">              
            <a class="user-logado">Você está logado como <b><?php echo $_SESSION['login']?></b></a>
            <a href="#" class="btn btn-transparent" data-bs-toggle="modal" data-bs-target="#logout-modal" data-logout="<?php echo $_SESSION['login']; ?>"><i class="fa-solid fa-circle-user fa-xl" style="color: #e16223;"></i></a>
          </ul>
        </nav>
        
      </div>

      
      
