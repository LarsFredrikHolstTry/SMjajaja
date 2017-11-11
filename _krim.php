<?php 

include('auth.php');

    $sql = "SELECT * FROM krim WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $krim1_sjans = $row['krim1_sjanse'];
    $krim2_sjans = $row['krim2_sjanse'];
    $krim3_sjans = $row['krim3_sjanse'];
    $krim4_sjans = $row['krim4_sjanse'];


// KRIM 1 START
if (isset($_POST['krim1'])){
    $krim1 = $_POST['krim1'];
    
    // TILBAKEMELDINGER FOR VELYKKET KRIM
    $velykket_array1 = array(
         "Du banket livskiten ut av damen og fikk med deg ",
         "Den gamle damen ble redd og ga deg alle pengene. Du fikk med deg ",
         "Den gamle damen mistet lommeboken da hun ble redd og løp. I lommeboken lå det ");
    
    // TILBAKEMELDINGER FOR MISLYKKET KRIM
    $mislykket_array1 = array(
        "Klarer du virkelig ikke å rane en gammel dame? Patetisk.",
        "Du prøvde å rane din egen bestemor, men hun minte deg på middagen i morgen kl 18, så du ble fornøyd.",
        "Den gamle damen slo til deg og du fikk ikke med deg noen ting, bedre lykke neste gang.");
    
    $mislykket1 =       rand(0, 2);              // Random feedback til bruker ved mislykket
    $velykket1 =        rand(0, 2);              // Random feedback til bruker ved velykket
    $krim_chance =      rand(0, 100);            // random % fra 0% til 100%
    $krimtime1 =        50;                       // ventetid i sekunder
    $krim_exp =         rand(15, 40);            // random EXP (fra , til)
    $krim_money =       rand(100, 500);          // random utbetaling i KR (fra, til)
    $timewait1 =        time() + $krimtime1;
    $max_percentage =   90;                      // maks % for krim 1

    $sql2 = "SELECT * from krim WHERE username='$username'";
    $result2 = mysqli_query($con, $sql2);

    while($rows2 = mysqli_fetch_array($result2)){
        $timeleft1 = $rows2['krim1'];
        $available1 = $rows2['krim1a'];
        $last1 = $timeleft1 - time();

        if ($available1 == 1) {
            echo '<div id="ventetid">Du må vente <b><span id="countdowntimer">'.$last1.'</span>s</b> før du kan gjøre en kriminell handling igjen!</div>';

        } elseif ($krim_chance > $krim1_sjans){
            echo '<div id="ventetid"><b>Mislykket! </b> '.$mislykket_array1[$mislykket1].'</div>';
            $result = mysqli_query($con, "UPDATE krim SET krim1a='1', krim1='$timewait1' WHERE username='$username'") or die (mysqli_error($con));
            if($krim1_sjans == $max_percentage){
                
            } elseif($krim1_sjans < $max_percentage) {
                $result = mysqli_query($con, "UPDATE krim SET krim1_sjanse= ($krim1_sjans + 5) WHERE username='$username'") or die (mysqli_error($con));
            }
        } else {
            $result = mysqli_query($con, "UPDATE krim SET krim1a='1', krim1='$timewait1' WHERE username='$username'") or die (mysqli_error($con));
            $result = mysqli_query($con, "UPDATE users SET exp=exp+'$krim_exp', money=money+'$krim_money' WHERE username='$username'") or die (mysqli_error($con));
            
            if($krim1_sjans == $max_percentage){
                $result = mysqli_query($con, "UPDATE krim SET krim1_sjanse= ($krim1_sjans - 5) WHERE username='$username'") or die (mysqli_error($con));
            } elseif($krim1_sjans < $max_percentage) {
                $result = mysqli_query($con, "UPDATE krim SET krim1_sjanse= ($krim1_sjans + 5) WHERE username='$username'") or die (mysqli_error($con));
            }

            echo '<div id="velykket">';
            echo '<b>Velykket!</b> '.$velykket_array1[$velykket1].'';
            echo number_format($krim_money, 0, '.', ' ');
            echo ',-</div>';
            
        }
    }
}
// KRIM 1 SLUTT
        
