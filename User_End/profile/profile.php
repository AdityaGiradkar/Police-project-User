<?php 
session_start();?>
<?php if(isset($_SESSION['user_id'])){ ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!--link of external css-->
    <link rel="stylesheet" href="profile.css">
    
        <!--global css-->
    <link rel="stylesheet" href="../user.css">

    <!--font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap" rel="stylesheet">

    <title>Allotment</title>
</head>

<body class="profile-text">
	 <div class="d-flex" id="wrapper">
        <div class="bg-light border-right" id="sidebar-wrapper">
            <!--<div class="sidebar-heading"> </div>
            <div class="sidebar-heading"> </div>-->
            <div class="sidebar-heading" style="padding-top: 15%; padding-bottom: 5%;"><center><h3>Dashboard</h3></center></div><hr>
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
            


    <!--profile division-->
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <!--profile photo-->
                <div class="col-md-4 row-custom">
                    <img src="../images/profile.jpg" alt="profile image" class="img-fluid profile-img">
                </div>

                <!--personal info-->
                <div class="col-md-7">
                   <div class="row">
                       <div class="col-12">
                           <center><h1><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'] ?></h1></center>
                       </div>
                   </div>
                   <hr>
                   <br>
                   <br>
                    <div class="row   row-custom">
                        <div class="col-6">Name:</div>
                        <div class="col-6"><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'] ?></div>
                    </div>
                    
                    <div class="row  row-custom">
                        <div class="col-6">Age:</div>
                        <div class="col-6"><?php echo $_SESSION['age'] ?></div>
                    </div>
                    
                    <div class="row  row-custom">
                        <div class="col-6">Gender:</div>
                        <div class="col-6"><?php echo  $_SESSION['gender'] ?></div>
                    </div>
                    
                    <div class="row  row-custom">
                        <div class="col-6">Mobile no.:</div>
                        <div class="col-6"><?php echo $_SESSION['mobile_no']; ?></div>
                    </div>
                    
                    <div class="row  row-custom">
                        <div class="col-6">Department:</div>
                        <div class="col-6"><?php echo $_SESSION['post']; ?></div>
                    </div>
                    
                    <div class="row  row-custom">
                        <div class="col-6">Current posting:</div>
                        <div class="col-6"><?php echo $_SESSION['city']; ?></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>





    <!--external js file link-->
    <script src="profile.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
<?php } ?>
