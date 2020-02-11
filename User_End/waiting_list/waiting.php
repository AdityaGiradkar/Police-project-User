<?php session_start(); ?>
<?php include("../../db.php");
if(isset($_SESSION['user_id'])){
?>
<! DOCTYPE HTML>
    <html lang="en">
		<?php
$arr=array();
									$arr1=array();
									if(isset($_GET['city'])){
										$city=$_GET['city'];
										$query="SELECT * FROM `cities` WHERE `name`='$city'";
										$run=mysqli_query($con,$query);
										$row1=mysqli_fetch_assoc($run);
										$id=$row1['city_id'];
										//echo $id;
										$qry="SELECT * FROM `area` WHERE `city_id`='$id'";
										$run1=mysqli_query($con,$qry);
										while($row=mysqli_fetch_array($run1)){
											$arr[]=$row['area_id'];
											
												//fetch all the area ids of the corresponding cities
										}
									//print_r($arr);
									}
		?>
    <head>
        <title>Waiting List</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


        <!--External css-->
        <link rel="stylesheet" href="waiting_style.css">

        <!--global css-->
        <link rel="stylesheet" href="../user.css">

        <!--fontawsome link-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js//all.js"></script>
    </head>

    <body>
        <!--sidebar-->
        <?php include("../sidebar-over.php")?>
		
		

        <!--Main body-->
        <div id="main">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()" id="main-content">&#9776; open</span>

            <br>
            <h2 class="form-heading" style="text-align: center; padding-bottom: 3%">Waiting List</h2>
                <hr>
            <div style="text-align: center">Enter City name</div>

            <!-- Main body -->
            <div class="container">
				
                <table class="table">
                    <li class="list-group-item d-flex justify-content-between align-items-center top">
                        <form class="form-inline my-2 my-lg-0">
                            <div class="input-group">
							<?php
								$qry="SELECT * FROM `cities`";
								$result=mysqli_query($con,$qry);
								?>
								
                                <select class="custom-select" id="selectCity" aria-label="Example select with button addon" onchange="showQuarter(value)">
									 <option value="0">City</option>
									<?php
									while($row=mysqli_fetch_assoc($result))
									{ 
										if(isset($_GET['city'])){
                       
									?>
                                   
                                    <option value="<?php echo $row['name']; ?>" <?php if($_GET['city']==$row['name']){ ?>  selected <?php } ?>><?php echo $row['name'] ; ?></option>
									<?php  } else
									{ 
									?>
						
								<option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
								<?php		}
											} 
                                   
									
									?>
                                </select>

                            </div>
                        </form>
                    </li>
                </table>
                <div <?php  if(isset($_GET['city'])) { ?> style="display:block ;"  <?php } else { ?> style="display:none;" <?php } ?> id="quarter">
                    <table class="table">
                        <li class="list-group-item d-flex justify-content-between align-items-center top">
                            <form class="form-inline my-2 my-lg-0" action="" method="post" enctype=multipart/form-datat>
								<?php
								for($i=0;$i<count($arr);$i++)
								{
									$area=$arr[$i];
									$qry="SELECT * FROM `quaters` WHERE `area_id`='$area'";
									$result=mysqli_query($con,$qry);
									while($row=mysqli_fetch_assoc($result)){//array of quaters
									//$quatername=$row['name'];
									$arr1[]=$row;
									}
								}
								//print_r($arr1);
								?>
                                <div class="input-group">
                                    <select class="custom-select" id="selectQuater" name="quater" aria-label="Example select with button addon">
										<option value="0">Select Quater</option>
                                       <?php
								for($i=0;$i<count($arr1);$i++)
								{ ?>
                                        <option value="<?php echo $arr1[$i]['name']; ?>"><?php echo $arr1[$i]['name']; ?></option>
                                    <?php } ?>     
                                    </select>

                                </div>
                                <div class="input-group">
                                    <select class="custom-select" name="post" id="selectPost" aria-label="Example select with button addon">
										<option value="0">Select Post</option>
                                        <?php
										$qry="SELECT * FROM `post`";
										$run=mysqli_query($con,$qry);
										while($row=mysqli_fetch_assoc($run))
										{
										?>
                                        <option value="<?php echo $row['post'] ?>"><?php echo $row['post'] ?></option>
                                        <?php }
										?>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" name="submit" type="submit" value="submit">Search</button>
                                    </div>
                                </div>

                            </form>

                        </li>
                    </table>
					<div class="table-responsive-lg">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">SrNo.</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">Post</th>
                                   
                                    <th scope="col">Available Flats</th>
                                    <th scope="col">Quater Name</th>
                                    <th scope="col">waitingList</th>
                                </tr>
                            </thead>

                            <tbody>
					<?php
					if(isset($_POST['submit']))
					{
						$quater=$_POST['quater'];
						$post=$_POST['post'];
						//echo $quater;
						//echo $post;
						if($quater!='0' AND $post=='0')
						{
							$qry="SELECT * FROM `quaters` WHERE `name`='$quater'";
							$run=mysqli_query($con,$qry);
							$row=mysqli_fetch_assoc($run);
							$name=$row['name'];
							$flats=$row['flats_available'];
							$waiting=$row['waiting_count'];
							$area=$row['area_id'];
							$post=$row['post_id'];
							$qry="SELECT * FROM `area` WHERE `area_id`='$area'";
							$run=mysqli_query($con,$qry);
							$row1=mysqli_fetch_assoc($run);
							$area_name=$row1['name'];//area name
							$qry1="SELECT * FROM `post` WHERE `post_id`='$post'";
							$run1=mysqli_query($con,$qry1);
							$row1=mysqli_fetch_assoc($run1);
							$post_name=$row1['post'];//post name
							?>
							 <tr>
                                    <th scope="row">1</th>
                                    <td><?php echo $area_name; ?></td>
                                    <td><?php echo $post_name; ?></td>
                                  
                                    <td><?php echo $flats; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $waiting; ?></td>
                                </tr>
						<?php	
							
							
						}
						if($quater=='0'  AND $post!='0')
						{
							$qry="SELECT * FROM `post` WHERE `post`='$post'";
							$run=mysqli_query($con,$qry);
							$row=mysqli_fetch_assoc($run);
							$post_id=$row['post_id'];
							//print_r($arr1);
							for($i=0;$i<count($arr1);$i++)
							{
								if($arr1[$i]['post_id']==$post_id)
								{
									$area_id=$arr1[$i]['area_id'];
									$qry="SELECT * FROM `area` WHERE `area_id`='$area_id'";
								$run=mysqli_query($con,$qry);
								$row1=mysqli_fetch_assoc($run);
								$area_name=$row1['name'];//area name
								$flats=$arr1[$i]['flats_available'];
									$name=$arr1[$i]['name'];
									$waiting=$arr1[$i]['waiting_count'];
									?>
									 <tr>
                                    <th scope="row">1</th>
                                    <td><?php echo $area_name; ?></td>
                                    <td><?php echo $post; ?></td>
                                  
                                    <td><?php echo	$flats ; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $waiting; ?></td>
                                </tr>
								<?php
									
								}
							}
						}
						
						if($quater!='0'  AND $post!='0')
						{
							$qry="SELECT * FROM `post` WHERE `post`='$post'";
							$run=mysqli_query($con,$qry);
							$row=mysqli_fetch_assoc($run);
							$post_id=$row['post_id'];
							$qry1="SELECT * FROM `quaters` WHERE `post_id`='$post_id' AND `name`='$quater'";//satisfying both criteria
							$run1=mysqli_query($con,$qry1);
							$row1=mysqli_fetch_assoc($run1);
							$flats=$row1['flats_available'];
							$name=$row1['name'];
							$waiting=$row1['waiting_count'];
							$area=$row1['area_id'];
							$post=$row1['post_id'];
							$qry2="SELECT * FROM `area` WHERE `area_id`='$area'";
							$run2=mysqli_query($con,$qry2);
							$row2=mysqli_fetch_assoc($run2);
							$area_name=$row2['name'];//area name
							$qry3="SELECT * FROM `post` WHERE `post_id`='$post'";
							$run3=mysqli_query($con,$qry3);
							$row3=mysqli_fetch_assoc($run3);
							$post_name=$row3['post'];//post name
							?>
							 <tr>
                                    <th scope="row">1</th>
                                    <td><?php echo $area_name; ?></td>
                                    <td><?php echo $post_name; ?></td>
                                  
                                    <td><?php echo	$flats ; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $waiting; ?></td>
                                </tr>
							<?php 
						
					
					}
								
								}
							
							
						
						?>
                    
                               
                               
                              

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!--Jquery cdn-->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

        <!--global js file link-->
        <script src="../user.js"></script>

        <!--External js-->
        <script src="wating_list.js"></script>


        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

    </html>
<?php }
else
	echo "<script>alert('Please login')</script>";
?>


