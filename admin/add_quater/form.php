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
    <link rel="stylesheet" href="form.css">

    <!--global css-->
    <link rel="stylesheet" href="../user.css">


    <title>Add Quarter</title>

    <!--fontawsome link-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js//all.js"></script>
</head>


<body>
    <?php include("../sidebar.php")?>

    <!--main body-->
    <div id="main">

        <span style="font-size:30px;cursor:pointer" onclick="openNav()" id="main-content">&#9776; open</span>

        <!--form-->

        <div class="container new-quarter">
            <h2 class="form-heading" style="text-align: center; padding-bottom: 2%; padding-top: 2%;">Add New Quarter Details</h2>
                <hr>
            <form>
                <div class="form-group">
                    <label for="formGroupExampleInput">Quarter Name</label>
                    <input type="text" class="form-control" id="formGroupExampleInput">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Address</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2">
                        </div>
                    </div>
                    <div class="col-md-6">

                        <label for="inputState">City</label>
                        <select id="inputState" class="form-control">
                            <option selected></option>
                            <option>Pune</option>
                            <option>Mumbai</option>
                            <option>Nashik</option>
                        </select>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Number of flats</label>
                            <input type="number" class="form-control" id="formGroupExampleInput2">
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="formGroupExampleInput2">Warden Name</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2">
                        </div>

                    </div>

                </div>
                <div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Image</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div>
                <div>
                    <label>Information about Quarter</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                
                 <div style="text-align: center; margin-top: 1%;">
                    <input class="btn btn-primary active" type="submit" id="sub" name="submit" value="ADD">
                </div>
            </form>
        </div>



    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!--gobal js file link-->
    <script src="../user.js"></script>

    <!--external js file link-->
    <script src="allotment1.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
