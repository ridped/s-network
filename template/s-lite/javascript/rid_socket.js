// have any idea?
	
	// on typingg
	socket.on("typing", async function(data) {
            	if (!$(`.typing-indicator-${data.id_user}`).length) {
	                if (data.id_user == to_id) {
	                    $('.message-content-inner').append(`
	                            <div class="message-bubble typing-indicator-${data.id_user}">
	                    <div class="message-bubble-inner">
	                        <div class="message-avatar"><img src="https://waysender-v2.ridped.com/community/themes/waynetwork/img/logo.png?cache=523" alt=""></div>
	                        <div class="message-text">
	                            <!-- Typing Indicator -->
	                            <div class="typing-indicator">
	                                <span></span>
	                                <span></span>
	                                <span></span>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="clearfix"></div>
	                </div>`);
	                }
	                if (!$('.message-content').is(':hidden')) {
	                    document.getElementById('sound_typing').play();
	                }
		        }
            if (typeof lastmsg[data.id_user] === "undefined") {
		        lastmsg[data.id_user] = [
		            $(`#lastmsg-${data.id_user}`).html() ? $(`#lastmsg-head-${data.id_user}`).html() : ''
		        ]
	        }
	        $(`#chatid-${data.id_user}`).find('p').html(`Typing...`);
	        $(`#chatid-head-${data.id_user}`).find('p').html(`Typing...`);
            if (data.id_user == logged_id) return;
            typingTimeout = setTimeout(async function() { resetTyping(data.id_user, data.to_id) }, 3000);
    });

    socket.on('receivedMessage', function(data) {
        rid_appendTo(data.pesanya, data.from_id, data.name, data);
    });

function regisTyping(myid, userid) {
    clearTimeout(typingTimeout)
    socket.emit("typing", {
        id_user: myid,
        stat: true,
        to_id: userid,
        another: true,
        lastmsg: $(`#lastmsg-${userid}`).html() ? $(`#lastmsg-head-${userid}`).html() : ''
    });
}

function resetTyping(userid, myid) {
    //alert('she is typ');
    $(`#chatid-${userid}`).find('p').html(`${lastmsg[userid][0]}`);
    $(`#chatid-head-${userid}`).find('p').html(`${lastmsg[userid][0]}`);
    $(`.typing-indicator-${userid}`).remove();
}

async function rid_appendMe(pesanya, to_id, nm, first = false) {
    if (firstTime === true) {
        $('.rid_chats').append(`<li class="" id="chatid-${to_id}" onclick="rid_openMsg('${to_id}')">
    <a href="#">
        <div class="message-avatar"><i class="status-icon status-online"></i><img src="https://waysender-v2.ridped.com/community/themes/waynetwork/img/logo.png?cache=523" alt=""></div>
        <div class="message-by">
            <div class="message-by-headline">
                <h5>${nm}</h5>
            </div>
            <p id="lastmsg-${to_id}">You: ${pesanya}</p>
        </div
    </a>
</li>`);
        $('.rid_chathead').append(`<li class="" id="chatid-head-${to_id}"">
    <a href="#" rid-ajax="?link1=messages&uid=${to_id}">
        <div class="message-avatar"><i class="status-icon status-online"></i><img src="https://waysender-v2.ridped.com/community/themes/waynetwork/img/logo.png?cache=523" alt=""></div>
        <div class="message-by">
            <div class="message-by-headline">
                <h5>${nm}</h5>
            </div>
            <p id="lastmsg-${to_id}">You: ${pesanya}</p>
        </div
    </a>
</li>`);
        firstTime = false;
    }

    lastmsg[to_id] = [
        pesanya
    ]
    $('#form_msg').val('');
    $(`#chatid-${to_id}`).find('p').html(`You: ${pesanya}`);
    $(`#chatid-head-${to_id}`).find('p').html(`You: ${pesanya}`);
    $('.message-content-inner').append(`
<div class="message-bubble me">
    <div class="message-bubble-inner">
        <div class="message-avatar"><img src="https://waysender-v2.ridped.com/community/themes/waynetwork/img/logo.png?cache=523" alt=""></div>
        <div class="message-text ridmessage"><p>${pesanya}</p></div>
    </div>
    <div class="clearfix"></div>
</div>`);
    $(".simplebar-content").animate({ scrollTop: $('.ripple-effect').offset().top -100}, 1000);
    $(`#chatid-${to_id}`).prependTo('.rid_chats');
    $(`#chatid-head-${to_id}`).prependTo('.rid_chathead');
}

async function rid_appendTo(pesanya, t_id, name = "unknown", data = null) {
	document.getElementById('sound_new_msg').play();
    $(`.typing-indicator-${t_id}`).remove();
    if (!$(`#chatid-${t_id}`).length) {
        $('.rid_chats').append(`<li class="" id="chatid-${t_id}" onclick="rid_openMsg('${t_id}')">
    <a href="#">
        <div class="message-avatar"><i class="status-icon status-online"></i><img src="https://waysender-v2.ridped.com/community/themes/waynetwork/img/logo.png?cache=523" alt=""></div>
        <div class="message-by">
            <div class="message-by-headline">
                <h5>${data.from_name}</h5>
            </div>
            <p id="lastmsg-${t_id}">${pesanya}</p>
        </div
    </a>
</li>`);
        $('.rid_chathead').append(`<li class="" id="chatid-head-${t_id}"">
    <a href="#" rid-ajax="?link1=messages&uid=${t_id}">
        <div class="message-avatar"><i class="status-icon status-online"></i><img src="https://waysender-v2.ridped.com/community/themes/waynetwork/img/logo.png?cache=523" alt=""></div>
        <div class="message-by">
            <div class="message-by-headline">
                <h5>${data.from_name}</h5>
            </div>
            <p id="lastmsg-${t_id}">${pesanya}</p>
        </div
    </a>
</li>`);
        firstTime = false;
    }

    lastmsg[t_id] = [
        pesanya
    ];
    $(`#chatid-${t_id}`).find('p').html(`${pesanya}`);
    $(`#chatid-head-${t_id}`).find('p').html(`${pesanya}`);
    if (t_id == to_id) {
        $('.message-content-inner').append(`
    <div class="message-bubble">
        <div class="message-bubble-inner">
            <div class="message-avatar"><img src="https://waysender-v2.ridped.com/community/themes/waynetwork/img/logo.png?cache=523" alt=""></div>
            <div class="message-text ridmessage"><p>${pesanya}</p></div>
        </div>
        <div class="clearfix"></div>
    </div>`);
    }
    $(".simplebar-content").animate({ scrollTop: $('.ripple-effect').offset().top -100}, 1000);
    $(`#chatid-${t_id}`).prependTo('.rid_chats');
    $(`#chatid-head-${t_id}`).prependTo('.rid_chathead');
}