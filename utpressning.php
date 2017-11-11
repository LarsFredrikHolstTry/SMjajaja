<?php 

include('header.php');
include('left.php');
include('right.php');
include('auth.php');
include('connection/db.php');

if(isset($_REQUEST['victim'])){
    $victim = $_POST['victim'];
    
    $sql = "SELECT * FROM utpressning WHERE username LIKE '".$victim."'";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);
    
    $sql2 = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result2 = mysqli_query($con, $sql2) or die("Bad query: $sql2");
    $row2 = mysqli_fetch_assoc($result2);
    
    $sql1 = "SELECT * FROM users WHERE username LIKE '".$victim."'";
    $result1 = mysqli_query($con, $sql1) or die("Bad query: $sql1");
    $row1 = mysqli_fetch_assoc($result1);
        
    $cash_victim = $row1['money'];
    $cash_from_victim = ($cash_victim * 0.20);
    
    $utpressning_exp = rand(70, 120);
    
    $account_type = $row1['account_type'];
    
    $exp = $row2['exp'];

    $chance = rand(1,3);
    
    $victim_username = $row['username'];
    
    $utpresser = $row2['username'];
    $cash_user = $row2['money'];
    
    $utpressingtime = 120;
    $timewait = time() + $utpressingtime;
    
    $sql12 = "SELECT * from utpressning WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result12 = mysqli_query($con, $sql12);
    
    while($rows12 = mysqli_fetch_array($result12)){
        $timeleft = $rows12['utpressning1'];
        $available = $rows12['utpressning1a'];
        $last = $timeleft - time();
        
        if($available == 1){
        } elseif($victim != $victim_username){
            echo '<div id="mislykket">Brukeren finnes ikke.</div>';
        } elseif($account_type == 3){
            echo '<div id="mislykket">Du kan ikke utpresse moderator, administrator eller medhjelpere i crewet.</div>';
        } elseif($victim == $_SESSION['username']){
            echo '<div id="mislykket">Prøver du virkelig å utpresse deg selv?</div>';
        } elseif($victim == $victim_username){


            if($cash_victim == 0){
                echo '<div id="mislykket">Du klarte ikke å utpresse brukeren</div>';

                $result6 = "UPDATE utpressning SET utpressning1a='1', utpressning1='$timewait' WHERE username = '".$_SESSION['username']."' LIMIT 1";
                mysqli_query($con, $result6) or die ("Bad query: $result6");

            } elseif($chance == 1 || $chance == 2){

                $result3 = "UPDATE users SET money = ($cash_user + $cash_from_victim) WHERE username='$utpresser'";
                mysqli_query($con, $result3) or die ("Bad query: $result3");

                $result4 = "UPDATE users SET money = ($cash_victim - $cash_from_victim) WHERE username='$victim'";
                mysqli_query($con, $result4) or die ("Bad query: $result4");

                $result5 = "UPDATE users SET exp = ($exp + $utpressning_exp) WHERE username='$utpresser'";
                mysqli_query($con, $result5) or die ("Bad query: $result5");

                $result6 = "UPDATE utpressning SET utpressning1a='1', utpressning1='$timewait' WHERE username = '".$_SESSION['username']."' LIMIT 1";
                mysqli_query($con, $result6) or die ("Bad query: $result6");

                echo '<div id="velykket">Du utpresset ';
                echo "<a href=\"profil.php?username=".$victim."\" onFocus=\"if(this.blur)this.blur()\">".$victim." </a> ";
                echo ' for ';
                echo number_format($cash_from_victim, 0, '.', ' ');
                echo ',-</div>';

            } else {

                $result6 = "UPDATE utpressning SET utpressning1a='1', utpressning1='$timewait' WHERE username = '".$_SESSION['username']."' LIMIT 1";
                mysqli_query($con, $result6) or die ("Bad query: $result6");

                echo '<div id="mislykket">Du klarte ikke å utpresse ';
                echo "<a href=\"profil.php?username=".$victim."\" onFocus=\"if(this.blur)this.blur()\">".$victim." </a> ";
                echo '!</div>';
            }
        }
    }
}

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/notat.css" />
    </head>

    <body style="margin: 0 auto; width: 1000px;">
        <center>
            <form id="form1" name="form1" method="post" action="">        
                <?php
            
        $sql12 = "SELECT * FROM utpressning WHERE username = '".$_SESSION['username']."' LIMIT 1";
        $result12 = mysqli_query($con, $sql12);

        while($rows12=mysqli_fetch_array($result12)){
            $timeleft= $rows12['utpressning1'];
            $available= $rows12['utpressning1a'];
            $last = $timeleft - time();
        }
        if ($available == 1) {
                echo '<div id="mislykket">Du må vente <b><span id="countdowntimer">'.$last.'</span>s</b> før du kan utpresse igjen!</div>';
            } else {
            
        ?>
            <div id="sm-cntr">
                <li id="sm-tp-hdr">Utpressning</li>
                <img src="images/handlinger/utpressning.png">
                <li id="sm-box38">Utpress: <input type="text" name="victim" placeholder="Nick" required />
                <input class="button" type="submit" name="submit" value="Utpress!"></li>
            </div>
            
        <?php } ?>
            </form>
        </center>
    </body>
</html>

<?php
    
    $sql12 = "SELECT * FROM utpressning WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result12 = mysqli_query($con, $sql12);

    $current_time = time();

    while($rows12 = mysqli_fetch_array($result12)){
    $timeleft = $rows12['utpressning1'];
    $last = ($timeleft - $current_time);
}

if($last <= 0){
    $result = mysqli_query($con, "UPDATE utpressning SET utpressning1a='0', utpressning1='0' WHERE username = '".$_SESSION['username']."' LIMIT 1") or die (mysqli_error($con));
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

<script type="text/javascript">
    var timeleft = <?php echo $last ?>;
    var downloadTimer = setInterval(function(){
        timeleft--;
        document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft <= 0)
        window.location.href = "utpressning.php";
    },1000);
</script>