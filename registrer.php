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
        
        require('connection/db.php');
        // If form submitted, insert values into the database.
        if (isset($_REQUEST['username'])){
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($con, $username); 
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($con, $email);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
            $startby = "Oslo";
            $startwpn = "Slåsshansker";
            $startcar = "Busskort";
            
            $sql = "SELECT * FROM users";
            $result_sql = mysqli_query($con, $sql) or die("Bad query: $sql");
            $row = mysqli_fetch_assoc($result_sql);
            
            $username_db = $row['username'];
            $email_db = $row['email'];
            
                if($username == $username_db) {
                    echo '<div id="mislykket">Brukernavn finnes allerede <br><a href="registrer.php">Tilbake til registrering</a></div>';
                } elseif ($email == $email_db) {
                    echo '<div id="mislykket">Emailen er allerede registrert <br><a href="registrer.php">Tilbake til registrering</a></div>';
                } else {
                    
                    

                $query = "INSERT into `users` (username, password, email, city, vapen, bil)
                VALUES ('$username', '".md5($password)."', '$email', '$startby', '$startwpn', '$startcar')";
                $result = mysqli_query($con, $query);
						
					$krim = "INSERT into `krim` (username)
                	VALUES ('$username')";
                	$result1 = mysqli_query($con, $krim);
					
					$eiendel = "INSERT into `eiendel` (username)
					VALUES ('$username')";
					$result2 = mysqli_query($con, $eiendel);

					$biltyveri = "INSERT into `biltyveri` (username)
					VALUES ('$username')";
					$result3 = mysqli_query($con, $biltyveri);

					$utpressning = "INSERT into `utpressning` (username)
					VALUES ('$username')";
					$result4 = mysqli_query($con, $utpressning);

					$firma = "INSERT into `firma` (username)
					VALUES ('$username')";
					$result5 = mysqli_query($con, $firma);
				}

                if($result){
                    echo '<div id="velykket">
                    <h3>Du ble vellykket registrert!</h3>
                    <br/>Trykk her for å logge inn: <a href="logginn.php">Logg inn</a></div>';
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
                                <span id="login_title">REGISTRER</span>
                            </div>
                            <div id="login_form">
                                <form style="padding: 0; margin: 0;" action method="post">
                                    <input type="text" class="login_field" name="username" placeholder="Brukernavn" required />
                                    <input type="password" class="login_field" name="password" placeholder="Passord" required />
                                    <input type="text" class="login_field" name="email" placeholder="Email" required />
                                    <span id="reg_text">Ved å registrere så godtar du <a id="regler" href="regler.php" target="_blank">vilkårene og betingelsene.</a></span>
                                    <input name="submit" type="submit" value="Registrer" />
                                </form>
                            </div>
                            <div id="no_user" style="padding-top: 15px;">
                                <span id="reg_text">Har du allerede en bruker?</span>
                                <a href="logginn.php" class="button">Logg inn</a>
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
        
        <?php 
            
        }
        
        ?>
        
    </body>
</html>