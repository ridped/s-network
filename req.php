<?php
/* 
// +------------------------------------------------------------------------+
// | @author RIDPEDIA
// | @author_url 1: http://www.ridped.com
// | @author_email: ridahh23@gmail.com
// | @AjaxRequest
// +------------------------------------------------------------------------+
*/
require_once('assetnya/require.php');
$f = '';
if (isset($_GET)) {
    $f = $_GET['f'];
}
$allow_array     = array(
    'login',
    'register',
);
if (!in_array($f, $allow_array)) {
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
        if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
            exit("Restrcited Area");
        }
    } else {
        exit("Restrcited Area");
    }
}
$files = scandir('rid');
unset($files[0]);
unset($files[1]);
if (file_exists('rid/' . $f . '.php') && in_array($f . '.php', $files)) {
    include 'rid/' . $f . '.php';
}
mysqli_close($con);
unset($rid);
exit();