// KRIM 2 START
if (isset($_POST['krim2'])){
    $krim2 = $_POST['krim2'];
    
    // TILBAKEMELDINGER FOR VELYKKET KRIM
    $velykket_array2 = array(
         "Du truet hun i kassen med pistol og fikk med deg ", 
         "Kassen var tom, men med det motet ditt så fikk du damen i kassen til å vippse deg ",
         "Det var vel ikke vanskelig? Vær så god med ");

    // TILBAKEMELDINGER FOR MISLYKKET KRIM
    $mislykket_array2 = array(
        "Du møtte dama på butikken og klarte ikke rane butikken.", 
        "De tømte kassen i går! Kloms.",
        "Du ble for redd til å rane butikken.");
    
    $mislykket2 =       rand(0, 2);              // Random feedback til bruker ved mislykket
    $velykket2 =        rand(0, 2);              // Random feedback til bruker ved velykket
    $krim_chance =      rand(0, 100);            // random % fra 0% til 100%
    $krimtime1 =        100;                     // ventetid i sekunder
    $krim_exp =         rand(45, 100);           // random EXP (fra , til)
    $krim_money =       rand(300, 1500);         // random utbetaling i KR (fra, til)
    $timewait1 =        time() + $krimtime1;
    $max_percentage =   85;                      // maks % for krim 2

    $sql2 = "SELECT * from krim WHERE username='$username'";
    $result2 = mysqli_query($con, $sql2);

    while($rows2 = mysqli_fetch_array($result2)){
        $timeleft1 = $rows2['krim1'];
        $available1 = $rows2['krim1a'];
        $last1 = $timeleft1 - time();

        if ($available1 == 1) {
            echo '<div id="ventetid">Du må vente <b><span id="countdowntimer">'.$last1.'</span>s</b> før du kan gjøre en kriminell handling igjen!</div>';

        } elseif ($krim_chance > $krim2_sjans){
            echo '<div id="ventetid"><b>Mislykket! </b> '.$mislykket_array2[$mislykket2].'</div>';
            $result = mysqli_query($con, "UPDATE krim SET krim1a='1', krim1='$timewait1' WHERE username='$username'") or die (mysqli_error($con));
            if($krim2_sjans == $max_percentage){

            } elseif($krim2_sjans < $max_percentage) {
                $result = mysqli_query($con, "UPDATE krim SET krim2_sjanse= ($krim2_sjans + 5) WHERE username='$username'") or die (mysqli_error($con));
            }
        } else {
            $result = mysqli_query($con, "UPDATE krim SET krim1a='1', krim1='$timewait1' WHERE username='$username'") or die (mysqli_error($con));
            $result = mysqli_query($con, "UPDATE users SET exp=exp+'$krim_exp', money=money+'$krim_money' WHERE username='$username'") or die (mysqli_error($con));

            if($krim2_sjans == $max_percentage){
            } elseif($krim2_sjans < $max_percentage) {
                $result = mysqli_query($con, "UPDATE krim SET krim2_sjanse= ($krim2_sjans + 5) WHERE username='$username'") or die (mysqli_error($con));
            }

            echo '<div id="velykket">';
            echo '<b>Velykket!</b> '.$velykket_array2[$velykket2].'';
            echo number_format($krim_money, 0, '.', ' ');
            echo ',-</div>';
            
        }
    }
}
// KRIM 2 SLUTT
        
