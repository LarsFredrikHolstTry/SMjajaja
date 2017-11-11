<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php include('right.php'); ?>

<html>
    <head>
        
<?php 
        
include('auth.php');
require('connection/db.php');
        
$sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result = mysqli_query($con, $sql) or die("Bad query: $sql");
$row = mysqli_fetch_assoc($result);

$username = $row['username'];
$penger = $row['money'];

//////////////////////////////////////////////////////
//        1 = TRUE            0 = FALSE             //
//  eiendel1 == 1        =       bruker har pass    //
//////////////////////////////////////////////////////

$sql = "SELECT * FROM eiendel WHERE username = '".$_SESSION['username']."' LIMIT 1";
$result = mysqli_query($con, $sql) or die("Bad query: $sql");
$row = mysqli_fetch_assoc($result);


//////////////////////////////////////////////////////
//                  HENTE EIENDELER                 //
//////////////////////////////////////////////////////

$eiendel1 = $row['eiendel1'];       // pass
$eiendel2 = $row['eiendel2'];       // visum
$eiendel3 = $row['eiendel3'];       // dressjakke
$eiendel4 = $row['eiendel4'];       // dressbukse
$eiendel5 = $row['eiendel5'];
$eiendel6 = $row['eiendel6'];
$eiendel7 = $row['eiendel7'];
$eiendel8 = $row['eiendel8'];
        
//////////////////////////////////////////////////////
//          ARRAY FOR DET SORTE MARKEDET            //
//////////////////////////////////////////////////////
        
$tingarray[0] = "pass";
$tingarray[1] = "visum";
$tingarray[2] = "dressjakke";
$tingarray[3] = "dressbukse";
        
$selgetingpris[0] = 4900;
$selgetingpris[1] = 3600;
$selgetingpris[2] = 3400;
$selgetingpris[3] = 1500;
        
//////////////////////////////////////////////////////
//       ARRAY FOR DET SORTE MARKEDET SLUTT         //
//////////////////////////////////////////////////////
        
if (isset($_POST['pass'])){
    $pass = $_POST['pass'];
    
        $selg = "UPDATE users SET money = ($penger + $selgetingpris[0]) WHERE username='$username'";
        mysqli_query($con, $selg) or die("Bad query: $selg");
        $ting = "UPDATE eiendel SET eiendel1 = '0' WHERE username='$username'";
        mysqli_query($con, $ting) or die("Bad query: $ting");
    
    if($selg) {
         echo '<div id="velykket">Du solgte '.$tingarray[0].' for ';
         echo number_format($selgetingpris[0], 0, '.', ' ');
         echo ',-</div>';
    }
}
        
if (isset($_POST['visum'])){
    $pass = $_POST['visum'];
    
        $selg = "UPDATE users SET money = ($penger + $selgetingpris[1]) WHERE username='$username'";
        mysqli_query($con, $selg) or die("Bad query: $selg");
        $ting = "UPDATE eiendel SET eiendel2 = '0' WHERE username='$username'";
        mysqli_query($con, $ting) or die("Bad query: $ting");
    
    if($selg) {
         echo '<div id="velykket">Du solgte '.$tingarray[1].' for ';
         echo number_format($selgetingpris[1], 0, '.', ' ');
         echo ',-</div>';
    }
}
        
if (isset($_POST['dressjakke'])){
    $pass = $_POST['dressjakke'];
    
        $selg = "UPDATE users SET money = ($penger + $selgetingpris[2]) WHERE username='$username'";
        mysqli_query($con, $selg) or die("Bad query: $selg");
        $ting = "UPDATE eiendel SET eiendel3 = '0' WHERE username='$username'";
        mysqli_query($con, $ting) or die("Bad query: $ting");
    
    if($selg) {
         echo '<div id="velykket">Du solgte '.$tingarray[2].' for ';
         echo number_format($selgetingpris[2], 0, '.', ' ');
         echo ',-</div>';
    }
}
        
if (isset($_POST['dressbukse'])){
    $pass = $_POST['dressbukse'];
    
        $selg = "UPDATE users SET money = ($penger + $selgetingpris[3]) WHERE username='$username'";
        mysqli_query($con, $selg) or die("Bad query: $selg");
        $ting = "UPDATE eiendel SET eiendel4 = '0' WHERE username='$username'";
        mysqli_query($con, $ting) or die("Bad query: $ting");
    
    if($selg) {
         echo '<div id="velykket">Du solgte '.$tingarray[3].' for ';
         echo number_format($selgetingpris[3], 0, '.', ' ');
         echo ',-</div>';
    }
}
        
?>
        
        <link rel="stylesheet" type="text/css" href="css/bilforhandler.css" />
    </head>

    <body style="margin: 0 auto; width: 1000px;">
    <form id="form1"method="post"> 
            <center>
                <div id="contain">
                    <li id="bildesign2">Eiendeler</li>
                </div>
                <img class="bilforhandlerimg" src="images/handlinger/eiendeler.png">
                <div class="container">
                    <?php 
                    if($eiendel1 == 1) { 
                    ?>
                    <div id="vapen">
                        <img src="images/ting/pass.png">
                        <li><?php echo number_format($selgetingpris[0], 0, '.', ' '); ?>,-</li>
                        <button name="pass" id="pass" value="pass" class="bilbtn">Selg <?php echo $tingarray[0]; ?></button>
                    </div>
                    <?php 
                    } if($eiendel2 == 1) {
                    ?>
                    <div id="vapen">
                        <img src="images/ting/visum.png">
                        <li><?php echo number_format($selgetingpris[1], 0, '.', ' '); ?>,-</li>
                        <button name="visum" id="visum" value="visum" class="bilbtn">Selg <?php echo $tingarray[1]; ?></button>
                    </div>
                    <?php 
                    } if($eiendel3 == 1) {
                    ?>
                    <div id="vapen">
                        <img src="images/ting/dressjakke.png">
                        <li><?php echo number_format($selgetingpris[2], 0, '.', ' '); ?>,-</li>
                        <button name="dressjakke" id="dressjakke" value="dressjakke" class="bilbtn">Selg <?php echo $tingarray[2]; ?></button>
                    </div>
                    <?php 
                    } if($eiendel4 == 1) {
                    ?>
                    <div id="vapen">
                        <img src="images/ting/dressbukse.png">
                        <li><?php echo number_format($selgetingpris[3], 0, '.', ' '); ?>,-</li>
                        <button name="dressbukse" id="dressbukse" value="dressbukse" class="bilbtn">Selg <?php echo $tingarray[3]; ?></button>
                    </div>
                    <?php 
                    } elseif($eiendel1 == 0 && $eiendel2 == 0 && $eiendel3 == 0 && $eiendel4 == 0) {
                        echo '<div id="mislykket">Du har ingen eiendeler. Du kan kjøpe ting på <a href="sortemarked.php">det sorte markedet</a></div>';
                    }
                    ?>
                </div>
            </center>
        </form>
    </body>
</html>



