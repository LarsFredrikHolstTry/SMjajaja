
<?php 

include('header.php');
include('left.php');
include('right.php');
include('_biltyveri.php');

?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/krim.css" />
    <link rel="stylesheet" type="text/css" href="css/notat.css" />

    </head>

    <body style="margin: 0 auto; width: 1000px;">
      
    <center>
        <?php 
        
        $sql2 = "SELECT * from biltyveri WHERE username='$username'";
        $result2 = mysqli_query($con, $sql2);

        while($rows2 = mysqli_fetch_array($result2)){
            $timeleft1= $rows2['biltyveri1'];
            $available1= $rows2['biltyveri1a'];
            $last1 = $timeleft1 - time();

        if($available1 == 1) { 
            echo '<div id="ventetid">Du må vente <b><span id="countdowntimer">'.$last1.'</span>s</b> før du kan gjøre biltyveri igjen!</div>';
        } else { ?>
    <div id="krimcontainer2">
        <li id="krimdesign2">Biltyveri</li>
    </div>
        <img src="images/handlinger/biltyveri.png" class="krimbilde">
    <div id="krimcontainer">
        <li id="krimdesign"><a style="float:left; margin-left: 10px;">Handling</a><a style="float:right; margin-right: 25px;">Ventetid</a><a style="float:right; width: 255px;">Sjanse</a></li>
    </div>
        
    </center>
        
    <form id="form1" name="fo+orm1" method="post" action=""> 
        <div id="countdown">
            <button name="biltyveri1" id="biltyveri1" value="biltyveri1" class="krim">Stjel bil fra åpen gate<a style="float:right; margin-right: 10px; width: 50px;">50 sek</a><a style="float:right; width: 150px;"><?php echo $biltyveri1_sjans ?>%</a></button>
        </div>

        <div id="countdown">
            <button name="biltyveri2" id="biltyveri2" value="biltyveri2" class="krim">Stjel bil fra privat parkeringshus<a style="float:right; margin-right: 10px; width: 50px;">100 sek</a><a style="float:right; width: 150px;"><?php echo $biltyveri2_sjans ?>%</a></button>
        </div>
        
        <div id="countdown">
            <button name="biltyveri3" id="biltyveri3" value="biltyveri3" class="krim">Stjel bil fra bilforhandler<a style="float:right; margin-right: 10px; width: 50px;">280 sek</a><a style="float:right; width: 150px;"><?php echo $biltyveri3_sjans ?>%</a></button>
        </div>
        
    </form>
      
      <?php } } ?>
        
<script type="text/javascript">
    var timeleft = <?php echo $last1 ?>;
    var downloadTimer = setInterval(function(){
        timeleft--;
        document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft <= 0)
        window.location.href = "biltyveri.php";
    },1000);
</script>
      
    </body>
</html>

