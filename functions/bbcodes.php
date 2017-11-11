<?php

function showBBcodes($text) {

// bold
$find[0] = '~\[b\](.*?)\[/b\]~s';
$replace[0] = '<b>$1</b>';

// italic
$find[1] = '~\[i\](.*?)\[/i\]~s';
$replace[1] = '<i>$1</i>';

// underline
$find[2] = '~\[u\](.*?)\[/u\]~s';
$replace[2] = '<span style="text-decoration:underline;">$1</span>';

// quote
$find[3] = '~\[quote\](.*?)\[/quote\]~s';
$replace[3] = '<pre>$1</'.'pre>'; 

// font size
$find[4] = '~\[size=(.*?)\](.*?)\[/size\]~s';
$replace[4] = '<span style="font-size:$1px;">$2</span>';
    
// color
$find[5] = '~\[color=(.*?)\](.*?)\[/color\]~s';
$replace[5] = '<span style="color:$1;">$2</span>';
    
// url
$find[6] = '~\[url\]((?:ftp|https?)://.*?)\[/url\]~s';
$replace[6] = '<a href="$1">$1</a>';
    
// img
$find[7] = '~\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s';
$replace[7] = '<img src="$1" style="max-width: 600px;" alt="" />';

// center
$find[8] = '~\[center\](.*?)\[/center\]~s';
$replace[8] ='<center>$1</center>';
    
// shadow text-shadow: 1px 1px 1px #000;
$find[9] = '~\[shadow\](.*?)\[/shadow\]~s';
$replace[9] = '<span style="text-shadow: 1px 1px 1px #000;">$1</span>';
    
    // Replacing the BBcodes with corresponding HTML tags
	return preg_replace($find,$replace,$text);
}

?>