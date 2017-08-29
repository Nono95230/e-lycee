
$(".bootstrap-switch-label,.bootstrap-switch-handle-on,.bootstrap-switch-handle-off").on('click',publish);


function publish() {
    var $thisPublish = $(this).parent(".bootstrap-switch-container").parent(".bootstrap-switch-id-tete"),
        testPublish = $thisPublish.hasClass('bootstrap-switch-on');
        //console.log($thisPublish.find('input[type="checkbox"]').attr('name'));

    if (testPublish) {//For Unpublished
        $thisPublish.removeClass('bootstrap-switch-on').addClass('bootstrap-switch-off');
        $thisPublish.find('input[type="checkbox"]').prop('checked', false);
        $thisPublish.find('form').submit();
    }
    else{//For Published
        $thisPublish.removeClass('bootstrap-switch-off').addClass('bootstrap-switch-on');
        $thisPublish.find('input[type="checkbox"]').prop('checked', true);
        $thisPublish.find('form').submit();
    }
}