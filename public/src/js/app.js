
var postId = 0;
var postBodyElement = null;

/* global token, url */

$('.post').find('.interaction').find('.edit').on('click', function (event) {
    event.preventDefault();

    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    postId =event.target.parentNode.parentNode.dataset['postid'];
    var postBody = postBodyElement.textContent;
   
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});

$('#modal-save').on('click' ,function(){
    $.ajax({
       method:'POST',
       url:urlEdit,
       data:{body: $('#post-body').val(),postId:postId,_token: token}
        
        
    })
            .done(function(msg){
              $(postBodyElement).text(msg['new_body']); 
    });
    
});

$('.like').on('click', function(event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, postId: postId, _token: token}
    })
        .done(function() {
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'Svidja ti se ovo' : 'Like' : event.target.innerText == 'Dislike' ? 'Ne svidja ti se ovo' : 'Dislike';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.previousElementSibling.innerText = 'Like';
            }
        });
});