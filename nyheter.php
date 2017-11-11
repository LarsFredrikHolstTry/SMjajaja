<?php include('header.php'); ?>
<?php include('left.php'); ?>
<?php include('right.php'); ?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/nyheter.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>

    <body style="margin: 0 auto; width: 1000px;">
        <center>
            <div id="container">
                <li id="sm-tp-hdr">NYHETER</li>
                <img src="images/handlinger/news.png">
            </div>
        </center>
    </body>
</html>


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

    echo '
    <div id="containernyhet">
        <div id="nyhetsinnlegg">
            <h1>'.$news_title.'</h1>
            <t>'.$news_desc.'</t>
            <li>Publisert: '.$news_published.' <t style="float: right; color: grey;">av: <a href="profil.php?username='.$news_author.'">'.$news_author.'</a></t></li>
        </div>
        <hr>
    </div>
    ';
}

?>

