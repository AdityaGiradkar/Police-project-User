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



//show the Available quarter in city functions
 function showQuarter($city) {
     if($city != "")
         {
             alert($city);
             document.getElementById('quarterList').style.display = "block";
         }
     else
         {
             document.getElementById('quarterList').style.display = "none";
         }
            
        }


/*//cancel function
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
*/

//cancel function
function cancelFun()
{
    var conformation = confirm("Data may lost.");
    return conformation;
}