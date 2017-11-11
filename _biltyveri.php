      <?php 

include('auth.php');

    $sql = "SELECT * FROM biltyveri WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $biltyveri1_sjans = $row['biltyveri1_sjanse'];
    $biltyveri2_sjans = $row['biltyveri2_sjanse'];
    $biltyveri3_sjans = $row['biltyveri3_sjanse'];
    $biltyveri4_sjans = $row['biltyveri4_sjanse'];


// biltyveri 1 START
if (isset($_POST['biltyveri1'])){
    $biltyveri1 = $_POST['biltyveri1'];
    
    // TILBAKEMELDINGER FOR VELYKKET biltyveri
    $velykket_array1 = array(
         "Du stjal en sliten Ford Mondeo på åpen gate. Du solgte den på finn.no for ",
         "Du stjal en ødelagt Audi A3 på åpen gate. Du solgte den på finn.no for ",
         "Du stjal en knirkete Nissan Silvia på åpen gate. Du solgte den på finn.no for ");
    
    // TILBAKEMELDINGER FOR MISLYKKET biltyveri
    $mislykket_array1 = array(
        "Du klarte ikke å lirke opp bilen og gikk dermed tomhendt hjem.",
        "Bussen din kom og du ble mer fristende av å ta den enn å kjøre tyvegods i rushet.",
        "Bil-alarmen gikk og du løp i redsel.");
    
    $mislykket1 =       rand(0, 2);                     // Random feedback til bruker ved mislykket
    $velykket1 =        rand(0, 2);                     // Random feedback til bruker ved velykket
    $biltyveri_chance = rand(0, 100);                   // random % fra 0% til 100%
    $biltyveritime1 =   50;                              // ventetid i sekunder
    $biltyveri_exp =    rand(40, 85);                  // random EXP (fra , til)
    $biltyveri_money =  rand(4700, 25500);              // random utbetaling i KR (fra, til)
    $timewait1 =        time() + $biltyveritime1;
    $max_percentage =   70;                             // maks % for biltyveri 1

    $sql2 = "SELECT * from biltyveri WHERE username='$username'";
    $result2 = mysqli_query($con, $sql2);

    while($rows2 = mysqli_fetch_array($result2)){
        $timeleft1 = $rows2['biltyveri1'];
        $available1 = $rows2['biltyveri1a'];
        $last1 = $timeleft1 - time();

        if ($available1 == 1) {
            echo '<div id="ventetid">Du må vente <b><span id="countdowntimer">'.$last1.'</span>s</b> før du kan gjøre biltyveri handling igjen!</div>';

        } elseif ($biltyveri_chance > $biltyveri1_sjans){
            echo '<div id="ventetid"><b>Mislykket! </b> '.$mislykket_array1[$mislykket1].'</div>';
            $result = mysqli_query($con, "UPDATE biltyveri SET biltyveri1a='1', biltyveri1='$timewait1' WHERE username='$username'") or die (mysqli_error($con));
            if($biltyveri1_sjans == $max_percentage){
                
            } elseif($biltyveri1_sjans < $max_percentage) {
                $result = mysqli_query($con, "UPDATE biltyveri SET biltyveri1_sjanse= ($biltyveri1_sjans + 5) WHERE username='$username'") or die (mysqli_error($con));
            }
        } else {
            $result = mysqli_query($con, "UPDATE biltyveri SET biltyveri1a='1', biltyveri1='$timewait1' WHERE username='$username'") or die (mysqli_error($con));
            $result = mysqli_query($con, "UPDATE users SET exp=exp+'$biltyveri_exp', money=money+'$biltyveri_money' WHERE username='$username'") or die (mysqli_error($con));
            
            if($biltyveri1_sjans == $max_percentage){
            } elseif($biltyveri1_sjans < $max_percentage) {
                $result = mysqli_query($con, "UPDATE biltyveri SET biltyveri1_sjanse= ($biltyveri1_sjans + 5) WHERE username='$username'") or die (mysqli_error($con));
            }

            echo '<div id="velykket">';
            echo '<b>Velykket!</b> '.$velykket_array1[$velykket1].'';
            echo number_format($biltyveri_money, 0, '.', ' ');
            echo ',-</div>';
            
        }
    }
}
// biltyveri 1 SLUTT
        
