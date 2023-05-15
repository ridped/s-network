<?php
/* 
// +------------------------------------------------------------------------+
// | @author RIDPEDIA
// | @author_url 1: http://www.ridped.com
// | @author_email: ridahh23@gmail.com
// +------------------------------------------------------------------------+
*/
if ($f == 'register') {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($_POST['email']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['fullName'])) {
        $errors = rid_lang('empty_form_login');
    } else {
        if (preg_match('/[^\w\s]+/u', $_POST['fullName'])) {
            $errors = "Invalid Karakter Full Name!";
        }
        if (preg_match('/[^\w\s]+/u', $_POST['username'])) {
            $errors = "Invalid Karakter Username!!";
        }
        if (rid_username($_POST['username'])) {
            $errors = rid_lang('username_registered');
        }
        if (strlen($_POST['username']) < 5 OR strlen($_POST['username']) > 32) {
            $errors = rid_lang('u_must_be5');
        }
        if (strlen($_POST['password']) < 5) {
            $errors = rid_lang('pass_too_shorts');
        }
        if (email_exists($_POST['email'])) {
            $errors = rid_lang('e_used');
        }
        if (empty($errors)) {
            $d = date('Y-m-d');
            $dataa = array(
                "username"=> str_replace(' ', '', $username),
                "fullName"=> $fullName,
                "email"=> $email,
                "password"=> $password
            );
            $dataa = json_encode($dataa);
            if (rid_Register($dataa)) {
                $responya = array(
                    "status"=> true,
                    "location"=> $rid['site_url']
                );
                $_SESSION['rid_username'] = $username;
                $session = md5($username);
                $uid = $rid['sqlConnect']->query("SELECT * FROM rid_account WHERE rid_username = '$username'")->fetch_assoc();
                $rid['sqlConnect']->query("UPDATE rid_account SET cookie = '$session' WHERE rid_username = '$username'");
                setcookie("loggedin", $session, time() + (10 * 365 * 24 * 60 * 60));
                setcookie("USERID", $uid['id'], time() + (10 * 365 * 24 * 60 * 60));
                //echo json_encode($responya);
            } else {
                $responya = array(
                    "status"=> false,
                    "errors"=> rid_lang('empty_form_login'),
                );
                 die(json_encode($responya));
            } 
        }
        if (isset($errors))  {
            $responya = array(
                "status"=> false,
                "errors"=> $errors
            );
            echo json_encode($responya);
        } else {
            $responya = array(
                "status"=> true,
                "location"=> $rid['site_url']
            );
            echo json_encode($responya);
        }
    }
    exit();
}