// KRIM 3 START
if (isset($_POST['krim3'])){
    $krim3 = $_POST['krim3'];
    
    $velykket_array3 = array(
        "Du klarte å svindle bingoen og fikk med deg ", 
        "Mannen som jobbet på bingoen ble redd når han så deg i finlandshette, så du klarte å få med deg ",
        "Du hadde ikke trengt å skyte mannen i skranken, men du klarte hvertfall å stjele ");
    // TILBAKEMELDINGER FOR VELYKKET KRIM

    $mislykket_array3 = array(
        "Bingoen var stengt.", 
        "Bingoen hadde besøk av vekterene på galleri, du ble redd og løp hjem.",
        "Mannen bak kassen var større enn du trodde, du løp hjem tomhendt.");
    // TILBAKEMELDINGER FOR MISLYKKET KRIM
    
    $mislykket3 =       rand(0, 2);              // Random feedback til bruker ved mislykket
    $velykket3 =        rand(0, 2);              // Random feedback til bruker ved velykket
    $krim_chance =      rand(0, 100);            // random % fra 0% til 100%
    $krimtime1 =        180;                     // ventetid i sekunder
    $krim_exp =         rand(100, 200);          // random EXP (fra , til)
    $krim_money =       rand(5000, 15000);       // random utbetaling i KR (fra, til)
    $timewait1 =        time() + $krimtime1;
    $max_percentage =   80;                      // maks % for krim 2

    $sql2 = "SELECT * from krim WHERE username='$username'";
    $result2 = mysqli_query($con, $sql2);

    while($rows2 = mysqli_fetch_array($result2)){
        $timeleft1 = $rows2['krim1'];
        $available1 = $rows2['krim1a'];
        $last1 = $timeleft1 - time();

        if ($available1 == 1) {
            echo '<div id="ventetid">Du må vente <b><span id="countdowntimer">'.$last1.'</span>s</b> før du kan gjøre en kriminell handling igjen!</div>';

        } elseif ($krim_chance > $krim3_sjans){
            echo '<div id="ventetid"><b>Mislykket! </b> '.$mislykket_array3[$mislykket3].'</div>';
            $result = mysqli_query($con, "UPDATE krim SET krim1a='1', krim1='$timewait1' WHERE username='$username'") or die (mysqli_error($con));
            if($krim3_sjans == $max_percentage){

            } elseif($krim3_sjans < $max_percentage) {
                $result = mysqli_query($con, "UPDATE krim SET krim3_sjanse= ($krim3_sjans + 5) WHERE username='$username'") or die (mysqli_error($con));
            }
        } else {
            $result = mysqli_query($con, "UPDATE krim SET krim1a='1', krim1='$timewait1' WHERE username='$username'") or die (mysqli_error($con));
            $result = mysqli_query($con, "UPDATE users SET exp=exp+'$krim_exp', money=money+'$krim_money' WHERE username='$username'") or die (mysqli_error($con));

            if($krim3_sjans == $max_percentage){
            } elseif($krim3_sjans < $max_percentage) {
                $result = mysqli_query($con, "UPDATE krim SET krim3_sjanse= ($krim3_sjans + 5) WHERE username='$username'") or die (mysqli_error($con));
            }

            echo '<div id="velykket">';
            echo '<b>Velykket!</b> '.$velykket_array3[$velykket3].'';
            echo number_format($krim_money, 0, '.', ' ');
            echo ',-</div>';
            
        }
    }
}
// KRIM 3 SLUTT  
        
