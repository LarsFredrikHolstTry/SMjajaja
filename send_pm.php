<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php include('right.php'); ?>

<?php

include('connection/db.php');

if(isset($_POST['Send'])){

    $_POST['sendto'] = str_replace(' ', '', $_POST['sendto']);
    $m_check = str_replace(' ', '', $_POST['message']);

    // sjekke at alt er fyllt ut.
    if((empty($m_check)) or (empty($_POST['sendto']))){ 
        echo '<div id="mislykket">Du må fylle ut alle felt.</div>';
    } else {

    // for å sende melding til flere personer. Opp til 5.
    $multi_messages = explode("-", $_POST['sendto']);
    $multi_messages = array_unique($multi_messages);

    if(count($multi_messages) > 5){
        echo '<div id="mislykket">Du kan kun sende meldingen til 5 forskjellige om gangen.</div>';
    } else {

    // sjekker alle brukerene i for-loopen.
    for ($i = 0; $i < count($multi_messages); $i++) {

        $query = "SELECT username FROM users WHERE username='".mysqli_real_escape_string($con, $multi_messages[$i])."'"; 
        $result = mysqli_query($con, $query) or die ("Bad query: $query");
        $row = mysqli_fetch_array($result);

        // kan ikke sende pm til seg selv.
        if($row['username'] == $username){
            echo '<div id="mislykket">Du kan ikke sende pm til deg selv, tulling.</div>';
        } else {

            if(!empty($row['username'])){
                $sql = "INSERT INTO pm SET id = '', sendto = '" .mysqli_real_escape_string($con, $row['username']). "', message = '" .mysqli_real_escape_string($con, $_POST['message']). "', sendfrom = '" .mysqli_real_escape_string($con, $username). "'";
                $res = mysqli_query($con, $sql);

                if ($res){
                    // meldingen ble sendt
                    $send_to = "<a href=\"profil.php?username=".$row['username']."\"onfocus=\"if(this.blur)this.blur()\">".$row['username']."</a>,";
                    echo '<div id="velykket">Meldingen til '.$send_to.' ble sendt.</div>';

                    $result = mysqli_query($con, "UPDATE users SET newmail='0' WHERE username='".mysqli_real_escape_string($con, $row['username']). "'") or die ("Bad query: $result");

                    $result = mysqli_query($con, "UPDATE users SET messages=messages+'1' WHERE username='".mysqli_real_escape_string($con, $_SESSION['username']). "'") or die ("Bad query: $result");

                } else {
                    // hvis noe gikk galt.
                    echo '<div id="mislykket">FEIL! Meldingen ble ikke sendt, prøv på nytt.</div>';
                }
            } else {
                // hvis en bruker ikke finnes i databasen
                echo '<div id="mislykket">'.$multi_messages[$i].' spiller ikke dette spillet.</div>';
            }
        }
    }
}
}
}

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/support.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />

    </head>

    <body style="margin: 0 auto; width: 1000px;">

<center>
    <form method="post">
        <div id="support">
            <table>
                <li id="supportdesign">Send pm</li>
                <li id="support_tekst">Send til: <input name="sendto" style="width: 520px;" type="text" value='<?php echo $_GET['username']; ?>' maxlength="110" />
                </li>
                <li id="support_tekst">Melding: <textarea name="message" cols="77" rows="10"></textarea></li>
                <li id="support_tekst"><input class="button" name="Send" type="submit" id="Send" onfocus="if(this.blur)this.blur()" value="Send pm"/></li>
            </table>
        </div>
    </form>
</center>
        
    </body>
</html>








