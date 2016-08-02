$('img.preview').click(function () {
    if ($(this).hasClass('imgBig')) {
        $(this).removeClass('imgBig');
    } else {
        $(this).addClass('imgBig');
    }
});
$('#menu').click(function () {
    var thisBlock = $(this).parent();
    if (thisBlock.hasClass('mini-left')) {
        $(this).removeClass('glyphicon-arrow-right');
        $(this).addClass('glyphicon-arrow-left');
        thisBlock.removeClass('mini-left');
        thisBlock.next().removeClass('col-md-12');
        thisBlock.next().addClass('col-md-10');
        thisBlock.next().removeClass('mini-right');
    } else {
        $(this).removeClass('glyphicon-arrow-left');
        $(this).addClass('glyphicon-arrow-right');
        thisBlock.addClass('mini-left');
        thisBlock.next().removeClass('col-md-10');
        thisBlock.next().addClass('col-md-12');
        thisBlock.next().addClass('mini-right');
    }
});
$('#img').change(function(e){
    var img = new Image(300);
    var reader = new FileReader();
    reader.readAsDataURL(e.target.files[0]);
    reader.onload = function(){
        img.src = reader.result;
    };
    $('#preview').append(img);

});