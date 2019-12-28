<! DOCTYPE HTML>
    <html lang="en">

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
        <?php include("../sidebar.php")?>

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

                                <select class="custom-select" id="selectCity" aria-label="Example select with button addon" onchange="showQuarter(value)">
                                    <option value="0">City</option>
                                    <option value="Pune">Pune</option>
                                    <option value="Mumbai">Mumbai</option>
                                    <option value="Nashik">Nashik</option>
                                </select>

                            </div>
                        </form>
                    </li>
                </table>
                <div style="display: none" id="quarter">
                    <table class="table">
                        <li class="list-group-item d-flex justify-content-between align-items-center top">
                            <form class="form-inline my-2 my-lg-0">

                                <div class="input-group">
                                    <select class="custom-select" id="selectQuater" aria-label="Example select with button addon">
                                        <option selected>Quarter name</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>

                                </div>
                                <div class="input-group">
                                    <select class="custom-select" id="selectPost" aria-label="Example select with button addon">
                                        <option selected>Post</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">Search</button>
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
                                    <th scope="col">Total Quarters</th>
                                    <th scope="col">Available Quarters</th>
                                    <th scope="col">Available Flats</th>
                                    <th scope="col">waitingList</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Shivaji Nagar</td>
                                    <td>PSI</td>
                                    <td>2 Quarters</td>
                                    <td>2 Quarters</td>
                                    <td>2 Flats</td>
                                    <td>2 wating</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Swargate</td>
                                    <td>S.P</td>
                                    <td>10 Quarters</td>
                                    <td>5 Quarters</td>
                                    <td>2 Flats</td>
                                    <td>2 waiting</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Bibwewadi</td>
                                    <td>D.S.P</td>
                                    <td>8 Quarters</td>
                                    <td>2 Quarters</td>
                                    <td>2 Flats</td>
                                    <td>2 waiting</td>

                                </tr>

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
