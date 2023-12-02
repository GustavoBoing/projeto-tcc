document.addEventListener("DOMContentLoaded", function (){
  const sidebar = document.querySelector(".sidebar");
  const closeBtn = document.querySelector("#btn");
  const searchBtn = document.querySelector(".bx-search")
  const searchToggle = document.querySelector(".searchBox"); // Adicione esta linha
  const body = document.querySelector("body");
  const nav = document.querySelector("nav");
  const modeToggle = document.querySelector(".dark-light");
  const sidebarOpen = document.querySelector(".sidebarOpen");


  let getMode = localStorage.getItem("mode");
  if(getMode && getMode === "dark-mode"){
    body.classList.add("dark");
  }

    // js code to toggle dark and light mode
  // js código para alternar o modo escuro e claro

  modeToggle.addEventListener("click" , () =>{
    modeToggle.classList.toggle("active");
    body.classList.toggle("dark");

    //  js code to keep user selected mode even page refresh or file reopen
    //  js para manter o modo selecionado pelo usuário, mesmo atualização de página ou reabertura de arquivo
    if(!body.classList.contains("dark")){
        localStorage.setItem("mode" , "light-mode");
    }else{
        localStorage.setItem("mode" , "dark-mode");
    }
  });

  closeBtn.addEventListener("click",function(){
    sidebar.classList.toggle("open")
    menuBtnChange()
  })

  searchBtn.addEventListener("click",function(){
      sidebar.classList.toggle("open")
      menuBtnChange()
  })

  function menuBtnChange(){
      if(sidebar.classList.contains("open")){
          closeBtn.classList.replace("bx-menu","bx-menu-alt-right")
      }else{
          closeBtn.classList.replace("bx-menu-alt-right","bx-menu")
      }
  }

  // js code to toggle search box
  // código js para alternar a caixa de pesquisa

    searchToggle.addEventListener("click" , () =>{
    searchToggle.classList.toggle("active");
  });

    
  //   js code to toggle sidebar
  //   js código para alternar a barra lateral

  sidebarOpen.addEventListener("click" , () =>{
    nav.classList.add("active");
  });

  body.addEventListener("click" , e =>{
    let clickedElm = e.target;

    if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
        nav.classList.remove("active");
    }

  });  

  let slideIndex = 1;
  showSlides(slideIndex);
  
  
  function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
  }
});