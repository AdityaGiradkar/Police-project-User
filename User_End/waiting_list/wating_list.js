function showQuarter($city) {
     if($city != 0)
         {
             alert($city);
             document.getElementById('quarter').style.display = "block";
         }
     else
         {
             document.getElementById('quarter').style.display = "none";
         }
            
        }