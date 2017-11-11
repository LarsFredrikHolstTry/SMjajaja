<?php 

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

$tingprisarray[0] = 8900;
$tingprisarray[1] = 5600;
$tingprisarray[2] = 6400;
$tingprisarray[3] = 3500;
        
//////////////////////////////////////////////////////
//       ARRAY FOR DET SORTE MARKEDET SLUTT         //
//////////////////////////////////////////////////////
        
if (isset($_POST['pass'])){
    $pass = $_POST['pass'];
    
    if($eiendel1 == 1) {
        echo '<div id="mislykket">Du  har allerede et '.$tingarray[0].'</div>';
    } elseif($penger > $tingprisarray[0]) {
        echo '<div id="velykket">Du kjøpte et '.$tingarray[0].', du kan nå reise på <a href="reise.php">flyplassen</a></div>';
        $betal = "UPDATE users SET money = ($penger - $tingprisarray[0]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $ting = "UPDATE eiendel SET eiendel1 = '1' WHERE username='$username'";
        mysqli_query($con, $ting) or die("Bad query: $ting");
    } else {
        echo '<div id="mislykket">Du har ikke råd til '.$tingarray[0].'</div>';
    }
}

if (isset($_POST['visum'])){
    $visum = $_POST['visum'];
    
    if($eiendel2 == 1) {
        echo '<div id="mislykket">Du  har allerede et '.$tingarray[1].'</div>';
    } elseif($penger > $tingprisarray[1]) {
        echo '<div id="velykket">Du kjøpte '.$tingarray[1].'</div>';
        $betal = "UPDATE users SET money = ($penger - $tingprisarray[1]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $ting = "UPDATE eiendel SET eiendel2 = '1' WHERE username='$username'";
        mysqli_query($con, $ting) or die("Bad query: $ting");
    } else {
        echo '<div id="mislykket">Du har ikke råd til '.$tingarray[1].'</div>';
    }
}

if (isset($_POST['dressjakke'])){
    $visum = $_POST['dressjakke'];
    
    if($eiendel3 == 1) {
        echo '<div id="mislykket">Du  har allerede en '.$tingarray[2].'</div>';
    } elseif($penger > $tingprisarray[2]) {
        echo '<div id="velykket">Du kjøpte en '.$tingarray[2].'</div>';
        $betal = "UPDATE users SET money = ($penger - $tingprisarray[2]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $ting = "UPDATE eiendel SET eiendel3 = '1' WHERE username='$username'";
        mysqli_query($con, $ting) or die("Bad query: $ting");
    } else {
        echo '<div id="mislykket">Du har ikke råd til '.$tingarray[2].'</div>';
    }
}

if (isset($_POST['dressbukse'])){
    $visum = $_POST['dressbukse'];
    
    if($eiendel4 == 1) {
        echo '<div id="mislykket">Du  har allerede en '.$tingarray[3].'</div>';
    } elseif($penger > $tingprisarray[3]) {
        echo '<div id="velykket">Du kjøpte en '.$tingarray[3].'</div>';
        $betal = "UPDATE users SET money = ($penger - $tingprisarray[3]) WHERE username='$username'";
        mysqli_query($con, $betal) or die("Bad query: $betal");
        $ting = "UPDATE eiendel SET eiendel4 = '1' WHERE username='$username'";
        mysqli_query($con, $ting) or die("Bad query: $ting");
    } else {
        echo '<div id="mislykket">Du har ikke råd til '.$tingarray[3].'</div>';
    }
}

?>