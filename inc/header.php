<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="style.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap'); 

  :root{
  --color-default:#1c1c1c;
  --color-second:	#D3D3D3;
  --color-white:#89817D;
  --color-body:#4A3F35;
  --color-black:#F06E2D;
}


*{
  padding: 0%;
  margin: 0%;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.container {
  font-size:20px;
  text-transform: uppercase;
  letter-spacing: 4px;
  margin-left: 10%;
}

.container .logo {
  cursor: default;
}

.sidebar{
  min-height: 100vh;
  width: 78px;
  padding: 6px 14px;
  z-index: 99;
  background-color: var(--color-default);
  transition: all .5s ease;
  position: fixed;
  top:0;
  left: 0;
}

.sidebar.open{
  width: 260px;
}

.sidebar .logo_details{
  height: 60px;
  display: flex;
  align-items: center;
  position: relative;
}

.sidebar .logo_details .icon{
  opacity: 0;
  transition: all 0.5s ease ;
}



.sidebar .logo_details .logo_name{
  color:var(--color-black);
  font-size: 22px;
  font-weight: 600;
  opacity: 0;
  transition: all .5s ease;
}

.sidebar.open .logo_details .icon,
.sidebar.open .logo_details .logo_name{
  opacity: 1;
}

.sidebar .logo_details #btn{
  position: absolute;
  top:3.7vh;
  right: 0;
  transform: translateY(-50%);
  font-size: 23px;
  text-align: center;
  cursor: pointer;
  transition: all .5s ease;
  text-shadow: 1px 2px 5px #F06E2D;
}

.sidebar.open .logo_details #btn{
  text-align: right;
  text-shadow: 1px 2px 5px #F06E2D;
}

.sidebar i{
  color:var(--color-black);
  height: 60px;
  line-height: 60px;
  min-width: 50px;
  font-size: 25px;
  text-align: center;
}

.sidebar .nav-list{
  margin-top: -5px;
  height: 100%;
}

.sidebar li{
  position: relative;
  margin:8px 0;
  list-style: none;
}

.sidebar li .tooltip{
  position: absolute;
  top:-20px;
  left:calc(100% + 15px);
  z-index: 3;
  background-color: var(--color-white);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  padding: 6px 14px;
  font-size: 15px;
  font-weight: 400;
  border-radius: 5px;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
}

.sidebar li:hover .tooltip{
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
  top:50%;
  transform: translateY(-50%);
}

.sidebar.open li .tooltip{
  display: none;
}

.sidebar input{
  font-size: 15px;
  color: var(--color-black);
  font-weight: 400;
  outline: none;
  height: 35px;
  width: 35px;
  border:none;
  border-radius: 5px;
  transition: all .5s ease;
}

.sidebar.open input{
  width: 100%;
  padding: 0 20px 0 50px;
}

.sidebar li a{
  display: flex;
  height: 100%;
  width: 100%;
  align-items: center;
  text-decoration: none;
  background-color: var(--color-default);
  position: relative;
  transition: all .5s ease;
  z-index: 12;
}

.sidebar li a::after{
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  transform: scaleX(0);
  background-color: var(--color-white);
  border-radius: 5px;
  transition: transform 0.3s ease-in-out;
  transform-origin: left;
  z-index: -2;
}

.sidebar li a:hover::after{
  transform: scaleX(1);
  color:var(--color-default)
}

.sidebar li a .link_name{
  color:var(--color-black);
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
  pointer-events: auto;
  transition: all 0.4s ease;
  pointer-events: none;
  opacity: 0;
}

.sidebar li a:hover .link_name,
.sidebar li a:hover i{
  transition: all 0.5s ease;
  color:var(--color-default)
}

.sidebar.open li a .link_name{
  opacity: 1;
  pointer-events: auto;
}

.sidebar li i{
  height: 35px;
  line-height: 35px;
  font-size: 18px;
  border-radius: 5px;
}

.home-section{
  position: absolute;
  background-color: var(--color-body);
  min-height: 100vh;
  top:0vh;
  left:78px;
  width: calc(100% - 78px);
  transition: all .5s ease;
  z-index: 2;
}

.sidebar.open ~ .home-section{
  left:250px;
  width: calc(100% - 250px);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

a {
    color: #232323;
    text-decoration: none;
    transition: 0.5s;
  }

nav li:hover {
  opacity: 0.7;
}

.container {
  font-size:20px;
  text-transform: uppercase;
  letter-spacing: 4px;
  margin-left: 3%;
}

.container .logo {
  cursor: default;
  color: var(--color-black);
}

nav {
  display: flex;
  align-items: center;
  font-family: system-ui, -apple-system, Helvetica, sans-serif, Arial;
  background: var(--color-default);
  height: 9vh;
  position: relative;
  top: 0;
  left: 0;
  right: 0;
  z-index: 999;
}

.navlist {
  list-style: none;
}

.navlist:hover{
  opacity: 0.7;
}

.navlist li {
  position: absolute;
  right: 30px;
  top: 2.5vh
}

#ins, #epi {
  margin-left: 20px;
  font-size: 14px;
  height:4vh;
}

@media (max-width:900px){
  .navlist {
    display: flex;
    font-size: 14px;
    align-items: center;
  }
  .logo {
    position: fixed;
    display: relative;
    text-align: center;
    font-size: 14px;
    top:2.7vh;
    cursor: default;
    margin-left: 10vh;
  }
  .logo_rv {
    position: fixed;
    margin-top: 1.2vh;
    margin-left: 3vh;
    cursor: default;
    align-items: center;
  }
}

.logo_rv {
  position: relative;
  margin-top: 1.2vh;
  margin-left: 3vh;
  cursor: default;
}

#icons {
  text-shadow: 1px 2px 5px #F06E2D;
}
#dark {
  position: fixed;
  height: 60px;
  width: 78px;
  left: 0;
  bottom:-8px;
  padding:10px 14px;
  overflow: hidden;
  transition: all .5s ease;
  text-shadow: 1px 2px 5px #F06E2D;
}
body.darkmode{
    --color-default:#C0C0C0;
  ond  --color-sec:	#D3D3D3;
    --color-white:#fff;
    --color-body:#4A3F35;
    --color-light:#e0e0e0;
    --color-black:#4F4F4F;
}
    </style>
    <script src="js/script.js"></script>
  </head>

  <header>
    <div class="sidebar">
      <div class="logo_details">
        <i class="bx bxl-audible icon" id="icons"></i>
        <div class="logo_name">RealTech</div>
          <i class="bx bx-menu" id="btn"></i>
        </div>
        <ul class="nav-list">
          <li>
            <a href="<?php echo BASEURL; ?>index.php">
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
            <a href="#">
              <i class='bx bx-transfer-alt' id="icons"></i>
              <span class="link_name">Histórico de transações</span>
            </a>
            <span class="tooltip">Histórico de transações</span>
          </li>
          <li>
            <a href="<?php echo BASEURL; ?>sobre.php">
              <i class='bx bx-info-circle' id="icons"></i>
              <span class="link_name">Sobre</span>
            </a>
            <span class="tooltip">Sobre</span>
          </li>
          <li>
            <a  href="#">
              <i class="bx bx-cog" id="icons"></i>
              <span class="link_name">Configurações</span>
            </a>
            <span class="tooltip">Configurações</span>
          </li>
          <li>
            <a id="dark-mode" href="dark">
              <i class="fa-solid fa-circle-half-stroke" id="dark" for = "drk"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
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
            <li><a href="#" class="login"><i class="fa-regular fa-user fa-lg" style="color: #F06E2D;"></i></i></a></li>
          </ul>
        </nav>
      </div>

      
</html>