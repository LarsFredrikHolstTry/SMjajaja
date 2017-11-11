<?php

if (isset($_POST['Clean']))
{ 

$result = mysqli_query($con,"UPDATE pm SET del='2' WHERE sendto = '". mysqli_real_escape_string($con, $username)."'")
or die(mysqli_error());

echo '<div id="velykket">Inboxen er ryddet!</div>';
} // if clean

////////////////////////////////////////// delete message ////////////////////////////////////

if (!empty($_GET['delete'])){

$result = mysqli_query($con,"UPDATE pm SET del='2' WHERE sendto = '". mysqli_real_escape_string($con, $username)."' and id='" . mysqli_real_escape_string($con, $_GET['delete']). "'")
or die(mysqli_error());

}//if delete message

if(isset($_POST['Delete'])){

$id = $_POST['id'];
	if(!empty($id)){
$delete = implode(",",$id);
$delete = explode(",",$delete);
for($a = 0; !empty($delete[$a]);$a++){
$result = mysqli_query($con,"UPDATE pm SET del='2' WHERE sendto = '". mysqli_real_escape_string($con, $username)."' and id='" . mysqli_real_escape_string($con, $delete[$a]). "'")
or die(mysqli_error());
	}
		echo '<div id="velykket">Alle merkede meldinger er slettet</div>';
	} else {
		echo '<div id="mislykket">Du valgte ingen meldinger</div>';
	}
}

?>