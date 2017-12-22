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
    postid=event.target.parentNode.parentNode.parentNode.dataset['postid'];
    var islike=event.target.previousElementSibling==null ? true : false;
    $.ajax({
        method:'POST',
        url:urllike,
        data:{isLike:islike,postId:postid,_token:token}
    })
    .done(function(){
        console.log('Like');

    });
});