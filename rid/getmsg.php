<?php
/* 
// +------------------------------------------------------------------------+
// | @author RIDPEDIA
// | @author_url 1: http://www.ridped.com
// | @author_email: ridahh23@gmail.com
// +------------------------------------------------------------------------+
*/
if ($f == 'getmsg') {
    $data = array(
        "status"=> true,
        "html"=> "",
        "data_c_with"=> "",
        "redirect"=> false
    );
    $myId = $rid['dataUser']['id'];
    $userid = $_GET['c_with'];
    $dataU = $rid['data_c_with'] = getDataUser($_GET['c_with']);
    if ($rid['data_c_with'] !== false) {
        $u_fullName = $rid['data_c_with']['full_name'];
        $data['html'] = rid_LoadPage('messages/chat_heading');
        $data['data_c_with'] = $rid['data_c_with'];
        $data['html'] .= '<div class="message-content-scrolbar" data-simplebar>';
        $data['html'] .= '<div class="message-content-inner">';
        if (getMsgs($_GET['c_with'], $rid['dataUser']['id'], 1)) {
            $datapesan = getMsgs($_GET['c_with'], $rid['dataUser']['id'], 5, "DESC");
            while($row = mysqli_fetch_assoc($datapesan)) {
                $rid['data_chat'] = $row;
                $data['html'] .= rid_LoadPage('messages/data_chat');
            }
        } else {
            $data['status'] = false;
            $data['html'] .= "<em>Say hello to $u_fullName for the first time</em>";
        }
        $data['html'] .= "</div>";
        $data['html'] .= rid_LoadPage('messages/form');
        $data['html'] .= "</div>";
    } else {
        $data['redirect'] = true;
    }

    echo json_encode($data);

    exit();
}