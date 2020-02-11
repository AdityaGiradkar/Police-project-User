function showQuarter($city) {
     if($city != 0)
         {
             
              window.location.href="waiting.php?city="+$city;
			 alert($city);
         }
     else
         {
             document.getElementById('quarter').style.display = "none";
         }
            
        }