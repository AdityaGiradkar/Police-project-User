<?php
session_start();
if(isset($_SESSION['user_id']))
{
 include("../../db.php");
$user_id=$_SESSION['user_id'];
	$postid=$_SESSION['post_id'];
echo $postid;
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


    <!--temp-->
    <!-- Our Custom CSS -->
    <!--<link rel="stylesheet" href="../style3.css">-->
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!--temp-->



    <!--link of external css-->
    <link rel="stylesheet" href="allotment.css">

    <!--global css-->
    <link rel="stylesheet" href="../user.css">

    <!--font
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">
-->
    <title>Allotment</title>

    <!--fontawsome link-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js//all.js"></script>
     <link rel="icon" href="../images/icon.ico">
</head>

<body>
    <!--sidebar-->
    <?php include("../sidebar-over.php")?>
     <script>
        document.getElementById("nav-allot").classList.add("current");
    </script>
    

    <!--Form Body-->
    <div class="main">
        <div class="sticky">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>
        </div>


        <div class="container allotment">
            <form action="allotment.php" id="form-action" method="post" onsubmit="return validate()" enctype="multipart/form-data">
                <h2 class="form-heading" style="text-align: center; padding-bottom: 4%">Allotment Form</h2>
                <hr>

                <!--selection of city, after selection call function showPrefrence()-->
                <div class="form-group allot">
                    <label><b>Posting City</b></label>
                    <select class="form-control conf" name="City" id="city" onchange="showPrefrence(value)">
                        <option value="">Select</option>
                        <?php
                    echo $postid;
                    $qry="SELECT * FROM `cities` WHERE 1";
                    $run=mysqli_query($con,$qry);
                    while($row=mysqli_fetch_assoc($run)){
						if(isset($_GET['city'])){
                        ?>

                        <option value="<?php echo $row['name']; ?>" <?php if($_GET['city']==$row['name']){ ?> selected <?php } ?>><?php echo $row['name']; ?></option>
                        <?php
						}
						else{ ?>

                        <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                        <?php		}
					} 
					?>
                    </select>
                </div>
                <div <?php  if(isset($_GET['city'])) { ?> style="display:block ;" <?php } else { ?> style="display:none;" <?php } ?>id="prefrences">
                    <div class="row" style="padding-left: 5%; padding-right: 0; ">
                        <?php for($i=0;$i<4;$i++)
				{     ?> <div class="col-lg-3 col-sm-6">
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
                    <input type="file" class="form-control-file conf" name="transfer" id="OfficialLetter">
                </div>

                <div class="form-group allot">
                    <label for="Sugestion"><b>Suggestion / Additional Requirements</b></label>
                    <textarea class="form-control" id="sugestion" name="suggestion" rows="3"></textarea>
                </div>
                <div style="text-align: center">
                    <input class="btn btn-primary active" type="submit" id="sub" name="submit" value="submit">
                    <a class="btn btn-danger active" style="margin-left: 25%;" type="submit" id="cancel" href="../profile/profile.php" name="cancel" onclick="return cancelFun()">Cancel</a>
                </div>
            </form>
        </div>
    </div>


    <!--footer-->
    <footer>


    </footer>

  

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!--gobal js file link-->
    <script src="../user.js"></script>

    <!--external js file link-->
    <script src="allotment1.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

   <!-- <script type="text/javascript">
        $(document).ready(function() {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                //$('.collapse.in').toggleClass('in');
                //$('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });

    </script>-->
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
	$row4=mysqli_fetch_assoc($run4);
	
	$qry_hist="INSERT INTO `history`( `left_quater`, `quater_area1`, `quater_area2`, `quater_area3`, `quater_area4`, `user_id`, `status`) VALUES ('$left_quater','$area1_id','$area2_id','$area3_id','$area4_id','$user_id','Unapproved')";
	$run_history=mysqli_query($con,$qry_hist);
	if(!$run4)
	{
		echo mysqli_error($con);
	}
	else
	{
		echo "<script>alert('Allotment form filled successfully')</script>";
	}
	$update_waiting="SELECT * FROM `quaters` WHERE (`post_id`='$postid') AND (`area_id`='$area1_id')";
	$run_waiting=mysqli_query($con,$update_waiting);
	if($run_waiting)
	{
		echo "success";
		
	}
	else
		
		echo mysqli_error($con);
	$row_waiting=mysqli_fetch_assoc($run_waiting);
	$waiting_count=$row_waiting['waiting_count'];
	$quater_id=$row_waiting['id'];
	$waiting_count=$waiting_count+1;
	$update_waiting1="UPDATE `quaters` SET `waiting_count`='$waiting_count' WHERE `id`='$quater_id'";
	$run_waiting1=mysqli_query($con,$update_waiting1);
	$applicantid=$row4['id'];
	$waiting="INSERT INTO `waiting`(`applicant_id`, `quater_id`) VALUES ('$applicantid','$quater_id') ";
	$runw=mysqli_query($con,$waiting);
	
	
	
	
	
	
	
	
}
}
else
	echo "<script>alert('Please login')</script>";

?>
