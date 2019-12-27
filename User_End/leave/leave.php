<?php
session_start();
if(isset($_SESSION['user_id'])){ ?>
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
    <link rel="stylesheet" href="leave.css">

    <!--global css-->
    <link rel="stylesheet" href="../user.css">

    <!--font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">

    <title>leave</title>

    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js//all.js"></script>
	    <script type="text/javascript" src="leave.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.0.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

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
        <form id="form-action" action="leave.php" method="post" enctype="multipart/form-data">
        <form id="form-action" action="leave.php" method="post" enctype="multipart/form-data">
            <h2 class="form-heading" style="text-align: center; padding-bottom: 4%">Leave Form</h2>
            <hr>

            <div class="form-group allot">
                <label for="currentPosition"><b>Current City</b></label>
                <select class="form-control" name="City" id="city" onchange="showQuarter(value)">
                    <option value=0>select</option>
                    <?php
                    include("../../db.php");
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

		
            <div class="form-group allot" <?php if(isset($_GET['city'])){ ?>style="display: block;"<?php } else { ?> style="display: none;" <?php } ?>id="quarterList">
                <label for="currentQuarter"><b>Select quarter</b></label>
                <select class="form-control" id="quater" name="quater">
					<option value=0>select</option>					
					<?php if(isset($_GET['city'])){
				$city=$_GET['city'];
				$qry="SELECT * FROM `cities` WHERE  `name`='$city'";
				$run=mysqli_query($con,$qry);
				$row=mysqli_fetch_assoc($run);
				$city_id=$row['city_id'];
				$qry1="SELECT * FROM `area` WHERE `city_id`='$city_id'";
				$run1=mysqli_query($con,$qry1);
				while($row1=mysqli_fetch_assoc($run1)){
					$area_id=$row1['area_id'];
					$qry2="SELECT * FROM `quaters` WHERE `area_id`='$area_id'";
					$run2=mysqli_query($con,$qry2);
					while($row2=mysqli_fetch_assoc($run2)){
					?>
					<option ><?php echo $row2['name']; ?></option>
			<?php }
				}
} else
{ ?>				
                    <option>Please select city first</option>
                    
            <?php } ?>       
                </select>
            </div>
		
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group allot">
                        <label for="electricityBill"><b>Paid electricity bill</b></label>
                        <input type="file" class="form-control-file" name="electricity" id="OfficialLetter" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group allot">
                        <label for="leaveLetter"><b>Leave letter</b></label>
                        <input type="file" class="form-control-file" name="leave" id="OfficialLetter" required>
                    </div>
                </div>
            </div>


            <div style="text-align: center" class="allot buttons">
                <input class="btn btn-primary active" type="submit" id="sub" name="submit" value="submit">
                <a class="btn btn-danger active" style="margin-left: 25%;" type="submit" id="cancel" href="leave.php" name="cancel">Cancel</a>
            </div>


        </form>
    </div>


<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <script src="../user.js"></script>
   
    <!--js for leave page-->
    <script src="leave1.js"></script>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
		 <?php }
else
	echo "<script>alert('please login')</script>";



		 
if(isset($_POST['submit']))
{
	$quater=$_POST['quater'];
	$user_id=$_SESSION['user_id'];
	$qry="SELECT * FROM `quaters` WHERE `name`='$quater'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_fetch_assoc($run);
	$qua_id=$row['id'];
	 $elec_bill = $_FILES['electricity']['name'];
       $elec_bill_temp   = $_FILES['electricity']['tmp_name'];
 $moved=move_uploaded_file($elec_bill_temp, "../Files/$elec_bill" );
	$leave      = $_FILES['leave']['name'];
       $leave_temp   = $_FILES['leave']['tmp_name'];
	$moved1=move_uploaded_file($leave_temp, "../Files/$leave" );
	
	if( $moved AND $moved1 ) {
  echo "Successfully uploaded";         
} else {
  echo "Not uploaded because of error #".$_FILES['electricity']['error'];
	}
	$qry2="INSERT INTO `leave_status`( `user_id`, `electricity_bill`, `transfer_letter`,  `quater_id`, `status`) VALUES ('$user_id','$elec_bill','$leave','$qua_id','Unapproved')";
	$run2=mysqli_query($con,$qry2);
	if(!$run2)
	{
		echo mysqli_error($con);
	}
	else
	{
		echo "<script>alert('Leave form filled successfully')</script>";
	}
	
}

?>