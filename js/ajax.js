/**
 * Created by dneprEC-71 on 04.08.2016.
 */
var fields = $('[class*=product_]');
var saveChanges = function () {
    var currentFieldValue = $('#active_field').val();
    var currentField = $('#active_field').attr('name');
    var id = $('#active_field').data('id');
    $.ajax({
        url: 'ajax/product_edit.php',
        type: 'POST',
        data: {
            id: id,
            edit: true,
            field: currentField,
            value: currentFieldValue
        },
        success: function (e) {
            console.log(e);
            var response = JSON.parse(e);
            if (response.result) {
                var span = $('#active_field').prev();
                $('#active_field').remove();
                span.show();
                span.text(response.value);
            }
            if (response.value == 'error') {
                $('#active_field').parent().addClass('has-error');
            }
        }
    })
};

$(document).ready(
    function () {
        fields.dblclick(function (e) {
                if (e.currentTarget.className != 'product_category') {
                    var span = this;
                    $(span).hide();
                    var form = '<input name="' + e.currentTarget.className + '" data-id="' + e.currentTarget.dataset['id'] + '" id="active_field" size="1" class="form-control">';
                    $(span).parent().append(form);
                    $('#active_field').focusout(saveChanges);
                    $('#active_field').keydown(function (e) {
                        if (e.key == 'Enter') {
                            saveChanges();
                        }
                        if (e.key == 'Escape'){
                            $('#active_field').remove();
                            $(span).show();
                        }
                    });
                }
            }
        )
    }
);

