<?php
class ridCans {
	public $rid;

	function getLastMsg($from_id, $to_id) {
		echo $this->ridData['sqlConnect']->query("SELECT * FROM rid_messages WHERE from_id = '$from_id' AND to_id = '$to_id' ORDER BY id DESC LIMIT 1");
	}

	function getChats() {
		$uid = $this->ridData['dataUser']['id'];
		echo $this->ridData['sqlConnect']->query("SELECT * FROM rid_chats WHERE id_user = '$uid' ORDER BY id DESCT LIMIT 10");
	}
}
?>