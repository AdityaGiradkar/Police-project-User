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


    <!--inline css-->
    <link rel="stylesheet" href="new.css">

    <!--global css-->
    <link rel="stylesheet" href="../user.css">

    <!--text box library js file-->
    <script src="../resources/tinymce/tinymce.min.js"></script>

    <title>new</title>

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
        document.getElementById("nav-new").classList.add("current");

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
            <center>New application</center>
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
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I am <a href="#"><strong><?php echo $firstname." ".$lastname ;?></strong></a>, <strong>Post: <?php echo $post; ?></strong> of <strong>(Department name) since 3/5/10 years</strong>. I belong to (Area name) which is my hometown city as well but my job placement is in <strong>(Job place name)</strong>. (Job place) is far away from my home and it is impossible to travel daily for (road distance) to reach my office. I am married with two kids so it is impossible for me to stay here in a rented residence with current salary.</p>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I request you to please allocate me a Government Quarter or Government Flat in <strong><?php echo $city; ?> </strong>. I will be thankful to you. Furthermore, I will fulfill all the requirements for Government quarter like rent, maintenance and utility bills etc on my own.</p>
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
                                    <br>
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $remark; ?></p>
                                </td>

                            </tr>
                            <?php 
						}
	?>

                            <tr>
                                <th scope="row"><?php echo $_SESSION['post_id']?>.</th>
                                <td>
                                    <!--for remark-->
                                    <div id="remark-area" style="display:block">
                                        <!--to send text area content to the data base refer to this link "https://youtu.be/_Mr0RVmHYF0"-->
                                        <form method="post" action="" onsubmit="showTextContent()">
                                            <div>
                                                <label for="remark"><b><?php echo $_SESSION['post']?></b></label>
                                                <textarea id="remark" name="remark" style=""></textarea>

                                            </div>

                                            <input class="btn btn-primary active" type="submit" id="sub" name="submit" value="Add Remark">
                                        </form>
                                    </div>
                                    <p id="showRemark"></p>
                                </td>
                            </tr>

                        </tbody>
                    </table>


                </div>

            </div>
        </section>

        <?php 
			if(isset($_POST['submit']))
			{
				$userid=$_SESSION['user_id'];
			$remark=$_POST['remark'];
			$post=$_SESSION['post'];//set it to session user later
			$qry="SELECT * FROM `post` WHERE `post`='$post'";
			$run=mysqli_query($con,$qry);
			$row=mysqli_fetch_assoc($run);
			$postid=$row['post_id'];
			$qry1="INSERT INTO `remarks`( `post_id`,`user_id`, `applicant_id`, `remark`, `status`) VALUES ('$postid','$userid','$applicantid','$remark','Unapproved')";
				$qry2="UPDATE `applicant` SET  `Desk`='$postid' WHERE `id`='$applicantid'";
				$run2=mysqli_query($con,$qry2);
			$run1=mysqli_query($con,$qry1);
				if($run1)
				{
					echo "<script>alert('remark added successfully');
                                    window.location.replace(\"list.php\");
                          </script>";
                }
			}

        ?>
    </div>

<!--

    <script>
        function showTextContent() {
            alert("sucess");
            var remark = tinyMCE.activeEditor.getContent({format : 'raw'});
            alert(remark);
            document.getElementById("remark-area").style.display = "none";
            document.getElementById("showRemark").innerHTML = remark;


        }

    </script>-->



    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!--gobal js file link-->
    <script src="../user.js"></script>

    <!--to initiate the advance text bos js file link-->
    <script src="../resources/tinymce_init.js"></script>

    <!--js for advance text area-->



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>
