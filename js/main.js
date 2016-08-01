$('img.preview').click(function () {
    if ($(this).hasClass('imgBig')) {
        $(this).removeClass('imgBig');
    } else {
        $(this).addClass('imgBig');
    }
})