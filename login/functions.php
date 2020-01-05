<?php
session_start();
function ifItIsMethod($method=null){

    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){

        return true;

    }

    return false;

}





 function login_user($username, $password)
 {

     global $connection;

     $username = trim($username);
     $password = trim($password);

     $username = mysqli_real_escape_string($connection, $username);
     $password = mysqli_real_escape_string($connection, $password);


     $query = "SELECT * FROM users WHERE username = ? AND user_password=? ";
      $stmt = mysqli_prepare($connection, $query);

    mysqli_stmt_bind_param($stmt, 'ss', $username,$password);

    mysqli_stmt_execute($stmt);
	 $select_user_query=mysqli_stmt_get_result($stmt);
     $rows=mysqli_num_rows($select_user_query);
	 if($rows>0)
	 {
		 $row=mysqli_fetch_assoc($select_user_query);
		 $db_user_id = $row['id'];
         $db_username = $row['username'];
         $db_user_password = $row['user_password'];
         $db_user_firstname = $row['user_firstname'];
         $db_user_lastname = $row['user_lastname'];
         $db_user_role = $row['user_role']; 
		  $db_user_age = $row['Age']; 
		  $db_user_gender = $row['Gender'];
		  $db_user_mobile = $row['mobile_no'];
		  $post_id = $row['post_id'];
		 $qry1="SELECT * FROM `post` WHERE `post_id`='$post_id'";
		 $run=mysqli_query($connection,$qry1);
		 $row1=mysqli_fetch_assoc($run);
		 $post=$row1['post'];
		 $city_id=$row['city_id'];
		  $qry2="SELECT * FROM `cities` WHERE `city_id`='$city_id'";
		 $run1=mysqli_query($connection,$qry2);
		 $row2=mysqli_fetch_assoc($run1);
		 $city=$row2['name'];
		   $_SESSION['username'] = $db_username;
             $_SESSION['firstname'] = $db_user_firstname;
             $_SESSION['lastname'] = $db_user_lastname;
             $_SESSION['user_role'] = $db_user_role;
             $_SESSION['user_id'] = $db_user_id ;
		  $_SESSION['age'] = $db_user_age ;
		  $_SESSION['gender'] = $db_user_gender ;
		  $_SESSION['mobile_no'] = $db_user_mobile ;
		 $_SESSION['post'] = $post;
			 $_SESSION['post_id'] = $post_id;
		  $_SESSION['city'] = $city ;

					if($db_user_role=="admin"){
             redirect("../leave");
			}
			else
				redirect("../User_end/profile/profile.php");

	 }
 
else
{
	 echo "<script>alert('Wrong Credentials entered!')</script>";

           return false;
	
}
 }



    /*while($row = mysqli_fetch_array($select_user_query))
    {

         $db_user_id = $row['id'];
         $db_username = $row['username'];
         $db_user_password = $row['user_password'];
         $db_user_firstname = $row['user_firstname'];
         $db_user_lastname = $row['user_lastname'];
         $db_user_role = $row['user_role'];


         if (password_verify($password,$db_user_password)) {

             $_SESSION['username'] = $db_username;
             $_SESSION['firstname'] = $db_user_firstname;
             $_SESSION['lastname'] = $db_user_lastname;
             $_SESSION['user_role'] = $db_user_role;
             $_SESSION['user_id'] = $db_user_id ;

					if($db_user_role=="admin"){
             redirect("../leave/i");
			}
			else
				header("User_end/profile/profile.php");


         } else {

           echo "<script>alert('Wrong Credentials entered!')</script>";

           return false;



         }
       }


          




   if($rows==0) {

     echo "<script>alert('Username doesnt exists!')</script>";




   }

    return true;

 }*/
