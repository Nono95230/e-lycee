
$('button[type="submit"]').on('click', function(evt){
    evt.preventDefault();

    var $email           = $('input[name="email"]'),
        $emailParent     = $email.parents('.form-group'),
        $emailHelp       = $email.parents('.form-group').find('.help-block'),
        emailValue       = $email.val(),
        emailError       = false,
        emailCondition   = [
            (emailValue.length === 0),
            (emailValue.length < 10)
        ],
        emailResponseError   = [
            'Ce champs est requis',
            'Votre email doit avoir minimum 10 caractères'
        ];

    for (var i = 0; i < emailCondition.length ; i++) {
        if (emailCondition[i]) {
            $emailParent.addClass('has-feedback has-error');
            $emailHelp.html(emailResponseError[i]);
            emailError = true;
            break;
        }
    }

    var $subject         = $('input[name="subject"]'),
        $subjectParent   = $subject.parents('.form-group'),
        $subjectHelp     = $subject.parents('.form-group').find('.help-block'),
        subjectValue     = $subject.val(),
        subjectError     = false,
        subjectCondition = [
            (subjectValue.length === 0),
            (subjectValue.length > 100)
        ],
        subjectResponseError = [
            'Ce champs est requis',
            'Le sujet doit avoir maximum 100 caractères'
        ];

    for (var i = 0; i < subjectCondition.length ; i++) {
        if (subjectCondition[i]) {
            $subjectParent.addClass('has-feedback has-error');
            $subjectHelp.html(subjectResponseError[i]);
            subjectError = true;
            break;
        }
    }

    var $comment         = $('textarea[name="commentaire"]'),
        $commentParent   = $comment.parents('.form-group'),
        $commentHelp     = $comment.parents('.form-group').find('.help-block'),
        commentValue     = $comment.val(),
        commentError     = false,
        commentCondition = [
            (commentValue.length === 0),
            (commentValue.length > 1000)
        ],
        commentResponseError = [
            'Ce champs est requis',
            'Le commentaire doit avoir maximum 1000 caractères'
        ];

    for (var i = 0; i < commentCondition.length ; i++) {
        if (commentCondition[i]) {
            $commentParent.addClass('has-feedback has-error');
            $commentHelp.html(commentResponseError[i]);
            commentError = true;
            break;
        }
    }



    if( emailError === false && subjectError === false && commentError === false ){

        $emailParent.removeClass('has-feedback has-error');
        $emailHelp.html('');
        $subjectParent.removeClass('has-feedback has-error');
        $subjectHelp.html('');
        $commentParent.removeClass('has-feedback has-error');
        $commentHelp.html('');

        $email.parents('form').submit();
    }
    else{

        if( emailError === false ){
            $emailParent.removeClass('has-feedback has-error');
            $emailHelp.html('');
        }
        if( subjectError === false ){
            $subjectParent.removeClass('has-feedback has-error');
            $subjectHelp.html('');
        }
        if( commentError === false ){
            $commentParent.removeClass('has-feedback has-error');
            $commentHelp.html('');
        }
    }

});