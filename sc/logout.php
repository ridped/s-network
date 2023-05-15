<?php
session_unset();
if (isset($_GET)) {
    $reason = $_GET['reason'];
}
if (!empty($_SESSION['rid_username'])) {
	$_SESSION['rid_username'] = '';
}
session_destroy();
if (isset($_COOKIE['loggedin'])) {
	$_COOKIE['loggedin'] = '';
	$uidz = $_COOKIE['USERID'];
    $rid['sqlConnect']->query("UPDATE rid_account SET cookie = '' WHERE id = '$uidz'");
    $_COOKIE['USERID'] = '';
    unset($_COOKIE['loggedin']);
    unset($_COOKIE['USERID']);
    setcookie('loggedin', null, -1);
    setcookie('loggedin', null, -1,'/');
    setcookie('USERID', null, -1);
    setcookie('USERID', null, -1,'/');
}
 


$_SESSION = array();
unset($_SESSION);
if (isset($_GET['reason'])) {
    header("Location: " . $rid['site_url'] . "?reason=$reason");
} else {
    header("Location: " . $rid['site_url']);
}
//redirect($rid['site_url'] . "/index.php?link1=logout");
exit();