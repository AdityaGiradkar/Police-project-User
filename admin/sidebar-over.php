<!-- Sidebar  -->
<nav id="sidebar">
    <div id="dismiss">
        <i class="fas fa-times fa-1x"></i>
    </div>

    <div class="sidebar-header" style="background-color: #111;">
        <h4>Hello, <?php echo $_SESSION['firstname'] ?></h4>
    </div>

    <ul class="list-unstyled components">


        <li>
            <a href="../profile/profile.php"><img class="sidenav-profile" src="../images/profile.jpg" alt="profile image"></a>
        </li>

        <li>
            <a class="sidenav-list" id="nav-new" href="../new_app/list.php">New Application</a>
        </li>
        <li>
            <a class="sidenav-list" id="nav-remarked" href="../remarked_app/list.php">Remarked Application</a>
        </li>
        
     

      
        <li>
            <a class="sidenav-list" id="nav-status" href="../tracking/list.php">Application Status</a>
        </li>
  
        <li>
            <a class="sidenav-list" href="#historySubmenu" data-toggle="collapse">History<i class="fas fa-chevron-down" style="margin-left: 100px;"></i></a>
            <ul class="collapse list-unstyled" id="historySubmenu">
                <li>
                    <a class="sidenav-list sub" id="nav-accepted" href="../history/list.php?status=approved">Accepted Application</a>
                </li>
                <li>
                    <a class="sidenav-list sub" id="nav-declined" href="../history/list.php?status=declined">Declined Application</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="sidenav-list" id="nav-add" href="../add_quater/form.php">Add Quater</a>
        </li>

        <li>
            <a class="sidenav-list" href="#settingSubmenu" data-toggle="collapse">Setting<i class="fas fa-chevron-down" style="margin-left: 100px;"></i></a>
            <ul class="collapse list-unstyled" id="settingSubmenu">
                <li>
                    <a class="sidenav-list sub" id="nav-changeP" href="../change_pass/change_pass.php">Change Password</a>
                </li>
                <li>
                    <a class="sidenav-list sub" id="nav-changeI" href="../change_info/change_info.php">Personal info</a>
                </li>
            </ul>
        </li>
        <li><a class="sidenav-list" id="nav-contact" href="mailto:adityagiradkar11@gmail.com">Contact</a></li>
        <li><a class="sidenav-list" id="nav-logout" href="../../login/logout.php">Logout</a></li>
    </ul>
</nav>


<!-- Page Content  -->
<div id="content">

    <!--navigation bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <!--main content of body-->
