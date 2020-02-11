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
    <link rel="stylesheet" href="track.css">

    <!--global css-->
    <link rel="stylesheet" href="../user.css">

    <!--text box library js file-->
    <script src="../resources/tinymce/tinymce.min.js"></script>


    <title>track</title>

    <!--fontawsome link-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js//all.js"></script>
    
        <!--icon on the URL-->
    <link rel="icon" href="../images/icon.ico">
</head>
<?php
	session_start();
	
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

<body>
    <?php include("../sidebar-over.php")?>
    <script>
        document.getElementById("nav-status").classList.add("current");

    </script>

    <!--main body-->
    <div id="main">
        <div class="sticky">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>
        </div>

        <hr>
        <h4>
            <center>Application Status</center>
        </h4>
        <hr>


        <section>
            <div class="total">

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
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I am <a href="#"><strong><?php echo $firstname." ".$lastname ;?></strong></a>, <strong></strong> >Post : <?php echo $post; ?> <strong>(Department name) since 3/5/10 years</strong>. I belong to (Area name) which is my hometown city as well but my job placement is in <strong>(Job place name)</strong>. (Job place) is far away from my home and it is impossible to travel daily for (road distance) to reach my office. I am married with two kids so it is impossible for me to stay here in a rented residence with current salary.</p>

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
                    <hr>
                     <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Sr. No.</th>
                                <th scope="col">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
							      <?php 
							$userid=$_SESSION['post_id'];
							
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
                                

                           

						<?php if($post==$userid)
						{
							?>
                        <button type="button" onclick="showEditor()" class="btn btn-primary btn-sm">Edit</button>
									
						<?php }
						
						?>
								
                   
					
                  
                    <!--text editor-->
                    <div id="remark-area" style="display:none;">
                        <!--to send text area content to the data base refer to this link "https://youtu.be/_Mr0RVmHYF0"-->
                        <form method="post" action="">
                            <div>
                                <label for="remark"><b>Remark</b></label>
                                <textarea id="remark" name="remark"></textarea>
                            </div>
                            <input class="btn btn-primary active" type="submit" id="sub" name="submit" value="Add Remark">
                            <button type="button" onclick="hideEditor()" class="btn btn-danger btn-sm">Cancel</button>
                        </form>
                    </div>
									</td>
						
							</tr>
							<?php
						}
							?>
								  </tbody>
						  </table>
					
							 </div>
				
                    </div>
                    <!--text editor-->
                   <?php
					if(isset($_POST['submit']))
					{
						$remark=$_POST['remark'];
						$applicantid=$_GET['applicant'];
						
						$query="UPDATE `remarks` SET `remark`='$remark' WHERE `post_id`='$userid' AND `applicant_id`='$applicantid'";
						$run=mysqli_query($con,$query);
						if($run){
							echo "<script>alert('Remark updated successfully')</script>";
						}
					
					}
					?>
                </div>
            </div>
			
                   

        </section>

    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!--gobal js file link-->
    <script src="../user.js"></script>
    
    <!--external js file-->
    <script src="track.js"></script>

    <!--to initiate the advance text bos js file link-->
    <script src="../resources/tinymce_init.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
        
          <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>
