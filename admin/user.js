//sidebar

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
  document.getElementById("main-content").style.display = "inline-block";
}


//validate form
function validate() {
    var tp = document.getElementsByClassName("conf");
    var flag = 0;
    for (var i = 0; i < tp.length; i++) {
        if (tp[i].value == "") {
            tp[i].classList.add("Box-error");
            flag = 1;
        } else {
            tp[i].classList.remove("Box-error");
        }
    }
    if (flag == 0)
        return true;
    else
        return false;

}


//cancle function
function cancelFun()
{
    var conformation = confirm("Data may lost.");
    return conformation;
}






//sidebar color
/*var list = document.getElementsByClassName("a");
var i;
console.log(list.length);
for (i = 0; i < list.length; i++) {
    
  list[i].addEventListener("click", function() {
  this.classList.add("active");
  });
}



function selectChannel(channelNumber) {
  let listItems = document.getElementsByClassName("sidenav").getElementsByClassName("sidenav-list");
   
  var length = listItems.length;
   console.log(channelNumber);
    for (var i = 0; i < length; i++) {
    listItems[i].className = i+1 == channelNumber ? "selected" : "";
  }
}*/






/* $('.sidenav-list').click(function(e) {
    e.preventDefault();
    
    $('.sidenav-list').removeClass('selected');
    
    // Do an ajax call instead
    //$('#response').html($(this).attr("href"));
     // window.location.replace($(this).attr("href"));

    $(this).addClass('selected');
      //window.location.replace($(this).attr("href"));
    //window.location.href=($(this).attr("href"));
 });*/