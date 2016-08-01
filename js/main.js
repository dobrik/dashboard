$('img.preview').click(function () {
    if ($(this).hasClass('imgBig')) {
        $(this).removeClass('imgBig');
    } else {
        $(this).addClass('imgBig');
    }
});
$('#menu').click(function () {
    console.log($(this).parent().css({'margin-left':'-12%'}));
});