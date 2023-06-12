<?php
/* 
// +------------------------------------------------------------------------+
// | @author RIDPEDIA
// | @author_url 1: http://www.ridped.com
// | @author_email: ridahh23@gmail.com
// | @DefaultFunction
// +------------------------------------------------------------------------+
*/

// add more function here@!!
require_once "ieuyeuh.php";
function rid_LoadPage($page_url = '') {
    global $rid;
    $templates = $rid['template'];
    $page         = './template/' . $templates . '/layout/' . $page_url . '.phtml';
    $page_content = '';
    ob_start();
    require($page);
    $page_content = ob_get_contents();
    ob_end_clean();
    return $page_content;
}

// easy to add multiple lang
function rid_lang($lang_keyword) {
    global $rid;
    $con = $rid['sqlConnect'];
    $ridlang = $_COOKIE['rid_lang'];
    // you can add more lang here..
    // I don't know what the truest way is, what I know is like this for example :
    if ($ridlang == 'id') {
        $ridlang = "indonesian";
    } else if ($ridlang == 'en') {
        $ridlang = "str";
    } else if (!$ridlang) {
        $ridlang = "str";
    }
    $checklang = mysqli_query($con, "SELECT * FROM languages WHERE lang_keyword = '$lang_keyword'");
    $datlang = mysqli_fetch_assoc($checklang);
    return $datlang[$ridlang];
}


function rid_username($u) {
    global $rid;
    $f = $rid['sqlConnect']->query("SELECT * FROM rid_account WHERE rid_username = '$u'")->num_rows;
    if ($f == 1) {
        return true;
    } else {
        return false;
    }
}

function nowa_exists($no) {
    global $rid;
    $f = $rid['sqlConnect']->query("SELECT * FROM rid_account WHERE c_wa = '$no'")->num_rows;
    if ($f > 0) {
        return true;
    } else {
        return false;
    }
}

function email_exists($email) {
    global $rid;
    $f = $rid['sqlConnect']->query("SELECT * FROM rid_account WHERE email = '$email'")->num_rows;
    if ($f > 0) {
        return true;
    } else {
        return false;
    }
}

function rid_Register($data){
    global $rid;
    $data = json_decode($data, true);
    $username = $data['username'];
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    $ridlevel = '2';
    $nd = $rid['web_setting']['nd_default'];
    $c_wa = $data['c_wa'];
    $full_name = $data['fullName'];
    $email = $data['email'];
    $v_otp = '';
    $cook = '';
    $ridfo = '';
    if ($rid['sqlConnect']->query("INSERT INTO rid_account VALUES (null, '$username', '$password', '$ridlevel', '$nd', '$c_wa', '$full_name', '$email', '$cook')") == true) {
        return true;
    } else {
        return false;
    }
}

function redirect($target)
{
    echo '
    <script>
    window.location = "' . $target . '";
    </script>
    ';
    //exit();
}

function rid_CreateLogin($u, $p) {
    global $rid;
    $d = $rid['sqlConnect']->query("SELECT * FROM rid_account WHERE rid_username = '$u'")->fetch_assoc();
    if (password_verify($p, $d['rid_password'])){
        if (password_needs_rehash($d['rid_password'], PASSWORD_DEFAULT)){
            $new_pass = password_hash($p, PASSWORD_DEFAULT);
            $rid['sqlConnect']->query("UPDATE rid_account SET rid_password = '$new_pass' WHERE rid_username = '$u'");
        }
        return true;
    }
    return false;
    
}

function checksession() {
    if (!$_SESSION['rid_username']) {
        return false;
    } else {
        return $_SESSION['rid_username'];
    }
}

function get($param)
{
    global $rid;
    $con = $rid['sqlConnect'];
    $d = isset($_GET[$param]) ? $_GET[$param] : null;
    $d = mysqli_real_escape_string($con, $d);
    $d = filter_var($d, FILTER_SANITIZE_STRING);
    return $d;
}

function post($param)
{
    global $rid;
    $con = $rid['sqlConnect'];
    $d = isset($_POST[$param]) ? $_POST[$param] : null;
    $d = mysqli_real_escape_string($con, $d);
    $d = filter_var($d, FILTER_SANITIZE_STRING);
    return $d;
}

function d_now() {
    return date('Y-m-d');
}

