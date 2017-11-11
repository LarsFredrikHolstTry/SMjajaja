

<?php 

include('header.php');
include('left.php');
include('right.php');
include('_krim.php');

?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/krim.css" />
    <link rel="stylesheet" type="text/css" href="css/notat.css" />

    </head>

    <body style="margin: 0 auto; width: 1000px;">
      
    <center>
        <?php 
        
        $sql2 = "SELECT * from krim WHERE username='$username'";
        $result2=mysqli_query($con, $sql2);

        while($rows2=mysqli_fetch_array($result2)){
            $timeleft1= $rows2['krim1'];
            $available1= $rows2['krim1a'];
            $last1 = $timeleft1 - time();

        if($available1 == 1) {
            echo '<div id="ventetid">Du må vente <b><span id="countdowntimer">'.$last1.'</span>s</b> før du kan gjøre en kriminell handling igjen!</div>';
        } else { ?>
    <div id="krimcontainer2">
        <li id="krimdesign2">Kriminalitet</li>
    </div>
        <img src="images/handlinger/kriminalitet.png" class="krimbilde">
    <div id="krimcontainer">
        <li id="krimdesign"><a style="float:left; margin-left: 10px;">Handling</a><a style="float:right; margin-right: 25px;">Ventetid</a><a style="float:right; width: 255px;">Sjanse</a></li>
    </div>
    </center>
        
    <form id="form1" name="form1" method="post" action=""> 
        <div id="countdown">
            <button name="krim1" id="krim1" value="krim1" class="krim">Ran en gammel dame<a style="float:right; margin-right: 10px; width: 50px;">50 sek</a><a style="float:right; width: 150px;"><?php echo $krim1_sjans ?>%</a></button>
        </div>

        <div id="countdown">
            <button name="krim2" id="krim2" value="krim2" class="krim">Stjel kassa fra nærbutikken<a style="float:right; margin-right: 10px; width: 50px;">100 sek</a><a style="float:right; width: 150px;"><?php echo $krim2_sjans ?>%</a></button>
        </div>
        
        <div id="countdown">
            <button name="krim3" id="krim3" value="krim3" class="krim">Svindle bingoen på galleri<a style="float:right; margin-right: 10px; width: 50px;">180 sek</a><a style="float:right; width: 150px;"><?php echo $krim3_sjans ?>%</a></button>
        </div>
        
        <div id="countdown">
            <button name="krim4" id="krim4" value="krim4" class="krim">Ran en bank<a style="float:right; margin-right: 10px; width: 50px;">420 sek</a><a style="float:right; width: 150px;"><?php echo $krim4_sjans ?>%</a></button>
        </div>
        
    </form>
      
      <?php } } ?>
    
    <script type="text/javascript">
        var timeleft = <?php echo $last1 ?>;
        var downloadTimer = setInterval(function(){
            timeleft--;
            document.getElementById("countdowntimer").textContent = timeleft;
            if(timeleft <= 0)
                window.location.href = "krim.php";
        },1000);
    </script>
        
    </body>
</html>


