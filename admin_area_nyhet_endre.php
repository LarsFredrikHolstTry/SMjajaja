<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php include('right.php'); ?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/admin_area.css" />
    </head>

    <body style="margin: 0 auto; width: 1000px;">

        <center>
            <?php  if($account_type == 3 || $account_type == 2){ ?>
            <form action="" method="post" enctype="multipart/form-data"> 
                <div id="admin">
                    <table>
                        <li id="admindesign"><a href="admin_area.php">Tilbake til admin area</a></li>
                        <li id="admindesign"><b> NYHETSOVERSIKT </b></li>
                        <img src="images/handlinger/news.png">
                        
<?php

include("auth.php");
$get_news = "select * from news ORDER BY news_id DESC;";
$run_news = mysqli_query($con, $get_news); 
while($row = mysqli_fetch_array($run_news)){
    
    $news_title     = $row['news_title'];       // Tittel
    $news_desc      = $row['news_desc'];        // Beskrivelse
    $news_id        = $row['news_id'];          // Id
    $news_published = $row['news_published'];   // Når publisert
    $news_author    = $row['news_author'];      // Forfatter

?>
                        
    <!-- tittel -->
    <li id="admin_nyhet">
    <t rows="1" cols="80" wrap="hard">Tittel: <?php echo $news_title ?></t>
    </li>
                        
    <li id="admin_nyhet">
        <textarea rows="1" cols="80" wrap="hard"><?php echo $news_id ?></textarea>
    </li>

    <!-- beskrivelse -->
    <li id="admin_nyhet">
    <t rows="1" cols="80" wrap="hard">innhold: <?php echo $news_desc ?></t>
    </li>


    <li id="admin_nyhet"><center><input type="submit" name="slett_nyhet" value="SLETT NYHET!"/></center></li>
<?php
                        
}

?>
                    </table>
                </div>
            </form>
            <?php } ?>
            
            <?php if($account_type == 1) { ?>
    
            <div id="mislykkket">KUN FOR ADMINS</div>

            <?php } ?>
        </center>

    </body>
</html>

      <?php   

include("auth.php");
    
if(isset($_POST['slett_nyhet'])){
    $id = $_REQUEST['id'];
    
    $delete = "DELETE FROM news WHERE news_id = $news_id";
    mysqli_query($con, $delete);
}

?>