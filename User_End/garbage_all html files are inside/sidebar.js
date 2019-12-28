function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
    document.getElementById("navbar-custom").style.marginLeft = "250px";
  document.getElementById("main-content").style.display = "none";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
     document.getElementById("navbar-custom").style.marginLeft = "0px";
  document.getElementById("main-content").style.display = "block";
}