//

function validate()
{
    var tp = document.getElementsByClassName("conf");
    var flag=0;
    for(var i=0;i<tp.length;i++)
    {
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









function validate()
{
    var confirmCity = document.getElementById("city-options");
    var confirmBill = document.getElementById("electricityBill");
    var confirmLetter = document.getElementById("OfficialLetter");

    /*if(confirmCity.value == 0 && confirmLetter.value == "" && confirmBill.value == "")
        {
            confirmBill.classList.add("Box-error");
            confirmCity.classList.add("Box-error");
            confirmLetter.classList.add("Box-error");   
            return false;
        }*/
    if(confirmCity.value != 0 && confirmLetter.value != "" && confirmBill.value != "")
        {
            var conformation = confirm("Do you want to submit");
            if(conformation)
                {
                    return true;      
                }
            else
                {
                    return false;
                }
        }
    else
        {
            if(confirmCity.value == 0)
                {
                    //confirmLetter.classList.remove("Box-error");
                    confirmCity.classList.add("Box-error");
                    //return false;
                }
            if(confirmLetter.value == "")
                {
                    //confirmCity.classList.remove("Box-error");
                    confirmLetter.classList.add("Box-error");
                    //return false;
                }
            if(confirmBill.value == "")
                {
                    //confirmCity.classList.remove("Box-error");
                    confirmBill.classList.add("Box-error");
                    //return false;
                }
            return false;
        }
    
    /*if(confirmCity.value == 0)
        {
            //confirmLetter.classList.remove("Box-error");
            confirmCity.classList.add("Box-error");
            return false;
        }
    if(confirmLetter.value == "")
        {
            //confirmCity.classList.remove("Box-error");
            confirmLetter.classList.add("Box-error");
            return false;
        }
    if(confirmBill.value == "")
        {
            //confirmCity.classList.remove("Box-error");
            confirmBill.classList.add("Box-error");
            return false;
        }
    */
    /*else
        {
            var conformation = confirm("Do you want to submit");
            if(conformation)
                {
                    return true;      
                }
            else
                {
                    return false;
                }
        }*/
}

/*
//submit function
var sub = document.getElementById("sub");
sub.addEventListener("click", submitFun);

function submitFun(){
    var conformation = confirm("Do you want to submit");
    if(conformation)
    {
         document.getElementById("form-action").action = "../profile/profile.html";      
    }
    else
    {
        //how??????????????????????????? without changing the current inputs
    }
}
*/
//cancel function
var can = document.getElementById("cancel");
cancel.addEventListener("click", cancelFun);

function cancelFun()
{
    var conformation = confirm("Data may lost.");
    if(conformation)
    {
        document.getElementById("cancel").href = "../profile/profile.html";
    }
    else
    {
        //how??????????????????????????? without changing the current inputs
    }
}


//show the Available quarter in city functions
 function showQuarter($city) {
     if($city != 0)
         {
             alert($city);
             document.getElementById('quarterList').style.display = "block";
         }
     else
         {
             document.getElementById('quarterList').style.display = "none";
         }
            
        }
