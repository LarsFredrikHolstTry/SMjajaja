<html>
    <head>
        <?php
        
        include('auth.php');

    $sql_user = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result_user = mysqli_query($con, $sql_user) or die("Bad query: $sql_user");
    $row_user = mysqli_fetch_assoc($result_user);
        
    $account_type = $row_user['account_type'];
        
//////////////////////////////////////////////////////////////////////////
//                          HENTE FRA KRIM                              //
//////////////////////////////////////////////////////////////////////////
        
    // sql
    $sql_krim = "SELECT * FROM krim WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result_krim =mysqli_query($con, $sql_krim);

    while($rows_krim = mysqli_fetch_array($result_krim)){
        $timeleft_krim = $rows_krim['krim1'];
        $available_krim = $rows_krim['krim1a'];
        $last_krim = $timeleft_krim - time();
        $current_time = time();
    }
        
if($last_krim <= 0){
    $result = mysqli_query($con, "UPDATE krim SET krim1a='0', krim1='0' WHERE username='".$_SESSION['username']."'")
    or die (mysqli_error($con));
}
        
    $sql = "SELECT * FROM krim WHERE username = '".$_SESSION['username']."'";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);

        $klar = $row['krim1a'];

//////////////////////////////////////////////////////////////////////////
//                      HENTE FRA UTPRESSNING                           //
//////////////////////////////////////////////////////////////////////////
        
    // sql
    $sql_utpressning = "SELECT * FROM utpressning WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result_utpressning = mysqli_query($con, $sql_utpressning);

    while($rows_utpressning = mysqli_fetch_array($result_utpressning)){
        $timeleft_utpressning = $rows_utpressning['utpressning1'];
        $available_utpressning = $rows_utpressning['utpressning1a'];
        $last_utpressning = $timeleft_utpressning - time();
        $current_time__utpressning = time();
    }
        
if($last_utpressning <= 0){
    $result_utpressning = mysqli_query($con, "UPDATE utpressning SET utpressning1a='0', utpressning1='0' WHERE username='".$_SESSION['username']."'")
    or die (mysqli_error($con));
}

    $sql_utpressning = "SELECT * FROM utpressning WHERE username = '".$_SESSION['username']."'";
    $result_utpressning = mysqli_query($con, $sql_utpressning) or die("Bad query: $sql_utpressning");
    $row_utpressning = mysqli_fetch_assoc($result_utpressning);

        $klar_utpressning = $row_utpressning['utpressning1a'];
        
