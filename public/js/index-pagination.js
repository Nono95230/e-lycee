
function updatePaginationPerPage(){
    var perPage = parseInt( $('#perpage li.active').text() ),
        $pagination = $(".pagination:not(#perpage,#total)");

    $pagination.find("li").each(function(){

        var itemUrl = $(this).find('a').attr('href');

        if (itemUrl !== undefined) {
            itemUrl = itemUrl+'&perPage='+perPage;
            $(this).find('a').attr('href',itemUrl);
        }

    });
}
updatePaginationPerPage();