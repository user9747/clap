var postid=-1;
var postBody=null;
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
    console.log(postid);
    $.ajax({
        method:'POST',
        url:likeurl,
        data:{isLike:isLike,postId: postid,_token:token}

    })
    .done(function() {
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.previousElementSibling.innerText = 'Like';
            }
    });
});
