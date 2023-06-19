<?php
        echo '
        <div class="container-fluid bg-info">
            <div class="row">
                <div class="col p-0 m-0">
                    <div style="width: 55px" class="items-align-center">
                        <a href="menu' . $_SESSION["user"] . '.php" class="btn btn-dark shadow d-flex justify-content-center rounded-0">
                            <img src="https://cdn-icons-png.flaticon.com/128/1946/1946488.png" cover alt="Home" width="40" height="40">
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown p-2 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                            ' . $_SESSION["login"] . '
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="index.php">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        ';
?>