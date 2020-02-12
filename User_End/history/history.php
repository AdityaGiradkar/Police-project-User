<?php 
session_start();
if(isset($_SESSION['user_id']))
{
?>
<! DOCTYPE HTML>
    <html>

    <head>
        <title>
            history
        </title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">


        <!--External css-->
        <link rel="stylesheet" href="style.css">

        <!--global css-->
        <link rel="stylesheet" href="../user.css">

        <!--font-->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">

        <!--fontawsome link-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js//all.js"></script>
	<link rel="icon" href="../images/icon.ico">   
 </head>

    <body>
        <!--sidebar-->
        <?php include("../sidebar-over.php")?>
            <script>
        document.getElementById("nav-history").classList.add("current");
    </script>


        <!--main body -->
        <div class="main">
            <div class="sticky">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
            </div>

            <h2 class="form-heading" style="text-align: center; padding-bottom: 1%; padding-top: 2%">History</h2>
            <hr>

       
            <div class="container">
                <div class="list-group heading">
                    <?php
				include("../../db.php");
				//select all the rows from history matching the user id in order of latest first
				$user_id=$_SESSION['user_id'];
				$qry="SELECT * FROM `history` WHERE `user_id`='$user_id' ORDER BY `time` DESC ";
				$run=mysqli_query($con,$qry);
				$rows=mysqli_num_rows($run);
				
				while($row=mysqli_fetch_assoc($run))
				{
					$left_quater=$row['left_quater'];
					$quater_area1=$row['quater_area1'];//fetch the name of applied quater areas
					$area_id="SELECT * FROM `area` WHERE `area_id`='$quater_area1'";
					$runn=mysqli_query($con,$area_id);
					$roww=mysqli_fetch_assoc($runn);
					$quater1name=$roww['name'];//quaterr1
					$quater_area2=$row['quater_area2'];
					$area_id="SELECT * FROM `area` WHERE `area_id`='$quater_area2'";
					$runn=mysqli_query($con,$area_id);
					$roww=mysqli_fetch_assoc($runn);
					$quater2name=$roww['name'];//quater2
					$quater_area3=$row['quater_area3'];
					$area_id="SELECT * FROM `area` WHERE `area_id`='$quater_area3'";
					$runn=mysqli_query($con,$area_id);
					$roww=mysqli_fetch_assoc($runn);
					$quater3name=$roww['name'];//quater3 name
					$quater_area4=$row['quater_area4'];
					$area_id="SELECT * FROM `area` WHERE `area_id`='$quater_area4'";
					$runn=mysqli_query($con,$area_id);
					$roww=mysqli_fetch_assoc($runn);
					$quater4name=$roww['name'];//quater4 name
					//fetch the led=ft city and the applying city
					$left_quater="SELECT * FROM `quaters` WHERE `id`='$left_quater'";
					$runq=mysqli_query($con,$left_quater);
					$row1=mysqli_fetch_assoc($runq);
					$area=$row1['area_id'];
					
					
					$fetch_city="SELECT * FROM `area` WHERE `area_id`='$area'";
					$runc=mysqli_query($con,$fetch_city);
					$row2=mysqli_fetch_assoc($runc);
					$city_id=$row2['city_id'];
					$fetch_city_name="SELECT * FROM `cities` WHERE `city_id`='$city_id'";
					$runcity=mysqli_query($con,$fetch_city_name);
					$row3=mysqli_fetch_assoc($runcity);
					$left_city=$row3['name'];//left city
					
					
					$applied_quater="SELECT * FROM `quaters` WHERE `area_id`='$quater_area1'";
					$runq=mysqli_query($con,$applied_quater);
					$row4=mysqli_fetch_assoc($runq);
					$area=$row4['area_id'];
					$fetch_city="SELECT * FROM `area` WHERE `area_id`='$area'";
					$runcc=mysqli_query($con,$fetch_city);
					$row5=mysqli_fetch_assoc($runcc);
					$city_id1=$row5['city_id'];
					$fetch_city_name="SELECT * FROM `cities` WHERE `city_id`='$city_id1'";
					$runcity1=mysqli_query($con,$fetch_city_name);
					$row6=mysqli_fetch_assoc($runcity1);
					$applied_city=$row6['name'];
					//echo $applied_city;//applied city
					$date=$row['time'];
					
					$end_date =  $date;
					date_default_timezone_set('Asia/Calcutta'); 
					$now = date('Y-m-d H:i:s');

					$diff = strtotime($now) - strtotime($end_date);
					$fullDays    = floor($diff/(60*60*24)); 
					
				
				
				
				
				?>


                    <a href="#" class="list-group-item list-group-item-action" onclick="openModal()">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class=" mb-1"><?php echo $applied_city; ?></h5>
                            <span class=" badge-primary badge-pill tablet-padding"><?php echo $fullDays."days"; ?></span>
                        </div>
                        <h5>
                            <?php if($row['status']=='Unapproved')
				{?>
                            <p class="mb-1">Your application for quarter allotment is on its way </p>
                            <?php }
				 					if($row['status']=='Approved')
										{?>
                            <p class="mb-1">Your application for quarter allotment is approved </p>
                            <?php }
				 					if($row['status']=='Rejected')
										{?>
                            <p class="mb-1">Your application for quarter allotment is rejected </p>
                            <?php 
										}
					?>
                            <small><?php echo $quater1name." ".$quater2name." ".$quater3name." ".$quater4name ?></small>



                        </h5>
                    </a>


                    <?php
			
				}
							?>
                </div>
            </div>


        </div>



        <!--pop up modal class-->
        <div id="simpleModal" class="modal">
            <div class="modal-content">
                <div>
                    <span class="closeBtn" onclick="closeModal()">&times;</span>
                </div>
                <p>Hello <?php echo $_SESSION['username']; ?></p>
                <p>Your application for quarter allotment has been submited.</p>
                <p>You are applying for the quarter of <?php echo $applied_city." "; ?>from <?php echo "  ".$left_city; ?></p>
                <p>We will notify you when your application will be approved.</p>
                <div class="row" style="text-align: center;">
                    <div class="col-lg-4 sm-12">
                        <button type="button" class="btn btn-info btn-arrow-right">Submitted</button>
                    </div>
                    <div class="col-lg-4 sm-12">
                        <button type="button" class="btn btn-info btn-arrow-right" style="background-color: white; color: black;">Processing</button>
                    </div>
                    <div class="col-lg-4 sm-12">
                        <button type="button" class="btn btn-info btn-arrow-right" style="background-color: white; color: black;">Approved</button>

                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

        <!--gobal js file link-->
        <script src="../user.js"></script>

        <!--External js-->
        <script type="text/javascript" src="function.js"></script>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    </body>

    </html>
    <?php
}
?>
