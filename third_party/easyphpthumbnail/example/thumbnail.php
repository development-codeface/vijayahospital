<?php

// Example for dynamic image
// See www.mywebmymail.com for more details

//if (isset($_REQUEST['thumb'])) {
    include_once('inc/easyphpthumbnail.class.php');
    // Your full path to the images
    $dir = '/opt/lampp/htdocs/easyphpthumbnail/example/img/';
    // Create the thumbnail
    $thumb = new easyphpthumbnail;
    $thumb -> Thumbsize = 300;
    $thumb -> Copyrighttext = 'MYWEBMYMAIL.COM';
    $thumb -> Copyrightposition = '50% 90%';
    $thumb -> Copyrightfonttype = $dir . 'handwriting.ttf';
    $thumb -> Copyrightfontsize = 30;
    $thumb -> Copyrighttextcolor = '#FFFFFF';    
    $thumb -> Createthumb($dir . 'image.jpg');
//}

?>