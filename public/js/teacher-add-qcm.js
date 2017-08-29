
$('button[type="submit"]').on('click', function(evt){
    evt.preventDefault();

    var $title           = $('input[name="title"]'),
        $titleParent     = $title.parents('.form-group'),
        $titleHelp       = $titleParent.find('.help-block'),
        titleValue       = $title.val(),
        titleError       = false,
        titleCondition   = [
            (titleValue.length === 0),
            (titleValue.length < 5),
            (titleValue.length > 130)
        ],
        titleResponseError   = [
            'Ce champs est requis',
            'Votre titre doit avoir minimum 5 caractères',
            'Votre titre doit avoir maximum 130 caractères'
        ];

    for (var i = 0; i < titleCondition.length ; i++) {
        if (titleCondition[i]) {
            $titleParent.addClass('has-feedback has-error');
            $titleHelp.html(titleResponseError[i]);
            titleError = true;
            break;
        }
    }

    var $class_level         = $('input[name="class_level"]'),
        $class_levelParent   = $class_level.parents('.form-group'),
        $class_levelHelp     = $class_levelParent.find('.help-block'),
        class_levelValue     = $('input[name=class_level]:checked').val(),
        class_levelError     = false,
        class_levelCondition = [
            (class_levelValue === 'null')
        ],
        class_levelResponseError = [
            'Ce champs est requis'
        ];

    for (var i = 0; i < class_levelCondition.length ; i++) {
        if (class_levelCondition[i]) {
            $class_levelParent.addClass('has-feedback has-error');
            $class_levelHelp.html(class_levelResponseError[i]);
            class_levelError = true;
            break;
        }
    }

    var $nb_question         = $('input[name="nb_question"]'),
        $nb_questionParent   = $nb_question.parents('.form-group'),
        $nb_questionHelp     = $nb_questionParent.find('.help-block'),
        nb_questionValue     = $nb_question.val(),
        nb_questionError     = false,
        nb_questionCondition = [
            (nb_questionValue.length === 0 && ((parseFloat(nb_questionValue) == parseInt(nb_questionValue)) && !isNaN(nb_questionValue)) ),
            ( !((parseFloat(nb_questionValue) == parseInt(nb_questionValue)) && !isNaN(nb_questionValue)) ),
            (parseInt(nb_questionValue) < 5),
            (parseInt(nb_questionValue) > 30)
        ],
        nb_questionResponseError = [
            'Ce champs est requis',
            'Ce champs doit être un entier numérique',
            'Le minimum de question doit être de 5',
            'Le maximum de question doit être de 30'
        ];

    for (var i = 0; i < nb_questionCondition.length ; i++) {
        if (nb_questionCondition[i]) {
            $nb_questionParent.addClass('has-feedback has-error');
            $nb_questionHelp.html(nb_questionResponseError[i]);
            nb_questionError = true;
            break;
        }
    }

    if( titleError === false && class_levelError === false && nb_questionError === false ){

        $titleParent.removeClass('has-feedback has-error');
        $titleHelp.html('');
        $class_levelParent.removeClass('has-feedback has-error');
        $class_levelHelp.html('');
        $nb_questionParent.removeClass('has-feedback has-error');
        $nb_questionHelp.html('');

        $title.parents('form').submit();
    }
    else{

        if( titleError === false ){
            $titleParent.removeClass('has-feedback has-error');
            $titleHelp.html('');
        }
        if( class_levelError === false ){
            $class_levelParent.removeClass('has-feedback has-error');
            $class_levelHelp.html('');
        }
        if( nb_questionError === false ){
            $nb_questionParent.removeClass('has-feedback has-error');
            $nb_questionHelp.html('');
        }
    }

});