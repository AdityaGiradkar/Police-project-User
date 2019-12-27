<?php
session_start();
 include("../../db.php");
$user_id=$_SESSION['user_id'];

$query="SELECT * FROM `leave_status` WHERE `user_id`='$user_id'";
$run=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($run);
if($row['status']=='Approved')
{

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!--link of external css-->
    <link rel="stylesheet" href="allotment.css">
    
    <!--global css-->
    <link rel="stylesheet" href="../user.css">

    <!--font
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
-->
    <title>Allotment</title>

    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js//all.js"></script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper">
            <!--<div class="sidebar-heading"> </div>
            <div class="sidebar-heading"> </div>-->
            <div class="sidebar-heading" style="padding-top: 15%; padding-bottom: 5%;">
                <center>
                    <h3>Dashboard</h3>
                </center>
            </div>
            <hr>
            <div class="list-group list-group-flush container  green borderXwidth">
                <a href="../waiting_list/waiting.html" class="custom-list">Quater availability</a>
                <a href="../leave/leave.php" class="custom-list">Leave form</a>
                <a href="../Allotment/allotment.php" class="custom-list">Allotment Form</a>
                <a href="../history/history.php" class="custom-list">History</a>
                <a href="#" class="custom-list">Setting</a>
                <a href="../../login/logout.php" class="custom-list">Logout</a>
            </div>
        </div>

        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <span class="navbar-toggler-icon" id="menu-toggle"></span>
                <div class="brand">
                    <a class="navbar-brand " href="index.html">
                        <img src="../images/logo.png" width="80" height="80" class="d-inline-block align-top" alt="">
                    </a>
                </div>
            </nav>


    <!--Form Body-->
    <div class="container allotment">
        <form action="allotment.php" id="form-action" method="post" onsubmit="return validate()" enctype="multipart/form-data">
            <h2 class="form-heading" style="text-align: center; padding-bottom: 4%">Allotment Form</h2>
            <hr>

            <!--selection of city, after selection call function showPrefrence()-->
            <div class="form-group allot">
                <label><b>Posting City</b></label>
                <select class="form-control" name="City" id="city" onchange="showPrefrence(value)">
                    <option value="0">Select</option>
                   <?php
                   
                    $qry="SELECT * FROM `cities` WHERE 1";
                    $run=mysqli_query($con,$qry);
                    while($row=mysqli_fetch_assoc($run)){
						if(isset($_GET['city'])){
                        ?>
					
                    <option value="<?php echo $row['name']; ?>" <?php if($_GET['city']==$row['name']){ ?>  selected <?php } ?> ><?php echo $row['name']; ?></option>
                   <?php
						}
						else{ ?>
						
						<option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
				<?php		}
					} 
					?>
                </select>
            </div>
            <div <?php  if(isset($_GET['city'])) { ?> style="display:block ;"  <?php } else { ?> style="display:none;" <?php } ?>id="prefrences">
                <div class="row" style="padding-left: 5%; padding-right: 0; ">
					<?php for($i=0;$i<4;$i++)
				{     ?>   <div class="col-lg-3 col-sm-6">
                        <div class="form-group">
                            <label><small><b>Preference <?php echo $i+1; ?></b></small></label>
                            <select class="form-control" name="<?php echo $i; ?>">
                               <?php if(isset($_GET['city'])){
				$city=$_GET['city'];
				$qry="SELECT * FROM `cities` WHERE  `name`='$city'";
				$run=mysqli_query($con,$qry);
				$row=mysqli_fetch_assoc($run);
				$city_id=$row['city_id'];
				$qry1="SELECT * FROM `area` WHERE `city_id`='$city_id'";
				$run1=mysqli_query($con,$qry1);
					while($row1=mysqli_fetch_assoc($run1)){
						?>
								<option><?php echo $row1['name'] ?></option>
                           <?php } 
				}
				 else
				 	{ ?>				
                    <option>Please select city first</option>
                    
            <?php } ?>       
								?> </select>
                        </div>
					</div>
					<?php } ?>
                </div>
            </div>

            <div class="form-group allot">
                <label for="OfficialLetter"><b>Official Letter</b></label>
                <input type="file" class="form-control-file" name="transfer" id="OfficialLetter" required>
            </div>

            <div class="form-group allot">
                <label for="Sugestion"><b>Suggestion / Additional Requirements</b></label>
                <textarea class="form-control" id="sugestion" name="suggestion" rows="3"></textarea>
            </div>
            <div style="text-align: center">
                <input class="btn btn-primary active" type="submit" id="sub" name="submit" value="submit">
                <a class="btn btn-danger active" style="margin-left: 25%;" type="submit" id="cancel" href = "" name="cancel">Cancel</a>
            </div>
        </form>
    </div>


    <!--footer-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-content">
                    <p>Contact Details : </p>
                    <ul style="list-style: none; padding-left: 0;">
                        <li>Abc : +9123456789</li>
                        <li>gbd : +5463728919</li>
                        <li>email : adityagiradkar11@gmail.com</li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <div class="footer-content">
                        <p>Our social media support</p>
                        <a class="fb-ic social-icon" href="https://www.facebook.com">
                            <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <a class="tw-ic social-icon" href="https://twitter.com">
                            <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <a class="ins-ic social-icon" href="https://www.instagram.com/?hl=en">
                            <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="footer-content">
                        <center>
                            <p>Our office location</p>
                        </center>
                        <div class="map-responsive">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3784.4319798055867!2d73.86543031439693!3d18.464082075719663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2ea950f616219%3A0x321bdae2cea9f064!2sVishwakarma%20Institute%20of%20Technology!5e0!3m2!1sen!2sin!4v1569745970324!5m2!1sen!2sin" width="200" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="background-color: white;">
            <center>
                <p>&#169; All coppyrights are recived.</p>
            </center>
        </div>

    </footer>



    <!--external js file link-->
    <script src="allotment1.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
	<?php
}

	else
	echo "<script>alert('Your leave Status is not approved')</script>";