// KRIM 4 START
if (isset($_POST['krim4'])){
    $krim4 = $_POST['krim4'];
    
    $velykket_array4 = array(
        "Deg og ditt crew klarte å rane banken, dere fikk med dere ", 
        "Damen bak skranken ble redd og ga deg alle pengene. Du fikk med ",
        "Du hadde ikke trengt å skyte mannen i skranken, men du klarte hvertfall å stjele ");
    // TILBAKEMELDINGER FOR VELYKKET KRIM

    $mislykket_array4 = array(
        "Politiet var allerede i banken når du kom, du ble redd og gikk tomhendt hjem.", 
        "Banken hadde sluttet med penger, de var ikke villige til å gi deg bitcoins heller.",
        "DNB sine tjenester var nede, IGJEN, og fikk dermed ikke ta ut penger.");
    // TILBAKEMELDINGER FOR MISLYKKET KRIM
    
    $mislykket4 =       rand(0, 2);              // Random feedback til bruker ved mislykket
    $velykket4 =        rand(0, 2);              // Random feedback til bruker ved velykket
    $krim_chance =      rand(0, 100);            // random % fra 0% til 100%
    $krimtime1 =        420;                     // ventetid i sekunder
    $krim_exp =         rand(500, 700);          // random EXP (fra , til)
    $krim_money =       rand(90000, 150000);     // random utbetaling i KR (fra, til)
    $timewait1 =        time() + $krimtime1;
    $max_percentage =   75;                      // maks % for krim 2

    $sql2 = "SELECT * from krim WHERE username='$username'";
    $result2 = mysqli_query($con, $sql2);

    while($rows2 = mysqli_fetch_array($result2)){
        $timeleft1 = $rows2['krim1'];
        $available1 = $rows2['krim1a'];
        $last1 = $timeleft1 - time();

        if ($available1 == 1) {
            echo '<div id="ventetid">Du må vente <b><span id="countdowntimer">'.$last1.'</span>s</b> før du kan gjøre en kriminell handling igjen!</div>';

        } elseif ($krim_chance > $krim4_sjans){
            echo '<div id="ventetid"><b>Mislykket! </b> '.$mislykket_array4[$mislykket4].'</div>';
            $result = mysqli_query($con, "UPDATE krim SET krim1a='1', krim1='$timewait1' WHERE username='$username'") or die (mysqli_error($con));
            if($krim4_sjans == $max_percentage){

            } elseif($krim4_sjans < $max_percentage) {
                $result = mysqli_query($con, "UPDATE krim SET krim4_sjanse= ($krim4_sjans + 5) WHERE username='$username'") or die (mysqli_error($con));
            }
        } else {
            $result = mysqli_query($con, "UPDATE krim SET krim1a='1', krim1='$timewait1' WHERE username='$username'") or die (mysqli_error($con));
            $result = mysqli_query($con, "UPDATE users SET exp=exp+'$krim_exp', money=money+'$krim_money' WHERE username='$username'") or die (mysqli_error($con));

            if($krim4_sjans == $max_percentage){
            } elseif($krim4_sjans < $max_percentage) {
                $result = mysqli_query($con, "UPDATE krim SET krim4_sjanse= ($krim4_sjans + 5) WHERE username='$username'") or die (mysqli_error($con));
            }

            echo '<div id="velykket">';
            echo '<b>Velykket!</b> '.$velykket_array4[$velykket4].'';
            echo number_format($krim_money, 0, '.', ' ');
            echo ',-</div>';
            
        }
    }
}
// KRIM 4 SLUTT  

    // sql
    $sql2 = "SELECT * from krim WHERE username='$username'";
    $result2 = mysqli_query($con, $sql2);

    $current_time = time();

    while($rows2 = mysqli_fetch_array($result2)){
    $timeleft1 = $rows2['krim1'];
    $last1 = ($timeleft1 - $current_time);
}

if($last1 <= 0){
    $result = mysqli_query($con, "UPDATE krim SET krim1a='0', krim1='0' WHERE username='$username'")
    or die (mysqli_error($con));
}

function crimemaketime($until){

   $now = time();
   $difference = $until - $now;

   $days = floor($difference/86400);
   $difference = $difference - ($days*86400);

   $hours = floor($difference/3600);
   $difference = $difference - ($hours*3600);

   $minutes = floor($difference/60);
   $difference = $difference - ($minutes*60);

   $seconds = $difference;
   $output = "$minutes Minutes and $seconds Seconds";

   return $output;
}
       
?>