<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php include('right.php'); ?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bank.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script type="text/javascript" src="_bank.js"></script>   
        
        <?php include('_bank.php'); ?>
        
<script type="text/javascript">

    $('#tall').on("input", function() {
        this.value = this.value.replace(/ /g,'');
        var number = this.value;
        this.value = number.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    });

</script>
        
    </head>

    <body style="margin: 0 auto; width: 1000px;">
        <center>
            <div id="sm-cntr">
                <li id="sm-tp-hdr">Banken</li>
                <img src="images/handlinger/bank2.png">
                <li id="sm-tp-hdr">Bankkonto</li>
                <li id="sm-box20">Kontoeier: <?php echo "<a id='brukeronline' href=\"profil.php?username=".$username."\" onFocus=\"if(this.blur)this.blur()\">".$username."</a>" ?></li>
                <li id="sm-box20">Penger i banken: <?php echo number_format($bank_penger, 0, '.', ' '); ?>,- </li>
                
                <div id="sm-wrpr">
                    <div id="settinn">
                        <li><t>Sett inn</t></li>
                        <form action="bank.php" method="post">
                        <li><input type="text" name="antallpenger" id="tall" placeholder="Beløp" /> <t>kr</t></li>
                        <li><input class="button" type="submit" name="submit" value="Sett inn"> <input class="button" type="submit" name="sett_inn_alt" value="Sett inn alt"></li>
                    </form>
                    </div>

                    <div id="taut">
                        <li><t>Ta ut</t></li>
                        <form action="bank.php" method="post">
                        <li><input type="text" name="antallpengerut" placeholder="Beløp" /> <t>kr</t></li>
                        <li><input class="button" id="ta_ut" type="submit" name="submit" value="Ta ut"> <input class="button" id="ta_ut_alt" type="submit" name="ta_ut_alt" value="Ta ut alt"></li>
                        </form>
                    </div>
                    
                    <div id="overfor">
                        <li><t>Overfør</t></li>
                        <form action="bank.php" method="post">
                        <li><t>Mottaker: </t><input type="text" name="mottaker" placeholder="Mottaker" required/></li>
                        <li><t>Penger: </t><input type="text" name="antallpengeroverfor" id="tall" placeholder="Beløp" required/> <t>kr</t></li>
                        <li><input class="button" type="submit" name="submit" value="Overfør"></li>
                        </form>
                    </div>
                </div>
            </div>
        </center>

    </body>
</html>


<script>


$('#tall').on("keyup", function() {
    this.value = this.value.replace(/ /g,'');
    var number = this.value;
    this.value = number.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
});

</script>


