$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function() {

    $('body').on('change', '#property-purpose', function() {
        var purpose = $(this).val();
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'Get',
            data: {
                purpose: purpose
            },
            url: url ,
            success: function(data) {
                $('.property_type').html(data);
            }
        });
        return false;
    });

    // property details
    $('body').on('change', '.property_type', function() {
        var property_type = $(this).val();
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'Get',
            data: {
                property_type: property_type
            },
            url: url ,
            success: function(data) {
                $('.property_details_feature').html(data);
            }
        });
        return false;
    });

    $('body').on('change', '.rent_type', function() {
        var rent_type = $(this).val();
        var url = $(this).attr('data-url');
        $.ajax({
            type: 'Get',
            data: {
                rent_type: rent_type
            },
            url: url ,
            success: function(data) {
                $('.data_rent_type').html(data);
            }
        });
        return false;
    });
});

$('body').on('submit', '#ajsuformreload', function(e){

    e.preventDefault();
    $('#ajsuform_yu').empty();
    $('#ajsuform_yu').html('<div class="fa-2x"><i class="fas fa-spinner fa-spin"></i></div>');
    var action = $(this).attr('action');
    var formData = new FormData($(this)[0]);
    $.ajax({
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        url: action,
        error: function(data) {
            jQuery.each(data.errors, function(key, value){
                $('#ajsuform_yu').html('<div class="alert alert-danger">'+value+'</div>');
            });
        },
        success: function(data)
        {

            if(data.success)
            {
                // $('#msgs_content').html(data.view).fadeIn(500, scrollDown);

                $('#msgs_content').html(data.view).fadeIn(100, scrollDown);

                $('#ajsuform_yu').empty();
                $('#reply_data').val('');

                // $('#ajsuform_yu').html('<div class="alert alert-success">تم اضافه الرساله بنجاح</div>');

            }
            else
            {

                $('#ajsuform_yu').html('<div class="alert alert-danger">'+data.errors+'</div>');
            }
        }
    });
    return false;
});
function scrollDown() {
    $('#msgs_content').animate({scrollTop: $('#msgs_content').prop("scrollHeight")}, 2000);
  }
