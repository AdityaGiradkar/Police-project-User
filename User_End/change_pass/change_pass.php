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

    <!--global css-->
    <link rel="stylesheet" href="../user.css">
    
    <!--inline css-->
    <link rel="stylesheet" href="change_pass.css">


    <title>Password change</title>

    <!--fontawsome link-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js//all.js"></script>

</head>


<body>
    <?php include("../sidebar-over.php")?>

    <!--main body-->
    <div class="main">
        <div class="sticky">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>
        </div>

        <div class="container pass">
            <h2 class="form-heading" style="text-align: center; padding-bottom: 4%">Password update</h2>
            <hr>
            <form action="change_pass.php" id="form-action" method="post" onsubmit="return validate()">
                <div class="form-group">
                    <label for="currentPass">Current Password</label>
                    <input type="password" class="form-control conf" id="currentPass">
                </div>

                <div class="form-group">
                    <label for="newPass">New Password</label>
                    <input type="password" class="form-control conf" id="newPass">
                </div>

                <div class="form-group">
                    <label for="confPass">Conform Password</label>
                    <input type="password" class="form-control conf" id="confPass">
                </div>

                <div style="text-align: center">
                    <input class="btn btn-primary active" type="submit" id="sub" name="submit" value="submit">
                    <a class="btn btn-danger active" style="margin-left: 25%;" type="submit" id="cancel" href="../profile/profile.php" name="cancel" onclick="return cancelFun()">Cancel</a>
                </div>




            </form>


        </div>

    </div>


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
