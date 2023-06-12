<?php
/* 
// +------------------------------------------------------------------------+
// | @author RIDPEDIA
// | @author_url 1: http://www.ridped.com
// | @author_email: ridahh23@gmail.com
// +------------------------------------------------------------------------+
*/
if ($f == 'create_post') {
    $myid = $rid['dataUser']['id'];
    $postText = $_POST['postText'];
    $time = time();
    $responya = array(
        "status"=> true,
        "html"=> "",
        "id"=> ""
    );
    $q = "INSERT INTO rid_posts VALUES (null, '$myid', 'text', '$time', '$postText')";
    if (!$rid['sqlConnect']->query($q)) {
        $responya['status'] = false;
    }
    $dataPost = $rid['datapost'] = $rid['sqlConnect']->query("SELECT * FROM rid_posts WHERE user_id = '$myid' ORDER BY id DESC LIMIT 1")->fetch_assoc();
    $responya['id'] = $rid['datapost']['id'];
    $rid['datauserpost'] = $rid['dataUser'];
    $responya['html'] = rid_loadPage('post/main');

    echo json_encode($responya);
    exit();
}