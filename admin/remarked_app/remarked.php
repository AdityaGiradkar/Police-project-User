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


    <!--extenal css link-->
    <link rel="stylesheet" href="remarked.css">

    <!--global css-->
    <link rel="stylesheet" href="../user.css">


    <title>track</title>

    <!--fontawsome link-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js//all.js"></script>
</head>
<?php
	session_start();
				$post_id=$_SESSION['post_id'];
	include("../../db.php");
	$userid=$_GET['user_id'];
	$city=$_GET['city'];
	$applicantid=$_GET['applicant'];
	
	$qry="SELECT * FROM `users` WHERE `id`='$userid'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_fetch_assoc($run);
	$firstname=$row['user_firstname'];
	$lastname=$row['user_lastname'];
	$postid=$row['post_id'];
	$qry1="SELECT * FROM `post` WHERE `post_id`='$postid'";
	$run1=mysqli_query($con,$qry1);
	$row1=mysqli_fetch_assoc($run1);
	$post=$row1['post'];
	?>
<?php 
					if(isset($_POST['allot']) )
					{
						//echo "<script>alert('Quater alloted Successfully')</script>";
						$alloted_quater=$_POST['quater'];
						$query1="SELECT * FROM `quaters` WHERE `name`='$alloted_quater'";
						$runn=mysqli_query($con,$query1);
						$roww=mysqli_fetch_assoc($runn);
						$quater_id=$roww['id'];
						$flat=$roww['flats_available'];
						$waiting_count=$roww['waiting_count'];
						$flat=$flat-1;
						$waiting_count=$waiting_count-1;
						$room=$_POST['room'];
						
						
						$insert_query="UPDATE `applicant` SET `Status`='Approved',`alloted_quater`='$quater_id',`flat`='$room' WHERE `id`='$applicantid'";
						$run_query=mysqli_query($con,$insert_query);
						$history_query="UPDATE `history` SET `status`='Approved',`alloted_quater`='$quater_id' WHERE `applicant_id`='$applicantid'";
						$run_history=mysqli_query($con,$history_query);
						
						$quater_query="UPDATE `quaters` SET `flats_available`='$flat',`waiting_count`='$waiting_count' WHERE  `name`='$alloted_quater' ";
						$run_quater=mysqli_query($con,$quater_query);
						$delete_waiting="DELETE FROM `waiting` WHERE `applicant_id`='$applicantid'";
						$delete_apply=mysqli_query($con,$delete_waiting);
						if($run_query AND $run_history AND $run_quater AND $delete_apply )
						{
							echo "<script>alert('Quater alloted Successfully')</script>";
						}
					}
						
					
					?>

