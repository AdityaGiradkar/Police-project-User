<?php session_start();
if(isset($_SESSION['user_id']))
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
    
        <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">


    <!--extenal css link-->
    <link rel="stylesheet" href="remarked.css">

    <!--global css-->
    <link rel="stylesheet" href="../user.css">


    <title>track</title>

    <!--fontawsome link-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js//all.js"></script>
    
        <!--icon on the URL-->
    <link rel="icon" href="../images/icon.ico">
</head>
<?php
	include("../../db.php");
	$userid=$_GET['user_id'];
	$city=$_GET['city'];
	$applicantid=$_GET['applicant'];
	$query="SELECT * FROM `applicant` WHERE `id`='$applicantid'";
	$runn=mysqli_query($con,$query);
	$roww=mysqli_fetch_assoc($runn);
	$status=$roww['Status'];
	$alloted_room=$roww['flat'];
	if($status=="Approved"){
		$alloted=$roww['alloted_quater'];
		$allot_query="SELECT * FROM `quaters` WHERE `id`='$alloted'";//fetch the alloted quater
		$run_allot=mysqli_query($con,$allot_query);
		$rowallot=mysqli_fetch_assoc($run_allot);
		$alloted_quater=$rowallot['name'];
		$area_id=$rowallot['area_id'];
						$alloted_area="SELECT * FROM `area` WHERE `area_id`='$area_id'";
						$allot_area_run=mysqli_query($con,$alloted_area);
						$area_allot=mysqli_fetch_assoc($allot_area_run);
						$area_name=$area_allot['name'];
	}
	
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

<body>
    <?php include("../sidebar-over.php")?>

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
						while($row=mysqli_fetch_assoc($run))
						{
							$post=$row['post_id'];
							$remark=$row['remark'];
							
						?>
						
                        <tr>
                                <th scope="row"><?php echo $post; ?>.</th>
                                <td>
                                    <h5>A<?php echo $post; ?> </h5>
                                    <br>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $remark; ?></p>
                                </td>

								</tr>
	<?php
						}
							?>
						</tbody>
                    </table>
                   
				<?php
					if( isset($alloted_quater))
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
							?>

                </div>
                <div class="print-btn">
                    <input type="button" class="btn btn-primary btn-block" onclick="printDiv('printableArea')" value="print" />
                </div>
            </div>

        </section>

    </div>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }

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
<?php
}
else
	echo "<script>alert('please Login First')</script>";
?>