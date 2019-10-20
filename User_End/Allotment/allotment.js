//show the prefrences functions
 function showPrefrence($city) {
     if($city != 0)
         {
             alert($city);
             document.getElementById('prefrences').style.display = "block";
         }
     else
         {
             document.getElementById('prefrences').style.display = "none";
         }
            
        }