// biltyveri 2 START
if (isset($_POST['biltyveri2'])){
    $biltyveri2 = $_POST['biltyveri2'];
    
    // TILBAKEMELDINGER FOR VELYKKET biltyveri
    $velykket_array2 = array(
         "Du fant en åpen bil og solgte deretter bilen for ", 
         "Du klarte å bryte deg inn i en bil og solgte bilen på Sphock for ",
         "Du var heldig å fant nøkklene på dekket på bilen og stakk av gårde i en Ford Focus som du solgte for ");

    // TILBAKEMELDINGER FOR MISLYKKET biltyveri
    $mislykket_array2 = array(
        "Vekteren var allerede på plass i garasjen når du kom og du stakk avgårde tomhendt.", 
        "Du fant en åpen bil men eieren så det og du stakk av.",
        "Da du kom til den private parkeringsplassen oppdaget du at det var kameraer over alt, du valgte å stikke av uten bil.");
    
    $mislykket2 =       rand(0, 2);                     // Random feedback til bruker ved mislykket
    $velykket2 =        rand(0, 2);                     // Random feedback til bruker ved velykket
    $biltyveri_chance = rand(0, 100);                   // random % fra 0% til 100%
    $biltyveritime1 =   100;                              // ventetid i sekunder
    $biltyveri_exp =    rand(100, 155);                  // random EXP (fra , til)
    $biltyveri_money =  rand(45000, 15000);                // random utbetaling i KR (fra, til)
    $timewait1 =        time() + $biltyveritime1;
    $max_percentage =   55;                             // maks % for biltyveri 2

    $sql2 = "SELECT * from biltyveri WHERE username='$username'";
    $result2 = mysqli_query($con, $sql2);

    while($rows2 = mysqli_fetch_array($result2)){
        $timeleft1 = $rows2['biltyveri1'];
        $available1 = $rows2['biltyveri1a'];
        $last1 = $timeleft1 - time();

        if ($available1 == 1) {
            echo '<div id="ventetid">Du må vente <b><span id="countdowntimer">'.$last1.'</span>s</b> før du kan gjøre en handling igjen!</div>';

        } elseif ($biltyveri_chance > $biltyveri2_sjans){
            echo '<div id="ventetid"><b>Mislykket! </b> '.$mislykket_array2[$mislykket2].'</div>';
            $result = mysqli_query($con, "UPDATE biltyveri SET biltyveri1a='1', biltyveri1='$timewait1' WHERE username='$username'") or die (mysqli_error($con));
            if($biltyveri2_sjans == $max_percentage){

            } elseif($biltyveri2_sjans < $max_percentage) {
                $result = mysqli_query($con, "UPDATE biltyveri SET biltyveri2_sjanse= ($biltyveri2_sjans + 2) WHERE username='$username'") or die (mysqli_error($con));
            }
        } else {
            $result = mysqli_query($con, "UPDATE biltyveri SET biltyveri1a='1', biltyveri1='$timewait1' WHERE username='$username'") or die (mysqli_error($con));
            $result = mysqli_query($con, "UPDATE users SET exp=exp+'$biltyveri_exp', money=money+'$biltyveri_money' WHERE username='$username'") or die (mysqli_error($con));

            if($biltyveri2_sjans == $max_percentage){
            } elseif($biltyveri2_sjans < $max_percentage) {
                $result = mysqli_query($con, "UPDATE biltyveri SET biltyveri2_sjanse= ($biltyveri2_sjans + 2) WHERE username='$username'") or die (mysqli_error($con));
            }

            echo '<div id="velykket">';
            echo '<b>Velykket!</b> '.$velykket_array2[$velykket2].'';
            echo number_format($biltyveri_money, 0, '.', ' ');
            echo ',-</div>';
            
        }
    }
}
// biltyveri 2 SLUTT
        
