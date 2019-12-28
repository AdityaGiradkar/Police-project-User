//show the Available quarter in city functions
function showQuarter($city) {
    if ($city != "") {
        var city=$city;
			 
			 window.location.href="leave.php?city="+$city;
			 alert(city);
    } else {
        document.getElementById('quarterList').style.display = "none";
    }

}


//cancel function
function cancelFun() {
    var conformation = confirm("Data may lost.");
    return conformation;
}


