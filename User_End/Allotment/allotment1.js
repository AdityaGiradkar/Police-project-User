function validate()
{
    var confirmCity = document.getElementById("city-options");
    var confirmLetter = document.getElementById("OfficialLetter");
    var tp = document.getElementsByClassName("conf");
    var flag=0;
    for(var i=0;i<tp.length;i++)
    {
        console.log(i);
        if(tp[i].value == "")
            {
                tp[i].classList.add("Box-error");
                flag = 1;
            }
        else{
            tp[i].classList.remove("Box-error");
        }
    }
    if(flag == 0)
        return true;
    else
        return false;
}

//show the prefrences functions
 function showPrefrence($city) {
     if($city != 0)
         {
             alert($city);
			  window.location.href="allotment.php?city="+$city;
             
         }
     else
         {
             document.getElementById('prefrences').style.display = "none";
         }
            
    }

//cancel function
function cancelFun()
{
    var conformation = confirm("Data may lost.");
    return conformation;
}