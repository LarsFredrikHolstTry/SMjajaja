<?php 

include('header.php');
include('left.php');
include('right.php');


?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>

    <body style="margin: 0 auto; width: 1000px;">

    <?php

    $sql = "SELECT username FROM users WHERE DATE_SUB(NOW(),INTERVAL 5 MINUTE) <= lastactive ORDER BY id ASC"; //  Searches the database for every one who has being last active in the last 5 minute
    $query = mysqli_query($con, $sql) or die(mysqli_error());
    $count = mysqli_num_rows($query);
    $i = 1;
        
        echo "
        <center>
            <div id='sm-cntr'>
                <div id='sm-tp-hdr'>
                    <li>Spillere pålogget: ".$count."</li>
                </div>  
            </div>
        </center>";
        
        ?>
        
        <center>
            <div id="sm-boxmh2">
        <?php

        while($row = mysqli_fetch_object($query)) {
        $online_name = htmlspecialchars($row->username);
        
        echo "<a href=\"profil.php?username=".$online_name."\" onFocus=\"if(this.blur)this.blur()\">".$online_name."</a>, ";
            $i++;
        }

        ?>
                <form action="" method="post" enctype="multipart/form-data"> 
                    <li id="admin_nyhet">
                    <br><br>
                    <span style="margin: 10px; color:white;">Søk etter bruker:</span>
                    <input type="text" name="sok_bruker" id="sok_bruker" rows="1" cols="65" required/><input class="button" type="submit" name="sok" value="Søk"/>
                    </li>
                </form>
            </div>
        </center>
    </body>
</html>

<?php

include('auth.php');
require('connection/db.php'); 

if(isset($_POST['sok'])) {
    $brukernavn = $_POST['sok_bruker'];
    
    $result = mysqli_query($con, "SELECT username FROM users
    WHERE username LIKE '%$brukernavn%' ORDER BY username ASC") or die(mysqli_error());

?>

<br />

        <center>
            <div id="sm-cntr">
                <div id="sm-tp-hdr">
                    <li>Resultater for "<?php echo $brukernavn ?>":</li>
                </div>  
            </div>
            <div id='sm-cntr'>
            <div id="online2">
                  	<?php while($row = mysqli_fetch_array($result)){ ?>

                <td align="center"><?php echo "<a href=\"profil.php?username=". $row['username'] ."\" onFocus=\"if(this.blur)this.blur()\">" . $row['username'] . "</a>,"; ?></td>
                
                    <?php  } // while loop ?>
            </div>
            </div>
        </center>

<?php
    
}

?>








