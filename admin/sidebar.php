<div id="mySidenav" class="list-group sidenav green borderXwidth">
    <ul class="side">
        <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fas fa-chevron-circle-left fa-1x"></i></a></li>

        <li><a href="../profile/profile.php"><img class="sidenav-profile" src="../images/profile.jpg" alt="profile image"></a></li>
        <br>
        <li><a class="sidenav-list" href="../new_app/new.php">New Application&nbsp;<sup class="nubers" style="color:orange; opacity:1;">23</sup></a></li>
        <li><a class="sidenav-list" href="../remarked_app/remarked.php">Remarked Application</a></li>
        <li><a class="sidenav-list" href="../tracking/track.php">Application Status</a></li>

        <li>
            <a class="sidenav-list" href="#historySubmenu" data-toggle="collapse">History&nbsp;<i class="fas fa-chevron-down" style="margin-left: 100px;"></i></a>
            <ul class="collapse list-unstyled" id="historySubmenu">
                <li>
                    <a class="sidenav-list sub" href="#">Approved Application</a>
                </li>
                <li>
                    <a class="sidenav-list sub" href="#">Declined Application</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="sidenav-list" href="../add_quater/form.php">Add Quater</a>
        </li>

        <li>
            <a class="sidenav-list" href="#settingSubmenu" data-toggle="collapse">Setting&nbsp;<i class="fas fa-chevron-down" style="margin-left: 100px;"></i></a>
            <ul class="collapse list-unstyled" id="settingSubmenu">
                <li>
                    <a class="sidenav-list sub" href="../change_pass/change_pass.php">Change Password</a>
                </li>
                <li>
                    <a class="sidenav-list sub" href="../change_info/change_info.php">Personal info</a>
                </li>
            </ul>
        </li>

        <li><a class="sidenav-list" href="mailto:adityagiradkar11@gmail.com">Contact</a></li>
        <li><a class="sidenav-list" href="#">Logout</a></li>
    </ul>
</div>

<!--navgation bar-->
<div id="navbar-custom">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">Hidden brand</a>
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
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>