// biltyveri 3 START
if (isset($_POST['biltyveri3'])){
    $biltyveri3 = $_POST['biltyveri3'];
    
    $velykket_array3 = array(
        "Du brøt deg inn i bilforhandleren og stjal en Lamborghini, du solgte den til presidenten i Uganda for ", 
        "Du kom deg vellykket inn i bilforhandleren og stjalen strøken bentley, du fikk solgt den for ",
        "Smart gjort å kidnappe bilforhandleren! Du fikk med deg en splitter ny Tesla Model X som du solgte for ");
    // TILBAKEMELDINGER FOR VELYKKET biltyveri

    $mislykket_array3 = array(
        "Bilforhandleren var stengt.", 
        "Neste gang går du ikke tomhendt til bilforhandleren...",
        "Bilforhandleren hadde hagla ferdig ladd i skranken, du løp i redsel hjem.");
    // TILBAKEMELDINGER FOR MISLYKKET biltyveri
    
    $mislykket3 =       rand(0, 2);                         // Random feedback til bruker ved mislykket
    $velykket3 =        rand(0, 2);                         // Random feedback til bruker ved velykket
    $biltyveri_chance = rand(0, 100);                       // random % fra 0% til 100%
    $biltyveritime1 =   280;                                  // ventetid i sekunder
    $biltyveri_exp =    rand(150, 300);                     // random EXP (fra , til)
    $biltyveri_money =  rand(500000, 1500000);              // random utbetaling i KR (fra, til)
    $timewait1 =        time() + $biltyveritime1;
    $max_percentage =   35;                                 // maks % for biltyveri 2

    $sql2 = "SELECT * from biltyveri WHERE username='$username'";
    $result2 = mysqli_query($con, $sql2);

    while($rows2 = mysqli_fetch_array($result2)){
        $timeleft1 = $rows2['biltyveri1'];
        $available1 = $rows2['biltyveri1a'];
        $last1 = $timeleft1 - time();

        if ($available1 == 1) {
            echo '<div id="ventetid">Du må vente <b><span id="countdowntimer">'.$last1.'</span>s</b> før du kan gjøre en biltyveriinell handling igjen!</div>';

        } elseif ($biltyveri_chance > $biltyveri3_sjans){
            echo '<div id="ventetid"><b>Mislykket! </b> '.$mislykket_array3[$mislykket3].'</div>';
            $result = mysqli_query($con, "UPDATE biltyveri SET biltyveri1a='1', biltyveri1='$timewait1' WHERE username='$username'") or die (mysqli_error($con));
            if($biltyveri3_sjans == $max_percentage){

            } elseif($biltyveri3_sjans < $max_percentage) {
                $result = mysqli_query($con, "UPDATE biltyveri SET biltyveri3_sjanse= ($biltyveri3_sjans + 1) WHERE username='$username'") or die (mysqli_error($con));
            }
        } else {
            $result = mysqli_query($con, "UPDATE biltyveri SET biltyveri1a='1', biltyveri1='$timewait1' WHERE username='$username'") or die (mysqli_error($con));
            $result = mysqli_query($con, "UPDATE users SET exp=exp+'$biltyveri_exp', money=money+'$biltyveri_money' WHERE username='$username'") or die (mysqli_error($con));

            if($biltyveri3_sjans == $max_percentage){
            } elseif($biltyveri3_sjans < $max_percentage) {
                $result = mysqli_query($con, "UPDATE biltyveri SET biltyveri3_sjanse= ($biltyveri3_sjans + 1) WHERE username='$username'") or die (mysqli_error($con));
            }

            echo '<div id="velykket">';
            echo '<b>Velykket!</b> '.$velykket_array3[$velykket3].'';
            echo number_format($biltyveri_money, 0, '.', ' ');
            echo ',-</div>';
            
        }
    }
}
// biltyveri 3 SLUTT  

    // sql
    $sql2 = "SELECT * from biltyveri WHERE username='$username'";
    $result2 = mysqli_query($con, $sql2);

    $current_time = time();

    while($rows2 = mysqli_fetch_array($result2)){
    $timeleft1 = $rows2['biltyveri1'];
    $last1 = ($timeleft1 - $current_time);
}

if($last1 <= 0){
    $result = mysqli_query($con, "UPDATE biltyveri SET biltyveri1a='0', biltyveri1='0' WHERE username='$username'")
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