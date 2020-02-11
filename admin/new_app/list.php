<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">


    <!--External css-->
    <link rel="stylesheet" href="list_style.css">


    <!--global css-->
    <link rel="stylesheet" href="../user.css">


    <title>List</title>

    <!--fontawsome link-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js//all.js"></script>

    <!--icon on the URL-->
    <link rel="icon" href="../images/icon.ico">
</head>


<body>
    <?php session_start();
	include("../sidebar-over.php");
	include("../../db.php");
	$postid=$_SESSION['post_id'];
	$qry="SELECT * FROM `applicant` ORDER BY `time` DESC ";//fetch applicants whose not approved by a1
	$run=mysqli_query($con,$qry);
	$rows=mysqli_num_rows($run);
    //echo $rows;
    //$arr=array();
    //$arr1=array();//array of areas?>


    <div id="main">

        <!--<span style="font-size:30px;cursor:pointer" onclick="openNav()" id="main-content">&#9776; open</span>-->

        <div class="whole">

            <div class="list-group">
                <div class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">New Application form</h5>
                    </div>
                </div>
                <?php
            while($row=mysqli_fetch_assoc($run))

            {    
                //print_r($row);
                $applicant=$row['id'];
                $query="SELECT * FROM `remarks` WHERE `applicant_id`='$applicant' ";//if remark is present then don't show
                $run9=mysqli_query($con,$query);
                $row_count=mysqli_num_rows($run9);

                if($row_count==$postid-1)//if remark is given by all other lower post members
                { 
                $id=$row['user_id'];
                $qry1="SELECT * FROM `users` WHERE `id`='$id'";//fetch user info
                $run1=mysqli_query($con,$qry1);
                $row1=mysqli_fetch_assoc($run1);
                $firstname=$row1['user_firstname'];
                $lastname=$row1['user_lastname'];
                $cityid=$row1['city_id'];
                $qry2="SELECT * FROM `cities` WHERE `city_id`='$cityid'";//fetch current city  info
                $run2=mysqli_query($con,$qry2);
                $row2=mysqli_fetch_assoc($run2);
                $city=$row2['name'];
                $areaid1=$row['area_id1'];
                $areaid2=$row['area_id2'];
                $areaid3=$row['area_id3'];
                $areaid4=$row['area_id4'];
                //$arr=array($areaid1,$areaid2,$areaid3,$areaid4);

                $qry3="SELECT * FROM `area` WHERE `area_id`='$areaid1'";
                    $run3=mysqli_query($con,$qry3);
                $row3=mysqli_fetch_assoc($run3);
                $area1=$row3['name'];
                $qry4="SELECT * FROM `area` WHERE `area_id`='$areaid2'";
                    $run4=mysqli_query($con,$qry4);
                $row4=mysqli_fetch_assoc($run4);
                $area2=$row4['name'];
                $qry5="SELECT * FROM `area` WHERE `area_id`='$areaid3'";
                    $run5=mysqli_query($con,$qry5);
                $row5=mysqli_fetch_assoc($run5);
                $area3=$row5['name'];
                $qry6="SELECT * FROM `area` WHERE `area_id`='$areaid4'";
                    $run6=mysqli_query($con,$qry6);
                $row6=mysqli_fetch_assoc($run6);
                $area4=$row6['name'];

                $qry7="SELECT * FROM `area` WHERE `area_id`='$areaid1'";
                    $run7=mysqli_query($con,$qry7);
                $row7=mysqli_fetch_assoc($run7);
                $applycity=$row7['city_id'];
                $qry8="SELECT * FROM `cities` WHERE `city_id`='$applycity'";//fetch current city  info
                $run8=mysqli_query($con,$qry8);
                $row8=mysqli_fetch_assoc($run8);
                $apply_city=$row8['name'];

                ?>






                <a href="new.php?user_id=<?php echo $id ;?>&city=<?php echo $apply_city ?>&applicant=<?php echo $applicant; ?>" class="list-group-item list-group-item-action flex-column align-items-start zoom">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1"><b><?php echo $firstname." ".$lastname ?></b></h6>
                        <small class="text-muted">1 days ago</small>
                    </div>

                    <p class="mb-1">Current allotment <?php echo $city ?> | Applying for <?php echo $apply_city; ?></p>
                    <small class="text-muted"><?php echo $area1." " .$area2." ".$area3. " ".$area4; ?></small>
                </a>

           

    <?php 
		}

	}
	?>
            </div>
            </div>

    </div>

    <script>
        document.getElementById("nav-new").classList.add("current");

    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!--gobal js file link-->
    <script src="../user.js"></script>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>
