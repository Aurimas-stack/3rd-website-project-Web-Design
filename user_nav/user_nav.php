<?php 
            echo "<section class='user_info flex-container'>";
                $dateNow = new DateTime(); //create newDateTime object of current time
                $creationDate = new DateTime($_SESSION['u_creation']); //create DateTime object of the user
                $dateInterval = $dateNow->diff($creationDate); //get the difference between date object's
                $dateResult; //variable to store different values
                if(($dateInterval->m) < 1) {
                    $dateResult = "It's less than 1 month old."; //echo this if the account age is < 1 month
                } else {
                    $dateResult = $dateInterval->m; //otherwise echo months
                }
                echo "<p class='loged_user'>" . "<span>" . "Username: " . "</span>". $_SESSION["u_uid"] . "." ."</p>";
                echo "<p class='loged_name'>" . "<span>" . "Your First Name: " . "</span>" . $_SESSION["u_first"] . "." ."</p>";
                echo "<p class='loged_name'>" . "<span>" . "Your Last Name: " . "</span>" . $_SESSION["u_last"] . "." ."</p>";
                echo "<p class='creation_age'>" . "<span>" . "Account age: " . "</span>". $dateResult . "</p>";
                echo '  <form class="log_out_form" action="project_form/log_out.php" method="post">
                            <button class="button" type="submit" name="submit">Logout</button>
                        </form>';          
            echo "</section>";
?>