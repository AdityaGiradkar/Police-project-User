<?php
session_start();
include("../../db.php");
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


    <!--external css-->
    <link rel="stylesheet" href="form.css">

    <!--global css-->
    <link rel="stylesheet" href="../user.css">


    <title>Add Quarter</title>

    <!--fontawsome link-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js//all.js"></script>
    
    <!--icon on the URL-->
    <link rel="icon" href="../images/icon.ico">
</head>


<body>
    <?php include("../sidebar-over.php")?>
     <script>
        document.getElementById("nav-add").classList.add("current");
    </script>

    <!--main body-->
    <div id="main">
        <div class="sticky">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>
        </div>


        <!--form-->

        <div class="container new-quarter">
            <h2 class="form-heading" style="text-align: center; padding-bottom: 2%; padding-top: 2%;">Add New Quarter Details</h2>
            <hr>
            <form method="post" enctype="multipart/form-data" action="form.php">
                <div class="form-group">
                    <label for="Q_name">Quarter Name</label>
                    <input type="text" class="form-control" id="Q_name" name="Q_name">
                </div>

                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group">
                            <label for="post">Select post</label>
                            <select id="post" name="post" class="form-control">
                                <option value="">select</option>
                                <?php 
                                    $qry_post = "SELECT * FROM `post` WHERE 1";
                                    $run_post = mysqli_query($con, $qry_post);
    
                                    while($row_post = mysqli_fetch_assoc($run_post)){
                                ?>
                                <option value="<?php echo $row_post['post_id'];?>"><?php echo $row_post['post'];?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Aval_flat">Number of flats</label>
                            <input type="number" class="form-control" id="Aval_flat" name="Aval_flat">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">

                        <label for="city">City</label>
                        <select id="city" name="city" class="form-control">
                            <option value="">Select</option>

                            <?php
                                $qry = "SELECT * FROM `cities` WHERE 1";
                                $run=mysqli_query($con,$qry);
                                //$row=mysqli_fetch_assoc($run);
                                //echo $row['name'][0];
                                while($row=mysqli_fetch_assoc($run)){
                                    //if(isset($_GET['city'])){ 
                                        ?>

                            <option value="<?php echo $row['city_id']?>"><?php echo $row['name']?></option>
                            <?php } ?>
                        </select>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="area">Area</label>
                            <input type="text" class="form-control" name="area" id="area">
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <label for="ward_name">Warden Name</label>
                    <input type="text" name="ward_name" class="form-control" id="ward_name">
                </div>


                <div>
                    <div class="form-group">
                        <label for="quarter_image">Upload Image</label>
                        <input type="file" class="form-control-file" id="quarter_image">
                    </div>
                </div>
                <div>
                    <label for="Q_info">Information about Quarter</label>
                    <textarea id="Q_info" class="form-control" rows="3" name="Q_info"></textarea>
                </div>

                <div style="text-align: center; margin-top: 1%;">
                    <input class="btn btn-primary active" type="submit" id="submit" name="submit" value="ADD">
                </div>
            </form>
        </div>



    </div>


   
  
    
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!--gobal js file link-->
    <script src="../user.js"></script>

    <!--external js file link
    <script src="allotment1.js"></script>-->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>






<?php 
    if(isset($_POST['submit'])){
        $name = $_POST['Q_name'];
        $city_id = $_POST['city'];
        $Aval_flat = $_POST['Aval_flat'];
        $area = $_POST['area'];
        $qry1 = "INSERT INTO `area`(`name`, `city_id`) VALUES ('$area','$city_id')";
        $run1 = mysqli_query($con,$qry1);
        $qry2 = "SELECT * FROM `area` WHERE `name`='$area'";
        $run2 = mysqli_query($con, $qry2);
        $result2 = mysqli_fetch_assoc($run2);
        $area_id = $result2['area_id'];
        $post_id = $_POST['post'];
        $info = $_POST['Q_info'];
        $ward_name = $_POST['ward_name'];
        
        $qry3 = "INSERT INTO `quaters`(`area_id`, `name`, `flats_available`, `post_id`, `waiting_count`, `Quater_info`) VALUES ('$area_id','$name','$Aval_flat','$post_id',0,'$info')";
        $run3 = mysqli_query($con, $qry3);
        
        $qry4 = "SELECT * FROM `quaters` WHERE `name`='$name'";
        $run4 = mysqli_query($con, $qry4);
        $result4 = mysqli_fetch_assoc($run4);
        $quarter_id = $result4['id'];
        
        $qry5 = "INSERT INTO `warden`(`quater_id`, `warden_firstname`, `warden_lastname`) VALUES ('$quarter_id','$ward_name',0)";
        $run5 = mysqli_query($con, $qry5);
        
        
        
        //$qry_quater = INSERT INTO `quaters`(`area_id`, `name`, `flats_available`, `post_id`, `waiting_count`, `Quater_info`) VALUES ([value-2],[value-3],[value-4],0,0,[value-7])
    }


?>
