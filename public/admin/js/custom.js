$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
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

            if(data.statusType)
            {

                toastr.success('Addedd Success')
                $('#ajsuform_yu').empty();
                location.reload();


            }
            else
            {
                toastr.error(data.errors,'Opps!')
                $('#ajsuform_yu').empty();


            }
        }
    });
    return false;
});


$('body').on('submit', '.ajsuformreloadedit', function(e){
    e.preventDefault();
    var num = $(this).attr('data-num');
    $('#ajsuform_yu_'+num).empty();
    $('#ajsuform_yu_'+num).html('<div class="fa-2x"><i class="fas fa-spinner fa-spin"></i></div>');
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
                $('#ajsuform_yu_'+num).html('<div class="alert alert-danger">'+value+'</div>');
            });
        },
        success: function(data)
        {
            if(data.statusType)
            {
                toastr.success('Updates Success')
                $('#ajsuform_yu').empty();
                location.reload();

            }
            else
            {
                toastr.error(data.errors,'Opps!')
                $('#ajsuform_yu').empty();
            }
        }
    });
    return false;
});