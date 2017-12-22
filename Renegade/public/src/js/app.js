var postid=-1;
$('.post').find('.interaction').find('.editpost').on('click',function(event){
    event.preventDefault();
    var $post=event.target.parentNode.parentNode.parentNode.childNodes[1].textContent;
    postid=event.target.parentNode.parentNode.parentNode.dataset['postid'];
    $('#editform').val($post);
    $('#editmodal').modal();
});
$('#modal-save').on('click',function(){
    $.ajax({
        method:'POST',
        url:url,
        data:{body:$('#editform').val(),postId: postid,_token:token}

    })
        .done(function(msg){
            console.log(msg['message']);
        });
});