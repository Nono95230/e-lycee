
$('button[type="submit"]').on('click', function(evt){
    evt.preventDefault();

    var $title           = $('input[name="title"]'),
        $titleParent     = $title.parents('.form-group'),
        $titleHelp       = $title.parents('.form-group').find('.help-block'),
        titleValue       = $title.val(),
        titleError       = false,
        titleCondition   = [
            (titleValue.length === 0),
            (titleValue.length > 130)
        ],
        titleResponseError   = [
            'Ce champs est requis',
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

    var $abstract          = $('textarea[name="abstract"]'),
        $abstractParent    = $abstract.parents('.form-group'),
        $abstractHelp      = $abstract.parents('.form-group').find('.help-block'),
        abstractValue     = $abstract.val(),
        abstractError     = false,
        abstractCondition = [
            (abstractValue.length === 0),
            (abstractValue.length < 50),
            (abstractValue.length > 200)
        ],
        abstractResponseError = [
            'Ce champs est requis',
            'Le résumé de l\'article doit avoir minimum 50 caractères',
            'Le résumé de l\'article doit avoir maximum 200 caractères'
        ];

    for (var i = 0; i < abstractCondition.length ; i++) {
        if (abstractCondition[i]) {
            $abstractParent.addClass('has-feedback has-error');
            $abstractHelp.html(abstractResponseError[i]);
            abstractError = true;
            break;
        }
    }

    var $content         = $('textarea[name="content"]'),
        $contentParent   = $content.parents('.form-group'),
        $contentHelp     = $content.parents('.form-group').find('.help-block'),
        contentValue     = $content.val(),
        contentError     = false,
        contentCondition = [
            (contentValue.length === 0),
            (contentValue.length < 100)
        ],
        contentResponseError = [
            'Ce champs est requis',
            'Le contenu de l\'article doit avoir minimum 100 caractères'
        ];

    for (var i = 0; i < contentCondition.length ; i++) {
        if (contentCondition[i]) {
            $contentParent.addClass('has-feedback has-error');
            $contentHelp.html(contentResponseError[i]);
            contentError = true;
            break;
        }
    }


    var $url_thumbnail         = $('input[name="url_thumbnail"]'),
        $url_thumbnailParent   = $url_thumbnail.parents('.form-group'),
        $url_thumbnailHelp     = $url_thumbnail.parents('.form-group').find('.help-block'),
        url_thumbnailValue     = $url_thumbnail.val(),
        url_thumbnailError     = false,
        url_thumbnailCondition = [
            (url_thumbnailValue.length === 0)
        ],
        url_thumbnailResponseError = [
            'Ce champs est requis'
        ];

    for (var i = 0; i < url_thumbnailCondition.length ; i++) {
        if (url_thumbnailCondition[i]) {
            $url_thumbnailParent.addClass('has-feedback has-error');
            $url_thumbnailHelp.html(url_thumbnailResponseError[i]);
            url_thumbnailError = true;
            break;
        }
    }



    if( titleError === false && abstractError === false && contentError === false && url_thumbnailError === false ){

        $titleParent.removeClass('has-feedback has-error');
        $titleHelp.html('');
        $abstractParent.removeClass('has-feedback has-error');
        $abstractHelp.html('');
        $contentParent.removeClass('has-feedback has-error');
        $contentHelp.html('');
        $url_thumbnailParent.removeClass('has-feedback has-error');
        $url_thumbnailHelp.html('');

        $title.parents('form').submit();
    }
    else{

        if( titleError === false ){
            $titleParent.removeClass('has-feedback has-error');
            $titleHelp.html('');
        }
        if( abstractError === false ){
            $abstractParent.removeClass('has-feedback has-error');
            $abstractHelp.html('');
        }
        if( contentError === false ){
            $contentParent.removeClass('has-feedback has-error');
            $contentHelp.html('');
        }
        if( url_thumbnailError === false ){
            $url_thumbnailParent.removeClass('has-feedback has-error');
            $url_thumbnailHelp.html('');
        }
    }

});