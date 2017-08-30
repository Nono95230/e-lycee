
$('button[type="submit"]').on('click', function(evt){
    evt.preventDefault();

    var $username           = $('input[name="username"]'),
        $usernameParent     = $username.parents('.form-group'),
        $usernameHelp       = $username.parents('.form-group').find('.help-block'),
        usernameValue       = $username.val(),
        usernameError       = false,
        usernameCondition   = [
            (usernameValue.length === 0)
        ],
        usernameResponseError   = [
            'Ce champs est requis'
        ];

    for (var i = 0; i < usernameCondition.length ; i++) {
        if (usernameCondition[i]) {
            $usernameParent.addClass('has-feedback has-error');
            $usernameHelp.html(usernameResponseError[i]);
            usernameError = true;
            break;
        }
    }

    var $password         = $('input[name="password"]'),
        $passwordParent   = $password.parents('.form-group'),
        $passwordHelp     = $password.parents('.form-group').find('.help-block'),
        passwordValue     = $password.val(),
        passwordError     = false,
        passwordCondition = [
            (passwordValue.length === 0)
        ],
        passwordResponseError = [
            'Ce champs est requis'
        ];

    for (var i = 0; i < passwordCondition.length ; i++) {
        if (passwordCondition[i]) {
            $passwordParent.addClass('has-feedback has-error');
            $passwordHelp.html(passwordResponseError[i]);
            passwordError = true;
            break;
        }
    }




    if( usernameError === false && passwordError === false ){

        $usernameParent.removeClass('has-feedback has-error');
        $usernameHelp.html('');
        $passwordParent.removeClass('has-feedback has-error');
        $passwordHelp.html('');

        $username.parents('form').submit();
    }
    else{

        if( usernameError === false ){
            $usernameParent.removeClass('has-feedback has-error');
            $usernameHelp.html('');
        }
        if( passwordError === false ){
            $passwordParent.removeClass('has-feedback has-error');
            $passwordHelp.html('');
        }
    }

});