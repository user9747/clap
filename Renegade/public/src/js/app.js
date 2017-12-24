var postid=-1;
var postBody=null;
var msg=null;
$('.post').find('.interaction').find('.editpost').on('click',function(event){
    event.preventDefault();
    postBody=event.target.parentNode.parentNode.parentNode.childNodes[1]
    var post=postBody.textContent;
    postid=event.target.parentNode.parentNode.parentNode.dataset['postid'];
    $('#editform').val(post);
    $('#editmodal').modal();
});
$('#modal-save').on('click',function(){
    $.ajax({
        method:'POST',
        url:url,
        data:{body:$('#editform').val(),postId: postid,_token:token}

    })
        .done(function(msg){

            $(postBody).text(msg['new_body']);
            $('#editmodal').modal('hide');
        });
});
$('.like').on('click',function(event){
    event.preventDefault();
    var postid=event.target.parentNode.parentNode.parentNode.dataset['postid'];
    var isLike=event.target.previousElementSibling==null;

    $.ajax({
        method:'POST',
        url:likeurl,
        data:{isLike:isLike,postId: postid,_token:token}

    })
    .done(function(msg) {
            
            event.target.innerText = isLike ? event.target.innerText == (msg['number']-1)+' Like'?msg['number']+' You liked this post' :msg['number']+' Like' : event.target.innerText == (msg['dislikes']-1)+' Dislike' ? msg['dislikes']+' You disliked this post':msg['dislikes']+' Dislike';
            if (isLike) {
                event.target.nextElementSibling.innerText = msg['dislikes']+' Dislike';
            } else {
                event.target.previousElementSibling.innerText = msg['number']+' Like';
            }
    });
});
