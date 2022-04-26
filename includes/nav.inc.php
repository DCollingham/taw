<?PHP

    function drawNav(){
        //Menu itens if a user is not logged in
        if( !isset($_SESSION['username']) ){
            echo'
            <nav class="navbar navbar-expand-lg navbar-light align-items-end p-0 py-2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item pl-4">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link px-2" href="#">Competitions</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link px-2" href="#">Gallery</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link" href="signup.php">Sign-up</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>';}

       elseif ($_SESSION["account_type"] == 'basic') {
            echo'
            <nav class="navbar navbar-expand-lg navbar-light align-items-end p-0 py-2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item pl-4">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link px-2" href="#">Competitions</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link px-2" href="#">Gallery</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link px-2" href="member.php">Membership</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link" href="includes/logout.inc.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        ';}

        elseif ($_SESSION["account_type"] == 'full') {
            echo'
            <nav class="navbar navbar-expand-lg navbar-light align-items-end p-0 py-2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item pl-4">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link px-2" href="#">Competitions</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link px-2" href="#">Gallery</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link px-2" href="member.php">Attend Event</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link" href="includes/logout.inc.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        ';
        }

        elseif ($_SESSION["account_type"] == 'admin') {
            echo'
            <nav class="navbar navbar-expand-lg navbar-light align-items-end p-0 py-2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item pl-4">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown text-align-center pl-4">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Competitions
                    </a>
                    <div class="dropdown-menu pl-1" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="create-comp.php">Create Competition</a>
                      <a class="dropdown-item" href="#">Edit Competition</a>
                      <a class="dropdown-item" href="score.php">Judge Competition</a>
                      <a class="dropdown-item" href="upload.php">Enter Competition</a>
                  </li>
                  <li class="nav-item dropdown text-align-center pl-4">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Events
                  </a>
                  <div class="dropdown-menu pl-1" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="create-comp.php">Create Event</a>
                    <a class="dropdown-item" href="#">Register members</a>
                </li>

                    <li class="nav-item pl-4">
                        <a class="nav-link px-2" href="view_member.php">Members</a>
                    </li>
                    <li class="nav-item pl-4">
                        <a class="nav-link" href="includes/logout.inc.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        ';
        }

    }
?>