?>
<?php 

if(isset($_POST['submit'])){
$qua1=$_POST['0'];
	$qry="SELECT * FROM `area` WHERE `name`='$qua1'";//fetch the areas ids applied
	$run=mysqli_query($con,$qry);
	$row=mysqli_fetch_assoc($run);
	
	$area1_id=$row['area_id'];
	$qua2=$_POST['1'];
	$qry1="SELECT * FROM `area` WHERE `name`='$qua2'";
	$run1=mysqli_query($con,$qry1);
	$row1=mysqli_fetch_assoc($run1);
	$area2_id=$row1['area_id'];
	$qua3=$_POST['2'];
	$qry2="SELECT * FROM `area` WHERE `name`='$qua3'";
	$run2=mysqli_query($con,$qry2);
	$row2=mysqli_fetch_assoc($run2);
	$area3_id=$row2['area_id'];
	$qua4=$_POST['3'];
	$qry3="SELECT * FROM `area` WHERE `name`='$qua4'";
	$run3=mysqli_query($con,$qry3);
	$row3=mysqli_fetch_assoc($run3);
	$area4_id=$row3['area_id'];
	 $transfer = $_FILES['transfer']['name'];
       $transfer_temp   = $_FILES['transfer']['tmp_name'];
	$require=$_POST['suggestion'];
 $moved=move_uploaded_file($transfer_temp, "../Files/$transfer" );
	$leave_status="SELECT * FROM `leave_status` WHERE `user_id`='$user_id'";//fetch the id of quater left
	$leave_run=mysqli_query($con,$leave_status);
	$row=mysqli_fetch_assoc($leave_run);
	$left_quater=$row['quater_id'];
	$post_id=$_SESSION['post_id'];
	//insert into applicant and also update the history
	$qry4="INSERT INTO `applicant`(  `user_id`,`area_id1`, `area_id2`, `area_id3`, `area_id4`, `Post_id`, `Requirements`, `Desk`, `resident`, `Status`,`Official_letter`) VALUES('$user_id','$area1_id','$area2_id','$area3_id','$area4_id','$post_id','$require','1','Yes','Unapproved','$transfer')";
	$run4=mysqli_query($con,$qry4);
	$qry_hist="INSERT INTO `history`( `left_quater`, `quater_area1`, `quater_area2`, `quater_area3`, `quater_area4`, `user_id`, `status`) VALUES ('$left_quater','$area1_id','$area2_id','$area3_id','$area4_id','$user_id','Unapproved')";
	$run_history=mysqli_query($con,$qry_hist);
	if(!$run)
	{
		echo mysqli_error($con);
	}
	else
	{
		echo "<script>alert('Allotment form filled successfully')</script>";
	}
	
	
	
	
	
	
	
	
}
?>
	
	
	
	
	
