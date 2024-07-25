$(document).ready(function(){
    // Check all inputs with the same ID
    $('.checkAll').click(function(){
        var main_id = $(this).attr('data-id');
        var checkboxes = $('.perm-' + main_id);
        var allChecked = checkboxes.length === checkboxes.filter(':checked').length;

        // Toggle based on current state
        checkboxes.prop('checked', !allChecked);
    });

});

$(document).ready(function(){
    $('body').on('change', '.col_type', function() {

        // Get the selected option
        var selectedOption = $(this).find('option:selected');
        // Get the data-type attribute of the selected option
        var pageType = selectedOption.data('pagetype');
        var dataType = selectedOption.data('type');
        var id = $(this).attr('data-id');
        // Output the value of data-type (for demonstration purposes)
        $('#db_type-'+pageType+'-'+id).val(dataType);
    });
});

$(document).ready(function(){


    $('.update_col').change(function() {
        var id = $(this).attr('data-id');

        if ($(this).is(':checked')) {

            $('#custom_update-'+id).prop('disabled',false);
        }else{
            $('#custom_update-'+id).prop('disabled',true);
            $('#custom_update-'+id).prop('checked',false);
            $('#customPage-' + id).hide();

        }

    });
});

$(document).ready(function(){


    $('.delete_col').change(function() {
        var id = $(this).attr('data-id');

        if ($(this).is(':checked')) {

            $('#custom_delete-'+id).prop('disabled',false);
        }else{
            $('#custom_delete-'+id).prop('disabled',true);
            $('#custom_delete-'+id).prop('checked',false);
            $('#customPageDelete-' + id).hide();

        }

    });
    });



$(document).ready(function() {
$('body').on('change', '.check_custom_update_page', function() {
    var page = $(this).attr('data-page');
    var url = $(this).attr('data-url');
    var id = $(this).attr('data-id');
    var page_id = $(this).attr('data-page_id');

    var type = $(this).attr('data-type');

    if ($(this).is(':checked')) {
        // If checked, make AJAX request and update the content
        $.ajax({
            type: 'GET',
            data: {
                page: page,
                id: id,
                type:type,
            },
            url: url,
            success: function(data) {
                if(type == 'update'){
                    $('#customPage-' + page_id).html(data).show();
                }else{
                    $('#customPageDelete-' + page_id).html(data).show();

                }

            }
        });
    } else {
        // If unchecked, hide the element
            if(type == 'update'){
                $('#customPage-' + page_id).hide();
            }else{
                $('#customPageDelete-' + page_id).hide();

            }


    }
});
});
