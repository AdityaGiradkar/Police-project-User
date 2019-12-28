<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!--inline css-->
    <style>
        .pass {
            padding: 4% 20%;
        }

        .Box-error {
            box-shadow: inset 0 0 5px 1px red;
        }

    </style>

    <!--global css-->
    <link rel="stylesheet" href="../user.css">


    <title>Password change</title>

    <!--fontawsome link-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js//all.js"></script>
</head>


<body>
    <?php include("../sidebar.php")?>

    <!--main body-->
    <div id="main">

        <span style="font-size:30px;cursor:pointer" onclick="openNav()" id="main-content">&#9776; open</span>

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
</body>

</html>
