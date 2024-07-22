@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4 fw-bold"><span class="text-muted fw-light">Permations /</span>
                Create Permation
            </h4>
            {{-- start row --}}
            <div class="mb-4 row">
                <!-- Browser Default -->
                <div class="mb-4 col-md mb-md-0">
                  <div class="card">
                    <h5 class="card-header">
                             Create Permation

                    </h5>
                    <div class="card-body">

                      <form class="browser-default-validation" method="post" action="{{route('Permation.store')}}" enctype="multipart/form-data">
                              {{csrf_field()}}



                                    <div class="row">


                                        {{-- Roles --}}
                                       <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="Roles">Select Role <span style="color:#f00">*</span></label>
                                                <select id="select2Basic" name="role_id" class="select2 form-select form-select-lg select2-hidden-accessible" data-allow-clear="true" data-select2-id="select2Basic" tabindex="-1" aria-hidden="true">
                                                            @foreach ($roles as $role )
                                                                <option value="{{$role->id}}" data-select2-id="{{$role->id}}" @selected($role->id == old('role_id')) >{{$role->name}}</option>

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
                                                        <input type="hidden" name="page[]" value="{{$page->page_name}}" >
                                                        <div class="d-flex">
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input checkAll" data-id="{{$page->id}}"  type="checkbox" id="all-{{$page->page_name}}" name="permation[]" value="all-{{$page->page_name}}" >
                                                                <label class="form-check-label" for="all-{{$page->page_name}}"> All </label>
                                                            </div>
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input perm-{{$page->id}} "  type="checkbox" id="read-{{$page->page_name}}" name="permation[]" value="read-{{$page->page_name}}" >
                                                                <label class="form-check-label" for="read-{{$page->page_name}}" > Read </label>
                                                            </div>
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input perm-{{$page->id}} "  type="checkbox" id="insert-{{$page->page_name}}" name="permation[]" value="insert-{{$page->page_name}}" >
                                                                <label class="form-check-label" for="insert-{{$page->page_name}}"> Insert </label>
                                                            </div>
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input perm-{{$page->id}} "  type="checkbox" id="update-{{$page->page_name}}" name="permation[]" value="update-{{$page->page_name}}" >
                                                                <label class="form-check-label" for="update-{{$page->page_name}}"> Update </label>
                                                            </div>
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input "  type="checkbox" id="custom-{{$page->page_name}}" name="permation[]" value="custom-{{$page->page_name}}" >
                                                                <label class="form-check-label" for="custom-{{$page->page_name}}"> Custom Update </label>

                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input perm-{{$page->id}} "  type="checkbox" id="delete-{{$page->page_name}}" name="permation[]" value="delete-{{$page->page_name}}" >
                                                                <label class="form-check-label" for="delete-{{$page->page_name}}"> Delete </label>
                                                            </div>
                                                        </div>
                                                        <div class="row custom_page" id="customPage-{{$page->id}}"></div>
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
    // Select All checkbox click
    const selectAll = document.querySelector('#selectAll'),
      checkboxList = document.querySelectorAll('[type="checkbox"]');
    selectAll.addEventListener('change', t => {
      checkboxList.forEach(e => {
        e.checked = t.target.checked;
      });
    });

</script>

@endsection
