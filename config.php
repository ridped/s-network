<?php
/* 
// +------------------------------------------------------------------------+
// | @author RIDPEDIA
// | @author_url 1: http://www.ridped.com
// | @author_email: ridahh23@gmail.com
// | @DatabaseConnection
// +------------------------------------------------------------------------+
*/
$data_web = json_decode(file_get_contents(__DIR__ . '/config.json'), true) or die('error');
$host = $data_web['host_name'];
$user_db = $data_web['user'];
$pass_db = $data_web['password'];
$db_name = $data_web['db_name'];
$site_url = $data_web['domain'];
$port_app = $data_web['port'];
$ssl = $data_web['ssl'];
$d_w = $data_web['domain_without_http'];
?>