<?php 

include('functions/bbcodes.php');
include('header.php');
include('left.php');
include('right.php'); 

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/inbox.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>

    <body style="margin: 0 auto; width: 1000px;">
        
        <?php
            
            // gjør om lest fra 0 til 1 for å markere at melding er lest
            $sql =  mysqli_query($con, "UPDATE pm SET lest = 1 WHERE sendto = '".$_SESSION['username']."'");
            
        
        ?>
        <form method="post">
            <table align="center">
                
                <td width="40" align="center"><?php 

                // small Pagination code.

                $amount = 6; // this is the amount of message you want to display on the page


                // Selete from the database we ctrated last tutorial.
                $nsql = "SELECT * FROM pm WHERE sendto='".mysqli_real_escape_string($con, $username)."' and del='1'";            
                $nres = mysqli_query($con, $nsql) or die (mysql_error());
                $totalmail = mysqli_num_rows($nres);

                if (empty($_GET['page'])){
                    $page = 1;
                } else {
                    if(is_numeric($_GET['page'])){
                        $page = $_GET['page'];
                    } else {
                        $page = 1;	
                    }
                }

                $min = $amount * ( $page - 1 );
                $max = $amount;

                if( $page > 1){
                    $previouspage = $page - 1;
                    echo "<a href=\"inbox.php?page=".$previouspage."\" onFocus=\"if(this.blur)this.blur()\">Forrige side.</a>";	
                }
                ?></td>
                
                <td width="101" align="center"><?php 

                $numofpages = ceil($totalmail / $amount); 

                // Slette alle meldingene
                if(($totalmail >= "1") and (!isset($_POST['Clean']))){ ?>
                    <input class="button" name="Clean" type="submit"  id="Clean" value="Slett alle" onFocus="if(this.blur)this.blur()"/>
                    <?php
                }

                ?></td>
                
                <td width="115" align="center">

                <?php // Sletter alle merkede meldinger
                if(($totalmail >= "1") and (!isset($_POST['Clean']))){ ?>
                    <input class="button" name="Delete" type="submit"  id="Delete" value="Slett merkede" onFocus="if(this.blur)this.blur()"/>
            <?php } ?></td>
                
            <td width="34" align="center"><span colour="#000000"><?php 

            if($page < $numofpages){ 
                $pagenext = ($page + 1); 
                echo "<a href=\"inbox.php?page=".$pagenext."\" onFocus=\"if(this.blur)this.blur()\" colour='#000000'>Neste side</a>";	
            }

            ?></span></td>
                
        </table>
            
        <?php require("_inbox.php");

        $presult = mysqli_query($con, "SELECT * FROM pm WHERE sendto='".mysqli_real_escape_string($con, $username)."' and del='1' ORDER BY id DESC LIMIT $min,$amount") or die(mysqli_error()); 

        if (!isset($_POST['Clean'])){

            if ((mysqli_num_rows($presult) == 0) and (!isset($_POST['clean']))){

                echo '<div id="velykket">Du har ingen meldinger</div>';
            } else {
            $b = 0;						
            // keeps getting the next row until there are no more to get
            while($row = mysqli_fetch_array( $presult)) {
            // Print out the contents of each row into a table

        ?>
        <center>
        <table width="600px" style="padding-top: 10px;" >

        <li id="inboxdesign">
        <t style="float: left; margin-left: 5px;"><?php

        $b = $b + 1;

        echo "Fra: <a href=\"profil.php?username=". $row['sendfrom'] ."\" onFocus=\"if(this.blur)this.blur()\">".$row['sendfrom']."</a>";

        ?></t>
        </li>
            
        <li id="inbox_tekst">
        <?php
        $row['message'] = htmlentities($row['message']);
        $row['message'] = nl2br($row['message']); 
        $row['message'] = stripslashes($row['message']);   
                    
// How to use the above function:
$bbtext = $row['message'];
$htmltext = showBBcodes($bbtext);
$formattedText = preg_replace("/(<[a-zA-Z0-9=\"\/\ ]+>)<br\ \/>/", "$1", nl2br($htmltext));
    
echo $formattedText;

?>
        </li>
            
        <li id="inboxdesign">
            <t style="float: left; margin-left: 5px;"><?php echo "<input type='checkbox' username='id[$b]' value='".$row['id']."' onFocus=\"if(this.blur)this.blur()\"/>"; ?></t>
            <t style="float: left; margin-left: 10px;"><?php echo "<a href=\"send_pm.php?username=". $row['sendfrom'] ."\" onFocus=\"if(this.blur)this.blur()\">Svar</a>"; ?></t>
            <t style="float: left; margin-left: 10px;"><?php echo "<a href=\"inbox.php?delete=". $row['id'] ."\" onFocus=\"if(this.blur)this.blur()\">Slett</a>"; ?></t>
            <t style="float: right; margin-right: 10px;">Sendt: <?php echo "".$row['time'].""; ?></t>
        </li>

        </table>
        </center>
        <?php 
        } // if inbox is empty
        } // if while
        } // if <> clean	?>
        </form>

    </body>
</html>
