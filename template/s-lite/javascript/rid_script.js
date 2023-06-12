// bad idea
var username, uid, countMsg, countNotif, is_page, logged_id, to_id, typingTimeout, lastmsg, firstTime, is_page;
typingTimeout = false;
logged_id = getCookie("USERID");
to_id = false;
firstTime = false;
lastmsg = lastmsg ? lastmsg : {};
typingTimeout = typingTimeout ? typingTimeout : {};

// get cookie
function getCookie(name) {
    var cookieArr = document.cookie.split(";");
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        if(name == cookiePair[0].trim()) {
            return decodeURIComponent(cookiePair[1]);
        }
    }
    return null;
}

// Create a new post
$(document).on('click', 'a[create_post]', function(e) {
    e.preventDefault();
    $('.btn-create-post').prop('disabled', true);
    let postText = $('.rid-text-post').val();
    if (postText.length < 1) {
        alert('Text must be filled!');
    } else {
        $.post(rid_requestFile() + '?f=create_post', {
            postText: postText
        }).done(function(data) {
            var ridCans = JSON.parse(data);
            if (ridCans.status === false) return alert('Something wrong!');
            $('.rid-text-post').val('');
            $('.btn-create-post').prop('disabled', false);
            $('#create-post-modal').even().removeClass('uk-open');
            $('.all-post').append(ridCans.html)
            $(`.post-id-${ridCans.id}`).insertAfter('.form-create-post');
        });
    }
});

// liked post
function rid_LikePost(post_id) {
    alert('Coming soon!');
}
// any idea??