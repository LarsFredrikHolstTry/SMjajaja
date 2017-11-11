<?php 

include('header.php');
include('left.php');
include('right.php');

    $sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."' LIMIT 1";
    $result = mysqli_query($con, $sql) or die("Bad query: $sql");
    $row = mysqli_fetch_assoc($result);

    $account_type = $row['account_type'];

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/support.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />

    </head>
    <body style="margin: 0 auto; width: 1000px;">
        <div class="content">
<?php

    // sjekker om bruker er admin
    if($account_type <= 3){
        
if(isset($_POST['name'], $_POST['description']) and $_POST['name']!='')
{
	$name = $_POST['name'];
	$description = $_POST['description'];
	if(get_magic_quotes_gpc())
	{
		$name = stripslashes($name);
		$description = stripslashes($description);
	}
	$name = mysqli_real_escape_string($con, $name);
	$description = mysqli_real_escape_string($con, $description);
	if(mysqli_query($con, 'insert into categories (id, name, description, position) select ifnull(max(id), 0)+1, "'.$name.'", "'.$description.'", count(id)+1 from categories')) {
	?>
	<div class="message">The category have successfully been created.<br />
	<a href="forum.php">Go to the forum index</a></div>
	<?php
	} else {
		echo '<div id="mislykket">En feil skjedde ved opprettelse av kategori. Sjekk at kategorien ikke er opprettet og prøv på nytt. </div>';
	}
} else {
?>
   
<center>
    <form action="forum_ny_kat.php" method="post">
        <div id="support">
            <table>
                <li id="supportdesign">Opprett ny kategori <a href="forum.php">(tilbake til forum)</a></li>
                <li id="support_tekst">Kategori: <input type="text" name="name" id="name" style="width: 520px;" type="text" maxlength="110" />
                </li>
                <li id="support_tekst">Beskrivelse av kategorien: <textarea name="description" id="description" cols="77" rows="2"></textarea></li>
                <li id="support_tekst"><input type="submit" value="Opprett post" /></li>
            </table>
        </div>
    </form>
</center>
            
<?php } ?>
		</div>
	</body>
</html>

<?php
} else {
    echo 'Du må være admin for å være her';
}

?>
