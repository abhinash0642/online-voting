<?php
require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="../admin/css/input.css">
    <link rel="stylesheet" href="../admin/css/table.css">
    <link rel="stylesheet" href="elections.css">
    <link rel="stylesheet" href="../result.css">

    <title>Homepage</title>
    <style>
       a{
           all:unset;
       }
       .headersection{
           height:7rem;
       }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="main-body">
            <div class="headersection">
                <div class="logosection">
                    <a href="homepage.php">
                        <div class="logo">
                            <div class="imglogo">
                                <img src="../images/weblogo.jpg" alt="logo">
                            </div>
                            <div>
                                <div class="votetext">Vote India</div>
                                
                            </div>
                        </div>
                    </a>
                    <div class="menubar">
                    <ul class="nav-content">
                        <li class="nav-items"> <a href="upcomingelection.php">Election</a>
                        </li>
                        <li class="nav-items"><a href="resultpage.php">Results</a></li>
                        <li class="nav-items"><a href="downloads.php">Downloads</a></li>
                    </ul>
                </div>
                    <style>
                        
                    </style>
                    <div class="profile">
                        <?php
                        $vid = $_SESSION['voteruid'];
                        $command = " SELECT * FROM `voters` WHERE voterid='$vid' ";
                        $query_run = mysqli_query($con, $command);
                        $value = mysqli_fetch_assoc($query_run);
                        $votername = $value['votername'];
                        $avatar = $value['voterpic'];
                        ?>
                        <?php
                        echo '<img class="voterimg" src="../uploads/voterimg/' . $value['voterpic'] . '"  alt="Voter Avatar"/>'
                        ?>
                        <h1>
                            <?php echo "$votername" //TODO: add 3 dot icon so that user can view profile and logout
                            ?>

                        </h1>
                        <span id="togglebtn"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAAAYklEQVRIie3TMQ6AIBBE0R8Lzr6ew7MBpzBYaKUUSNxtnJfQTMEUMCDylIAVKEAG7MrcGdBuxyKKS6e4vr1kmShunWyPKN4Gs88lzjfNBH+u/9GOtWM32nEY7Vg7dqMdy5ADBdQ7vHdVEbMAAAAASUVORK5CYII="/></span>
                    </div>
                    <div id="dropdown" class="check">
                        <ul>
                            <li>
                                <a href="myprofile.php">My Profile</a>
                            </li>
                            <li name="logoutbtn">
                                <form action="voterlogout.php" method="POST">
                                    <button class="logoutbtn" type="submit" name="logoutbtn">
                                        <span class="icon">
                                            <ion-icon name="tv-outline"></ion-icon>
                                        </span>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>

                    </div>
                </div>



                
            </div>
           

                <script>
                    let toggle = document.getElementById('togglebtn');

                    console.log(toggle);
                    let navigation = document.getElementById('dropdown');

                    toggle.addEventListener("click", function() {
                        // navigation.classList.add("active");
                        let check = navigation.getAttribute('class');
                        console.log(check);

                        if (check == "check") {
                            navigation.setAttribute('class', 'active');
                        } else {

                            navigation.setAttribute('class', 'check');
                        }
                    })
                </script>
                <!-- FIXME: 

            </nav>-->