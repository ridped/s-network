<?php
/* 
// +------------------------------------------------------------------------+
// | @author RIDPEDIA
// | @author_url 1: http://www.ridped.com
// | @author_email: ridahh23@gmail.com
// +------------------------------------------------------------------------+
*/
if ($rid['loggedin'] == true){
    header("Location: " . $rid['site_url'] . "/index.php?link1=beranda");
    exit();
}
$rid['title']       = 'WELCOME';
$rid['is_landing']  = true;
$rid['content']     = rid_LoadPage('landing/main');