<?php
/* 
// +------------------------------------------------------------------------+
// | @author RIDPEDIA
// | @author_url 1: http://www.ridped.com
// | @author_email: ridahh23@gmail.com
// | @AjaxLoad!
// +------------------------------------------------------------------------+
*/
require_once('assetnya/require.php');
$data = array();
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        $value      = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        $_GET[$key] = strip_tags($value);
    }
}
if (!empty($_REQUEST)) {
    foreach ($_REQUEST as $key => $value) {
        $value          = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        $_REQUEST[$key] = strip_tags($value);
    }
}
if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        if ($key != 'url') {
            $value       = preg_replace('/on[^<>=]+=[^<>]*/m', '', $value);
        }
        $_POST[$key] = strip_tags($value);
    }
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    if (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        exit("Restrcited Area");
    }
} else {
    exit("Restrcited Area");
}

$page = '';
if ($_GET['link1']) {
    $page = $_GET['link1'];
}
if ($rid['loggedin'] == true) {
    $u = $_SESSION['rid_username'];
    $d = $rid['sqlConnect']->query("SELECT * FROM rid_account WHERE rid_username = '$u'");
    if ($d->num_rows < 1) {
        setcookie("deleted_acc", "1");
        $data['redirect'] = true;
        $data['redirect_url'] = $rid['site_url'] . "index.php?link1=logout";
    } else {
        $d = $d->fetch_assoc();
        if ($d['cookie'] == '') {
            setcookie("forced", "1");
            $data['redirect'] = true;
            $data['redirect_url'] = $rid['site_url'] . "index.php?link1=logout";
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
if (empty($rid['title'])) {
    $data['title'] = $rid['web_setting']['tittle'];
}
$data['url']             = '';
$actual_link             = "http://$_SERVER[HTTP_HOST]";
$data['title']           = $rid['title'];
$data['is_beranda']      = $rid['is_beranda'];
?>
<input type="hidden" id="json-data" value='<?php
echo htmlspecialchars(json_encode($data));
?>'>
<?php
echo $rid['content'];
?>
