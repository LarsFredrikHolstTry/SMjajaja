<?php
    //Inkluderer DB
    include("auth.php");

    /*Går gjennom brukeren sin database og legger i row, hent ved 
    *   $xp = $row['exp']; 
    * xp er variabelnavnet du finner på og exp er navnet fra databasen.
    */
    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    $xp = $row['exp'];
    $rank = $row['rank'];
    $username = $row['username'];

    $rank_array[0]   = "Giovane D'honore";
    $exp_from[0]     = 0;
    $exp_to[0]       = 1000;

    $rank_array[1]   = "Guerilla";
    $exp_from[1]     = 1001;
    $exp_to[1]       = 10000;

    $rank_array[2]   = "Mole";
    $exp_from[2]     = 10001;
    $exp_to[2]       = 25000;

    $rank_array[3]   = "Sgarrosta";
    $exp_from[3]     = 25001;
    $exp_to[3]       = 75000;

    $rank_array[4]   = "Executioner";
    $exp_from[4]     = 75001;
    $exp_to[4]       = 100000;

    $rank_array[5]   = "Capo Decima";
    $exp_from[5]     = 100001;
    $exp_to[5]       = 125000;

    $rank_array[6]   = "Capo Bastone";
    $exp_from[6]     = 125001;
    $exp_to[6]       = 175000;

    $rank_array[7]   = "Capo Crimini";
    $exp_from[7]     = 175001;
    $exp_to[7]       = 225000;

    $rank_array[8]   = "Underboss";
    $exp_from[8]     = 225001;
    $exp_to[8]       = 350000;

    $rank_array[9]   = "Mafia Boss";
    $exp_from[9]     = 350001;
    $exp_to[9]       = INF;

if($rank < 9) {
    $rankplusen = ($rank + 1);
    $percent4 = ($exp_from[$rankplusen] - $xp);
    $percent5 = ($exp_to[$rank] - $exp_from[$rank]);
    $percent6 = ($percent4 / $percent5) * 100;
    $percent7 = (100 - $percent6);
} elseif($rank > 9) {

}

    //De forskjellige rank upsene, må endre i database
    if($xp > $exp_from[0] && $xp < $exp_to[0]){
        $sql = "UPDATE users SET rank ='0' WHERE username='".$_SESSION['username']."' LIMIT 1";
        mysqli_query($con, $sql);
    }
    elseif($xp > $exp_from[1] && $xp < $exp_to[1]){
        $sql = "UPDATE users SET rank='1' WHERE username='".$_SESSION['username']."' LIMIT 1";
        mysqli_query($con, $sql);
    }
    elseif($xp > $exp_from[2] && $xp < $exp_to[2]){
        $sql = "UPDATE users SET rank='2' WHERE username='".$_SESSION['username']."' LIMIT 1";
        mysqli_query($con, $sql);
    }
    elseif($xp > $exp_from[3] && $xp < $exp_to[3]){
        $sql = "UPDATE users SET rank='3' WHERE username='".$_SESSION['username']."' LIMIT 1";
        mysqli_query($con, $sql);
    }
    elseif($xp > $exp_from[4] && $xp < $exp_to[4]){
        $sql = "UPDATE users SET rank='4' WHERE username='".$_SESSION['username']."' LIMIT 1";
        mysqli_query($con, $sql);
    }
    elseif($xp > $exp_from[5] && $xp < $exp_to[5]){
        $sql = "UPDATE users SET rank='5' WHERE username='".$_SESSION['username']."' LIMIT 1";
        mysqli_query($con, $sql);
    }
    elseif($xp > $exp_from[6] && $xp < $exp_to[6]){
        $sql = "UPDATE users SET rank='6' WHERE username='".$_SESSION['username']."' LIMIT 1";
        mysqli_query($con, $sql);
    }
    elseif($xp > $exp_from[7] && $xp < $exp_to[7]){
        $sql = "UPDATE users SET rank='7' WHERE username='".$_SESSION['username']."' LIMIT 1";
        mysqli_query($con, $sql);
    }
    elseif($xp > $exp_from[8] && $xp < $exp_to[8]){
        $sql = "UPDATE users SET rank='8' WHERE username='".$_SESSION['username']."' LIMIT 1";
        mysqli_query($con, $sql);
    }
    elseif($xp > $exp_from[9] && $xp < $exp_to[9]){
        $sql = "UPDATE users SET rank='9' WHERE username='".$_SESSION['username']."' LIMIT 1";
        mysqli_query($con, $sql);
    }




?>