<body>
    <?php include("../sidebar-over.php")?>
    <script>
        document.getElementById("nav-remarked").classList.add("current");

    </script>

    <!--main body-->
    <div id="main">

        <div class="sticky">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>
        </div>


        <section>
            <div class="total">
                <hr>
                <h4>
                    <center>Remarked application</center>
                </h4>
                <hr>

                <div class="complete" id="printableArea">
                    <div class="upper-part">
                        <center><small>Somthing about police form</small></center>
                    </div>

                    <div class="top">
                        <p>date : 29-08-2019</p>
                        <p>Authority Designation,</p>
                        <p>Institute Name…</p>
                        <p>Institute Address…</p>
                    </div>

                    <div class="subject">
                        <p><strong>Sub : </strong> &nbsp;&nbsp;<em>Request for Govt Quarter Allocation</em></p>

                    </div>

                    <div class="main-body">
                        <p>Respected Sir,</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I am <a href="#"><strong><?php echo $firstname." ".$lastname ;?></strong></a>, <strong>Post : <?php echo $post; ?></strong> of <strong>(Department name) since 3/5/10 years</strong>. I belong to (Area name) which is my hometown city as well but my job placement is in <strong>(Job place name)</strong>. (Job place) is far away from my home and it is impossible to travel daily for (road distance) to reach my office. I am married with two kids so it is impossible for me to stay here in a rented residence with current salary.</p>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I request you to please allocate me a Government Quarter or Government Flat in <strong><?php echo $city; ?></strong>. I will be thankful to you. Furthermore, I will fulfill all the requirements for Government quarter like rent, maintenance and utility bills etc on my own.</p>
                        <p>Note : </p>

                    </div>

                    <div class="end">
                        Yours Sincerely,
                        <br><br>

                        Name…
                        <br><br>

                        Job Designation…
                        <br><br>

                        Signature…

                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Sr. No.</th>
                                <th scope="col">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php 
						$remark_query="SELECT * FROM `remarks` WHERE `applicant_id`='$applicantid' ORDER BY `post_id` ASC";
						$run=mysqli_query($con,$remark_query);
						$row_count=mysqli_num_rows($run);
						//echo $row_count.$post_id;//count if 9 number of rows are present
						while($row=mysqli_fetch_assoc($run))
						{
							$post=$row['post_id'];
							$remark=$row['remark'];
							
						?>

                            <tr>
                                <th scope="row" class="sr_no"><?php echo $post; ?>.</th>
                                <td>
                                    <h5>A<?php echo $post; ?> </h5>
                                   
                                    <p><?php echo $remark; ?></p>
                                </td>

                            </tr>
                            <?php 
						}
	?>
                        </tbody>
                    </table>
                    <div class="sign">
                        <div class="row">
                            <div class="col-md-3">
                                <center><br><br>
                                    ___________<br>
                                    <p>ABC</p>
                                </center>
                            </div>
                            <div class="col-md-3">
                                <center><br><br>
                                    ___________<br>
                                    <p>ABC</p>
                                </center>
                            </div>
                            <div class="col-md-3">
                                <center><br><br>
                                    ___________<br>
                                    <p>ABC</p>
                                </center>
                            </div>
                            <div class="col-md-3">
                                <center><br><br>
                                    ___________<br>
                                    <p>ABC</p>
                                </center>
                            </div>
                        </div>
                    </div>






                    <?php
				
				
				$qry1="SELECT * FROM `applicant` WHERE `id`='$applicantid'";
				$run1=mysqli_query($con,$qry1);
				$row=mysqli_fetch_assoc($run1);
					
				$areaid1=$row['area_id1'];
		$areaid2=$row['area_id2'];
		$areaid3=$row['area_id3'];
		$areaid4=$row['area_id4'];
					$status=$row['Status'];
					$quater_id=$row['alloted_quater'];
					$alloted_room=$row['flat'];
					if($quater_id!=0)
					{
						$allot_query="SELECT * FROM `quaters` WHERE `id`='$quater_id'";
						$allot_run=mysqli_query($con,$allot_query);
						$row_allot=mysqli_fetch_assoc($allot_run);
						$alloted_quater=$row_allot['name'];
						$area_id=$row_allot['area_id'];
						$alloted_area="SELECT * FROM `area` WHERE `area_id`='$area_id'";
						$allot_area_run=mysqli_query($con,$alloted_area);
						$area_allot=mysqli_fetch_assoc($allot_area_run);
						$area_name=$area_allot['name'];
						
					}
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
				if($post_id=='1' AND $row_count=='9')
				{
				
				
		?>
                    <hr>
                    <?php if(!isset($_POST['allot']) AND $status=="Unapproved")
		{
			?>


                    <div id="q_allot">
                        <div id="q_form" style="display:block;">
                            <h5>1. Applicant Prefrences</h5>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Prefrence 1</th>
                                        <th scope="col">Prefrence 2</th>
                                        <th scope="col">Prefrence 3</th>
                                        <th scope="col">Prefrence 4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $area1; ?></td>
                                        <td><?php echo $area2; ?></td>
                                        <td><?php echo $area3; ?></td>
                                        <td><?php echo $area4; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <form method="post" action="" enctype="multipart/form-data">
                                <h5>2. Allot Quarter</h5>
                                <div class="row">
                                    <div class="col-md-12" id="select-area">
                                        <select class="form-control" onchange="show_q(value)" name="area">
                                            <option value="">Select Area</option>
                                            <option value="<?php echo $area1; ?>" <?php if(isset($_GET['city'])) if($_GET['area']==$area1){ ?> selected <?php }  ?>><?php echo $area1; ?></option>
                                            <option value="<?php echo $area2; ?>" <?php if($_GET['area']==$area2){ ?> selected <?php } ?>><?php echo $area2; ?></option>
                                            <option value="<?php echo $area3; ?>" <?php if($_GET['area']==$area3){ ?> selected <?php } ?>><?php echo $area3; ?></option>
                                            <option value="<?php echo $area4; ?>" <?php if($_GET['area']==$area4){ ?> selected <?php } ?>><?php echo $area4; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <?php
							if(isset($_GET['area'])){
												$area_selected=$_GET['area'];
												$qry1="SELECT * FROM `area` WHERE `name`='$area_selected'";
												$run1=mysqli_query($con,$qry1);
												$row1=mysqli_fetch_assoc($run1);
												$rows=mysqli_num_rows($run1);
												echo $rows;
								$area_id9=$row1['area_id'];
												$select_quater="SELECT * FROM `quaters` WHERE `area_id`='$area_id9'";
												$select_run=mysqli_query($con,$select_quater);
							}
								?>

                                <div id="select_q" <?php if(isset($_GET['area'])) { 	?> style="display:block;" <?php  } else { ?>style="display:none;" <?php } ?>>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select class="form-control" name="quater">
                                                <option value="1">Select quater</option>
                                                <?php 
											
												
												while($select_row=mysqli_fetch_assoc($select_run))
												{
												
												
											
											?>

                                                <option value="<?php echo $select_row['name']; ?>"><?php echo $select_row['name']; ?></option>
                                                <?php
												}
												
											?>
                                            </select>
                                        </div>


                                        <div class="col-md-6">
                                            <input type="text" name="room">
                                        </div>
                                    </div>
                                </div>

                                <div class="Allot" style="padding: 5% 40%;">
                                    <input type="submit" class="btn btn-primary btn-block" name="allot" value="allot" />
                                </div>
                            </form>
                        </div>




                        <!--After allot click below div will display-->
                        <?php
									}
										if( $status=="Approved")
											{
												
						
												?>

                        <div id="selected_Q" style="display:block">
                            <h5>Alloted Quater</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Area</th>
                                        <th scope="col">Alloted Quater</th>
                                        <th scope="col">Alloted room</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $area_name; ?></td>
                                        <td><?php echo $alloted_quater; ?></td>
                                        <td><?php echo $alloted_room ;?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <?php 
				}
				}
				?>
                </div>
            </div>
            <div class="print-btn">
                <input type="button" class="btn btn-primary btn-block" onclick="printDiv('printableArea')" value="print" />
            </div>


        </section>

    </div>
<!--
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

    </script>-->

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!--gobal js file link-->
    <script src="../user.js"></script>
    <script src="remarked.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>
