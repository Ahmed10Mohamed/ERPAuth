$(document).ready(function(){
    // Check all inputs with the same ID
    $(document).on('click', '.checkAll', function(){

        var main_id = $(this).attr('data-id');
        var checkboxes = $('.perm-' + main_id);
        var allChecked = checkboxes.length === checkboxes.filter(':checked').length;

        // Toggle based on current state
        checkboxes.prop('checked', !allChecked);
    });

});

$(document).ready(function(){
        $(document).on('click', '.col_type', function(){


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


        $(document).on('click', '.update_col', function(){

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


        $(document).on('click', '.delete_col', function(){

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
        $(document).on('click', '.check_custom_update_page', function(){
            var page = $(this).attr('data-page');
            var url = $(this).attr('data-url');
            var id = $(this).attr('data-id');
            var page_id = $(this).attr('data-page_id');
            var type = $(this).attr('data-type');

            console.log('Checkbox clicked:');
            console.log('page:', page, 'url:', url, 'id:', id, 'page_id:', page_id, 'type:', type);

            if ($(this).is(':checked')) {
                // If checked, make AJAX request and update the content
                $.ajax({
                    type: 'GET',
                    data: {
                        page: page,
                        id: id,
                        type: type
                    },
                    url: url,
                    success: function(data) {
                        console.log('AJAX success:', data);
                        if(type == 'update'){
                            $('#customPage-' + page_id).html(data).show();
                        } else {
                            $('#customPageDelete-' + page_id).html(data).show();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', status, error);
                    }
                });
            } else {
                // If unchecked, hide the element
                console.log('Checkbox unchecked');
                if(type == 'update'){
                    $('#customPage-' + page_id).hide();
                } else {
                    $('#customPageDelete-' + page_id).hide();
                }
            }
        });
    });


$(document).ready(function() {
    $('body').on('change', '.select_page', function() {
        var url = $(this).data('url');
        var id = $(this).val();

        $.ajax({
            type: 'GET',
            data: { id: id },
            url: url,
            success: function(data) {
                $('#page_data').html(data);
            },
            error: function(xhr) {
                // Handle any errors
                console.error(xhr.responseText);
            }
        });
    });
});



