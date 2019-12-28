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

    <!--fontawsome link-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js//all.js"></script>
</head>

<body>
    <!--sidebar-->
    <?php include("../sidebar.php")?>

    <!--profile division-->
    <div id="main">

        <span style="font-size:30px;cursor:pointer" onclick="openNav()" id="main-content">&#9776; open</span>

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
                                <center>
                                    <h1><?php echo $_SESSION['firstname']." ".$_SESSION['lastname'] ?></h1>
                                </center>
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
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!--gobal js file link-->
    <script src="../user.js"></script>


    <!--external js file link-->
    <script src="profile.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
<?php } ?>