function ucapan() {
    $jam = date('H:i');
    if ($jam > '05:30' && $jam < '10:00') {
        $ucapan = "Selamat pagi";
    } else if ($jam >= '10:00' && $jam < '15:00') {
        $ucapan = "Selamat siang";
    } else if ($jam >= '15:00' && $jam < '18:00') {
        $ucapan = "Selamat sore";
    } else {
        $ucapan = "Selamat malam";
    }
    return $ucapan;
}

function countDB($table, $where = null, $param = null)
{
    global $rid;
    if ($where == null && $param == null) {
        $q = $rid['sqlConnect']->query("SELECT * FROM `$table`");
    } else {
        $q = $rid['sqlConnect']->query("SELECT * FROM `$table` WHERE `$where`='$param'");
    }
    $row = $q->num_rows;
    return $row;
}

function randString($length) {
    $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $char = str_shuffle($char);
    for($i = 0, $rand = '', $l = strlen($char) - 1; $i < $length; $i ++) {
        $rand .= $char[mt_rand(0, $l)];
    }
    $_SESSION['csrf_token'] = $rand;
    return $rand;
}

function getMsgs($user_id, $logged_user_id, $limit = 50, $sort = 'DESC') {
    global $rid;
    if ($rid['sqlConnect']->query("SELECT * FROM rid_messages WHERE from_id = '$user_id' AND to_id = '$logged_user_id' OR from_id = '$logged_user_id' AND to_id = '$user_id'")->num_rows < 1) {
        return false;
    } else {
        return $rid['sqlConnect']->query("SELECT * FROM (SELECT * FROM rid_messages WHERE from_id = '$user_id' AND to_id = '$logged_user_id' OR from_id = '$logged_user_id' AND to_id = '$user_id' ORDER BY id $sort LIMIT $limit) AS sub ORDER BY id ASC");
    }
    return false;
}

function getChats($limit = 10) {
    global $rid;
    $uid = $rid['dataUser']['id'];
    if ($rid['sqlConnect']->query("SELECT * FROM rid_chats WHERE id_user = '$uid'")->num_rows < 1) {
        return false;
    } else {
        return $rid['sqlConnect']->query("SELECT * FROM rid_chats WHERE id_user = '$uid' ORDER BY id DESC LIMIT $limit");
    }
    return false;
}

function getDataUser($id) {
    global $rid;
    if ($rid['sqlConnect']->query("SELECT * FROM rid_account WHERE id = '$id'")->num_rows > 0) {
        return $rid['sqlConnect']->query("SELECT * FROM rid_account WHERE id = '$id'")->fetch_assoc();
    } else {
        return false;
    }
    return false;
}

function rid_deleteChats($uid) {
    global $rid;
    $myid   = $rid['dataUser']['id'];
    $query  = "SELECT * FROM rid_messages WHERE from_id = '$uid' AND to_id = '$myid' OR from_id = '$myid' AND to_id = '$uid'";
    $q = mysqli_query($rid['sqlConnect'], $query);
    if (mysqli_num_rows($q)) {
        while($row = mysqli_fetch_assoc($q)) {
            rid_deleteMsg($row['id']);
        }
    }
    return $rid['sqlConnect']->query("DELETE FROM rid_chats WHERE id_user = '$myid' AND c_with = '$uid'");
}

function rid_deleteMsg($msg_id) {
    global $rid;
    $myid = $rid['dataUser']['id'];
    $query = "SELECT * FROM rid_messages WHERE id = '$msg_id'";
    $q = mysqli_query($rid['sqlConnect'], $query);
    if ($q) {
        if (mysqli_num_rows($q) == 1) {
            $q = mysqli_fetch_assoc($q);
            if ($q['deleted_one'] == 1 || $q['deleted_two'] == 1) {
                $rid['sqlConnect']->query("DELETE FROM rid_messages WHERE id = '$msg_id'");
            } else {
                $delete_type = 'deleted_one';
                if ($q['to_id'] == $myid) {
                    $delete_type = 'deleted_two';
                }
                $rid['sqlConnect']->query("UPDATE rid_messages SET $delete_type = '1' WHERE id = '$msg_id'");
            }
        }
    }
    return true;
}

function rid_getPosts($byid = 0, $limit = 5) {
    global $rid;
    if (!$byid) {
        $q = "SELECT * FROM rid_posts ORDER BY id DESC LIMIT $limit";
    }
    if ($rid['sqlConnect']->query($q)->num_rows > 0) {
        return $rid['sqlConnect']->query($q);
    } else {
        return false;
    }

    return false;
}

?>