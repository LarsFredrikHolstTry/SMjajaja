<?php

require('connection/db.php');
include('connection/start.php');

?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Scandinavian Mafia - Logg Inn</title>
        <link rel="stylesheet" href="css/regoglogin.css" />
    </head>
    <body>
        
<?php
        // If form submitted, insert values into the database.
        if (isset($_POST['username'])){
            // removes backslashes
            $username = stripslashes($_REQUEST['username']);
            //escapes special characters in a string
            $username = mysqli_real_escape_string($con, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
            //Checking if user is existing in the database or not
            $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
            $result = mysqli_query($con, $query) or die (mysql_error());
            $rows = mysqli_num_rows($result);
            
            $sql = "SELECT * FROM users WHERE username='". mysqli_real_escape_string($con, $_REQUEST['username'])."'";
            $query = mysqli_query($con, $sql) or die (mysqli_error());
            $row = mysqli_fetch_assoc($query);
            
            $account_type = $row['account_type'];
            
            if ($rows==1) {
                if($account_type == 0) {
                    echo '
                    <div id="drept">
                        <img src="images/handlinger/rip.png">
                        <br>
                        <span style="color:red">
                        Du er blitt drept.<br>Trykk <a href="registrer.php">her</a> for å lage en ny bruker
                        </span>
                    </div>';
                } else {
                $_SESSION['username'] = $username;
            // Redirect user to index.php
            ?>
                <script type="text/javascript">
                    window.location.href = 'nyheter.php';
                </script>
            <?php
                }
            } else {
                echo '<div id="mislykket">
                <h3>Brukernavn/passord er feil</h3>
                <br/>Trykk her for å <a href="logginn.php">logge inn</a></div>';
            }
        } else {

            ?>
        <div id="header"></div>
        <div id="main_wrapper">
            <div id="container">
                <div id="right_wrapper">
                    <div id="login">
                        <section id="sect_login" style="display: block;">
                            <div style="text-align: center;">
                                <br>
                                <span id="login_title">LOGG INN</span>
                            </div>
                            <div id="login_form">
                                <form style="padding: 0; margin: 0;" action method="post">
                                    <input type="text" class="login_field" name="username" placeholder="Brukernavn" required />
                                    <input type="password" class="login_field" name="password" placeholder="Passord" required />
                                    <input name="submit" type="submit" value="Logg inn" />
                                </form>
                            </div>
                            <div id="no_user" style="padding-top: 15px;">
                                <span id="reg_text">Har du ikke en bruker?</span>
                                <a href="registrer.php" class="button">Registrer</a>
                            </div>
                        </section>
                    </div>
                </div>
                <div id="footer_info" style="display: block;">
                    <br>
                    <div id="title_container">
                        <span id="title_about">Om Scandinavian Mafia</span>
                    </div>
                    <p id="text_about">
                    Scandinavian Mafia er et tekstbasert mafiaspill hvor man kan gjøre kriminaliteter, stjele biler, gamble på casino og mye annet gøy! Registrer deg i dag for å kjemp om tronen som den beste mafiaen i hele skandinavia!</p><br>
                </div>
            </div>
        </div>
        <div id="footer">
            <span>
            Eies og drives av <b>Lars Fredrik Holst-Try</b> og <b>Jonas Olsen</b>
            </span>
        </div>
<?php } ?>
    </body>
</html>