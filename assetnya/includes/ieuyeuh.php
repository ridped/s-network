<?php
/* 
// +------------------------------------------------------------------------+
// | @author RIDPEDIA
// | @author_url 1: http://www.ridped.com
// | @author_email: ridahh23@gmail.com
// | @dataGlobal
// +------------------------------------------------------------------------+
*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 0);
error_reporting(1);
@ini_set("max_execution_time", 0);
@ini_set("memory_limit", "-1");
@set_time_limit(0);
require_once "config.php";
$rid = array();
$con   = $rid["sqlConnect"] = mysqli_connect($host, $user_db, $pass_db, $db_name, 3306) or die('Error koneksi mysql');
mysqli_set_charset($rid['sqlConnect'], "utf8mb4");
$s_url = $rid['site_url'] = $site_url;
$web_setting = $rid['web_setting'] = $rid['sqlConnect']->query("SELECT * FROM web_setting")->fetch_assoc();
$temp_name = $rid['template'] = $rid['web_setting']['themes'];
$template_url = $rid['template_url'] = $site_url . "/template/" . $rid['web_setting']['themes'];
// add more global variable here!!
if ($_COOKIE['USERID']) {
    $uid = $_COOKIE['USERID'];
    $datah = $rid['sqlConnect']->query("SELECT * FROM rid_account WHERE id = '$uid'")->fetch_assoc();
    $_SESSION['rid_username'] = $datah['rid_username'];
    $dat = $rid['loggedin'] = true;
    $dat2 = $rid['dataUser'] = $datah;
}