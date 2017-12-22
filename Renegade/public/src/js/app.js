$('.post').find('.interaction').find('.editpost').on('click',function(event){
    event.preventDefault();
    var $post=event.target.parentNode.parentNode.parentNode.childNodes[1].textContent;
    $('#editform').val($post);
    $('#editmodal').modal();
});