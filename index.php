<?php
/* 
// +------------------------------------------------------------------------+
// | @author RIDPEDIA
// | @author_url 1: http://www.ridped.com
// | @author_email: ridahh23@gmail.com
// | @defaultIndex!
// +------------------------------------------------------------------------+
*/
require_once('assetnya/require.php');
$page = '';
if ($_GET['link1']) {
    $page = $_GET['link1'];
}
if ($rid['loggedin'] == true) {
    $u = $_SESSION['rid_username'];
    $d = $rid['sqlConnect']->query("SELECT * FROM rid_account WHERE rid_username = '$u'");
    if ($d->num_rows < 1) {
        setcookie("deleted_acc", "1");
        header("location: " .$rid['site_url'] . "/index.php?link1=logout");
    } else {
        $d = $d->fetch_assoc();
        if ($d['cookie'] == '') {
            setcookie("forced", "1");
            header("location: " . $rid['site_url'] . "/index.php?link1=logout");
        }
    }
    if (empty($page)) {
        $page = 'beranda';
    }
} else {
    if (empty($page)) {
        // default is landing
        $page = 'landing';
    }
}
switch($page) {
    case 'landing':
        include('sc/landing.php');
    break;
    case 'register':
        include('sc/register.php');
    break;
    case 'beranda':
        include('sc/beranda.php');
    break;
    case 'profile':
        include('sc/profile.php');
    break;
    case 'logout':
        include('sc/logout.php');
    break;
}
if (empty($rid['content'])) {
    include('sc/404.php');
}
echo rid_LoadPage('main');
?>
