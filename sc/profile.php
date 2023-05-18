<?php
/* 
// +------------------------------------------------------------------------+
// | @author RIDPEDIA
// | @author_url 1: http://www.ridped.com
// | @author_email: ridahh23@gmail.com
// | @profilePages
// +------------------------------------------------------------------------+
*/
$uid = $_GET['uid'];
$rid['is_profile']= true;
if ($rid['sqlConnect']->query("SELECT * FROM rid_account WHERE id = '$uid'")->num_rows < 1) {
    $rid['title']       = "404 NOT FOUND";
    $rid['description'] = "Looks like you lost in space!";
    $rid['content'] = rid_LoadPage('404/main');
    $rid['is_404'] = true;
} else {
    $anu = $rid['dataProfile'] = $rid['sqlConnect']->query("SELECT * FROM rid_account WHERE id = '$uid'")->fetch_assoc();
    if ($rid['dataProfile']['rid_username'] == $rid['dataUser']['rid_username']) {
        $anu2 = $rid['isOwnerUser'] = true;
    }
    $rid['title']       = $rid['dataProfile']['full_name'];
    $rid['keywords']    = $rid['dataProfile']['full_name'];
    $rid['description'] = $rid['dataProfile']['full_name'] . " On Social NETWORK!";
    $rid['content']     = rid_LoadPage('profile/main');
}