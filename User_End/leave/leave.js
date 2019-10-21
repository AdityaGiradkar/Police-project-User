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

//cancel function
var can = document.getElementById("cancel")
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