@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4 fw-bold"><span class="text-muted fw-light">Permations /</span>
                Update Permation
            </h4>
            {{-- start row --}}
            <div class="mb-4 row">
                <!-- Browser Default -->
                <div class="mb-4 col-md mb-md-0">
                  <div class="card">
                    <h5 class="card-header">
                             Update Permation

                    </h5>
                    <div class="card-body">



                    <form class="browser-default-validation" method="post" action="{{url('Dashboard/Permation/'.$data->id)}}" enctype="multipart/form-data">
                              {{csrf_field()}}
                                        <input type="hidden" name="_method" value="PUT" />


                                    <div class="row">


                                        {{-- Roles --}}
                                       <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="Roles">Select Role <span style="color:#f00">*</span></label>
                                                <select id="select2Basic" name="role_id" class="select2 form-select form-select-lg select2-hidden-accessible" data-allow-clear="true" data-select2-id="select2Basic" tabindex="-1" aria-hidden="true">
                                                            @foreach ($roles as $role )
                                                                <option value="{{$role->id}}" data-select2-id="{{$role->id}}" @selected($role->id == old('role_id',$data->role_id)) >{{$role->name}}</option>

                                                            @endforeach
                                                        </select>
                                            </div>
                                        </div>

                                    </div>


                                    <hr>
                                       {{-- permission --}}
                                       <div class="col-12">
                                        <h5>Role Permissions</h5>
                                        <!-- Permission table -->
                                        @foreach ($pages as $page)
                                            <h4 class="text-nowrap fw-semibold"><span>Page Name:-</span>{{$page->page_name}}</h4>
                                            <input type="hidden" name="page[]" value="{{$page->page_name}}">
                                            <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input checkAll" data-id="{{$page->id}}" type="checkbox" id="all-{{$page->page_name}}" name="permation[]" value="all-{{$page->page_name}}" {{ in_array("all-{$page->page_name}", $permations) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="all-{{$page->page_name}}"> All </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input read_col perm-{{$page->id}}" type="checkbox" data-id="{{$page->id}}" id="read-{{$page->page_name}}" name="permation[]" value="read-{{$page->page_name}}" {{ in_array("read-{$page->page_name}", $permations) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="read-{{$page->page_name}}"> Read </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input perm-{{$page->id}}" type="checkbox" id="insert-{{$page->page_name}}" name="permation[]" value="insert-{{$page->page_name}}" {{ in_array("insert-{$page->page_name}", $permations) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="insert-{{$page->page_name}}"> Insert </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input update_col perm-{{$page->id}}" data-id="{{$page->id}}" type="checkbox" id="update-{{$page->page_name}}" name="permation[]" value="update-{{$page->page_name}}" {{ in_array("update-{$page->page_name}", $permations) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="update-{{$page->page_name}}"> Update </label>
                                                </div>
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input check_custom_update_page" type="checkbox" data-id="{{$page->id}}" id="custom_update-{{$page->id}}" data-url="{{url('Dashboard/select-custom-update')}}" name="permation[]" data-page="{{$page->page_name}}" value="customUpdate-{{$page->page_name}}" {{ in_array("customUpdate-{$page->page_name}", $permations) ? 'checked' : 'disabled'  }} >
                                                    <label class="form-check-label" for="custom-{{$page->page_name}}"> Custom Update </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input perm-{{$page->id}}" type="checkbox" id="delete-{{$page->page_name}}" name="permation[]" value="delete-{{$page->page_name}}" {{ in_array("delete-{$page->page_name}", $permations) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="delete-{{$page->page_name}}"> Delete </label>
                                                </div>
                                            </div>
                                                <div class="row custom_page" id="customPage-{{$page->id}}">
                                                @foreach (customs_updats_page_permation($page->page_name,$data->id) as $custom_update )
                                                        <h4 class="text-nowrap fw-semibold"><span>custom Update Of Page:-</span>{{$custom_update->page_custom}}</h4>
                                                        <input type="hidden" name="page_custom[]" value="{{$custom_update->page_custom}}" >
                                                        @if($custom_update->page_custom == 'products')
                                                            @include('admin.pages.permation.tables.edit_products',['custom_update'=>$custom_update])
                                                        @else
                                                            @include('admin.pages.permation.tables.edit_users_emp',['custom_update'=>$custom_update])
                                                        @endif
                                                        <div class="col-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="Roles">Select exp <span style="color:#f00">*</span></label>
                                                                <select name="exp[]" class=" form-select">

                                                                    <option value="=" data-select2-id="=" @if($custom_update->exp == '=') selected @endif >equal</option>
                                                                    <option value=">=" data-select2-id=">=" @if($custom_update->exp == '>=') selected @endif  >bigger</option>
                                                                    <option value="<=" data-select2-id="<=" @if($custom_update->exp == '<=') selected @endif  >smaller</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" class="form-control" value="{{old('db_type')}}" required name="db_type[]" id="db_type-{{$custom_update->db_type}}"  />

                                                            {{-- value--}}
                                                            <div class="col-4">
                                                                <div class="mb-3">
                                                                    <label class="form-label" for="value">value <span style="color:#f00">*</span></label>
                                                                <input type="text" class="form-control" value="{{old('value',$custom_update->value)}}" required name="value[]" id="value"  />

                                                                </div>
                                                            </div>

                                                    @endforeach


                                                </div>
                                            <hr>

                                        @endforeach




                                        </div>

                                       <!-- end permission -->

                        <br>


                        <br>

                          <div class="row">
                              <div class="col-12">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- /Browser Default -->


              </div>

            {{-- end --}}

        </div>
        <!-- Content -->
@endsection
@section('script')
<script>
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
            var dataType = selectedOption.data('type');
            var id = $(this).attr('data-id');
            // Output the value of data-type (for demonstration purposes)

            $('#db_type-'+id).val(dataType);
        });
    });

    $(document).ready(function(){


        $('.update_col').change(function() {
            var id = $(this).attr('data-id');

            if ($(this).is(':checked')) {

                $('#custom_update-'+id).prop('disabled',false);
                $('.custom_page').prop('disabled',false);
            }else{
                $('#custom_update-'+id).prop('disabled',true);
                $('#custom_update-'+id).prop('checked',false);
                $('#customPage-' + id).hide();
                $('.custom_page').prop('disabled',true);


            }

        });
    });



    $(document).ready(function() {
    $('body').on('change', '.check_custom_update_page', function() {
        var page = $(this).attr('data-page');
        var url = $(this).attr('data-url');
        var id = $(this).attr('data-id');

        if ($(this).is(':checked')) {
            // If checked, make AJAX request and update the content
            $.ajax({
                type: 'GET',
                data: {
                    page: page,
                    id: id
                },
                url: url,
                success: function(data) {
                    $('#customPage-' + id).html(data).show();

                }
            });
        } else {
            // If unchecked, hide the element
            $('#customPage-' + id).hide();


        }
    });
});


</script>



@endsection
