
function fadeComment(){
    var state = $('#formAddComment').css('display');

    if (state === 'none') {
        $('#formAddComment').fadeIn('slow');
    }
    else if(state === 'block'){
        $('#formAddComment').fadeOut('slow');
    }
}

$('button[type="submit"]').on('click', function(evt){
    evt.preventDefault();

    var $title           = $('input[name="title"]'),
        $titleParent     = $title.parents('.form-group'),
        $titleHelp       = $title.parents('.form-group').find('.help-block'),
        titleValue       = $title.val(),
        titleError       = false,
        titleCondition   = [
            (titleValue.length === 0),
            (titleValue.length < 5),
            (titleValue.length > 130)
        ],
        titleResponseError   = [
            'Vous devez écrire un titre',
            'Le titre doit avoir minimum 5 caractères',
            'Le titre doit avoir maximum 130 caractères'
        ];

    for (var i = 0; i < titleCondition.length ; i++) {
        if (titleCondition[i]) {
            $titleParent.addClass('has-feedback has-error');
            $titleHelp.html(titleResponseError[i]);
            titleError = true;
            break;
        }
    }

    var $comment         = $('textarea[name="content"]'),
        $commentParent   = $comment.parents('.form-group'),
        $commentHelp     = $comment.parents('.form-group').find('.help-block'),
        commentValue     = $comment.val(),
        commentError     = false,
        commentCondition = [
            (commentValue.length === 0),
            (commentValue.length < 10),
            (commentValue.length > 300)
        ],
        commentResponseError = [
            'Vous devez écrire un commentaire',
            'Le commentaire doit avoir minimum 10 caractères',
            'Le commentaire doit avoir maximum 300 caractères'
        ];

    for (var i = 0; i < commentCondition.length ; i++) {
        if (commentCondition[i]) {
            $commentParent.addClass('has-feedback has-error');
            $commentHelp.html(commentResponseError[i]);
            commentError = true;
            break;
        }
    }

    if( titleError === false && commentError === false ){

        $titleParent.removeClass('has-feedback has-error');
        $titleHelp.html('');
        $commentParent.removeClass('has-feedback has-error');
        $commentHelp.html('');

        $title.parents('form').submit();
    }
    else{

        if( titleError === false ){
            $titleParent.removeClass('has-feedback has-error');
            $titleHelp.html('');
        }
        if( commentError === false ){

            $commentParent.removeClass('has-feedback has-error');
            $commentHelp.html('');

        }
    }

});