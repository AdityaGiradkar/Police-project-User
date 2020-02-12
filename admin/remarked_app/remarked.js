  function printDiv(divName) {
      alert(divName);
      //document.getElementById("q_form").style.display = "none";
      //document.getElementById("selected_Q").style.display = "none";
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
       //document.getElementById("q_form").style.display = "block";
       //document.getElementById("selected_Q").style.display = "block";
}


function show_q($area){
    if($area!= ""){
		alert($area);
         window.location.href=window.location.href +"&area="+$area;
	}
    else
        document.getElementById("select_q").style.display = "none";
}

function display_selected_quater(){
    document.getElementById("q_form").style.display = "none";
    document.getElementById("selected_Q").style.display = "block";
}