//////////////////////////////////////////////////////////////////////////
//                       HENTE FRA BILTYVERI                            //
//////////////////////////////////////////////////////////////////////////
        
    // sql
    $sql_bil = "SELECT * FROM biltyveri WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result_bil = mysqli_query($con, $sql_bil);

    while($rows_bil = mysqli_fetch_array($result_bil)){
        $timeleft_bil = $rows_bil['biltyveri1'];
        $available_bil = $rows_bil['biltyveri1a'];
        $last_bil = $timeleft_bil - time();
        $current_time_bil = time();
    }
        
    if($last_bil <= 0){
        $result1 = mysqli_query($con, "UPDATE biltyveri SET biltyveri1a='0', biltyveri1='0' WHERE username='".$_SESSION['username']."'")
        or die (mysqli_error($con));
    }
        
    $sql_bil = "SELECT * FROM biltyveri WHERE username = '".$_SESSION['username']."'";
    $result_bil = mysqli_query($con, $sql_bil) or die("Bad query: $sql_bil");
    $row_bil = mysqli_fetch_assoc($result_bil);

        $klar_biltyveri = $row_bil['biltyveri1a'];
        
        ?>
        <link rel="stylesheet" type="text/css" href="css/left.css" />
    </head>
    <body>
        <div id="left">
            
            <br>
            <t style="font-size: 14px; margin-left: 19px;">Rank</t>
                <li><t id="red">- </t><a href="krim.php">Kriminalitet
            <?php if($available_krim == 1){ ?>
                    <!-- <t id="WIP"><span id="countdowntimer_krim"><?php echo $last_krim ?></span></t> -->
            <?php } else { ?>
                    <t id="klar">Klar</t>
            <?php } ?>
                    </a></li>
            
                <li><t id="red">- </t><a href="utpressning.php">Utpressning
            <?php if($available_utpressning == 1){ ?>
                   <!-- <t id="WIP"><span id="countdowntimer_bil"><?php echo $last_utpressning ?></span></t> -->
            <?php } else { ?>
                    <t id="klar">Klar</t>
            <?php } ?>
                    </a></li>
            
                <li><t id="red">- </t><a href="biltyveri.php">Biltyveri
            <?php if($available_bil == 1){ ?>
                   <!-- <t id="WIP"><span id="countdowntimer_bil"><?php echo $last_bil ?></span></t> -->
            <?php } else { ?>
                    <t id="klar">Klar</t>
            <?php } ?>
                </a></li>
            <br/>

            <t style="font-size: 14px; margin-left: 19px;">Handlinger</t>
                <li><t id="red">- </t><a href="bank.php">Bank</a></li>
                <li><t id="red">- </t><a href="firma.php">Firma</a></li>
                <li><t id="red">- </t><a href="bilforhandler.php">Bilforhandler</a></li>
                <li><t id="red">- </t><a href="flyplass.php">Flyplass</a></li>
                <li><t id="red">- </t><a href="sortemarked.php">Det sorte markedet</a></li>
                <li><t id="red">- </t><a href="eiendeler.php">Eiendeler</a></li>
                <li><t id="red">- </t><a href="markedsplass.php">Markedsplass</a></li>
            <br/>

            <t style="font-size: 14px; margin-left: 19px;">Drap</t>
                <li><t id="red">- </t><a href="#">Drep</a></li>
                <li><t id="red">- </t><a href="kulefabrikk.php">Kulefabrikk</a></li>
                <li><t id="red">- </t><a href="vapenforhandler.php">Våpenforhandler</a></li>
                <li><t id="red">- </t><a href="bosted.php">Bosted</a></li>
                <li><t id="red">- </t><a href="beskyttelse.php">Beskyttelse</a></li>
                <li><t id="red">- </t><a href="privatklinikk.php">Privatklinikk</a></li>
            <br/>
            
            <t style="font-size: 14px; margin-left: 19px;">Gambling</t>
                <li><t id="red">- </t><a href="coinflip.php">Kast mynt</a></li>
                <li><t id="red">- </t><a href="hestelop.php">Hesteveddeløp</a></li>
            <br/>
            <!--
            <t style="font-size: 14px; margin-left: 19px;">Spill</t>
                <li><t id="red">- </t><a href="agario.php">Agar.io</a></li>
                <li><t id="red">- </t><a href="monsterstunts.php">Monster Stunts</a></li>
            <br/>
            -->
        </div>
    </body>
</html>

<!------------------------------------------------------>
<!--              Countdown for krim                  -->
<!------------------------------------------------------>
<script type="text/javascript">
    var timeleft_krim = <?php echo $last_krim ?>;
    var downloadTimer = setInterval(function(){
        timeleft_krim--;
        document.getElementById("countdowntimer_krim").textContent = timeleft_krim;
    if(timeleft_krim <= 0) 
    //    window.location.href = "";
    },1000);
</script>

<!------------------------------------------------------>
<!--           Countdown for biltyveri                -->
<!------------------------------------------------------>
<script type="text/javascript">
    var timeleft_bil = <?php echo $last_bil ?>;
    var downloadTimer = setInterval(function(){
        timeleft_bil--;
        document.getElementById("countdowntimer_bil").textContent = timeleft_bil;
    if(timeleft_bil <= 0) 
    //    window.location.href = "";
    },1000);
</script>