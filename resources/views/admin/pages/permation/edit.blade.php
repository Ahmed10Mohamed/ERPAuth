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
                                       <div class="row">
                                       <div class="col-12 ">
                                        <h5>Role Permissions</h5>
                                        <!-- Permission table -->
                                        @foreach ($pages as $page)
                                            @php
                                                $custom_update = customs_updats_delete_page_permation($page->page_name,$data->id,'update');

                                                $custom_delete = customs_updats_delete_page_permation($page->page_name,$data->id,'delete');

                                            @endphp

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
                                                    <input class="form-check-input check_custom_update_page"
                                                        type="checkbox"
                                                        data-page_id="{{$page->page_name}}"
                                                        data-id="{{$page->id}}"
                                                        id="custom_update-{{$page->id}}"
                                                        data-type="update"
                                                        data-url="{{url('Dashboard/select-custom-update')}}"
                                                        name="permation[]"
                                                        data-page="{{$page->page_name}}"
                                                        value="customUpdate-{{$page->page_name}}"
                                                        {{ in_array("customUpdate-{$page->page_name}", $permations) ? 'checked' : '' }}
                                                        {{ !in_array("update-{$page->page_name}", $permations) ? 'disabled' : '' }}>

                                                        <label class="form-check-label" for="custom-{{$page->page_name}}"> Custom Update </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input delete_col perm-{{$page->id}} " data-id="{{$page->id}}"  type="checkbox" id="delete-{{$page->page_name}}"  name="permation[]" value="delete-{{$page->page_name}}" {{ in_array("delete-{$page->page_name}", $permations) ? 'checked' : '' }} >

                                                        <label class="form-check-label" for="delete-{{$page->page_name}}"> Delete </label>
                                                    </div>
                                                    <div class="form-check ">
                                                    <input class="form-check-input check_custom_update_page"
                                                        type="checkbox"
                                                        data-page_id="{{$page->page_name}}"
                                                        data-id="{{$page->id}}"
                                                        id="custom_delete-{{$page->id}}"
                                                        data-type="delete"
                                                        data-url="{{url('Dashboard/select-custom-update')}}"
                                                        name="permation[]"
                                                        data-page="{{$page->page_name}}"
                                                        value="customDelete-{{$page->page_name}}"
                                                        {{ in_array("customDelete-{$page->page_name}", $permations) ? 'checked' : '' }}
                                                        {{ !in_array("delete-{$page->page_name}", $permations) ? 'disabled' : '' }}>

                                                        <label class="form-check-label" for="custom-{{$page->page_name}}"> Custom Delete </label>

                                                    </div>
                                                </div>
                                                @if($custom_update)
                                                     @include('admin.pages.permation.custom_update_edit',['custom_update'=>$custom_update,'page'=>$page])
                                                     @else
                                                     <div class="row custom_page" id="customPage-{{$page->page_name}}"></div>
                                                     @endif
                                                     @if($custom_delete)
                                                     @include('admin.pages.permation.custom_delete_edit',['custom_delete'=>$custom_delete,'page'=>$page])
                                                     @else
                                                     <div class="row custom_page" id="customPageDelete-{{$page->page_name}}"></div>

                                                     @endif
                                            <hr>

                                        @endforeach




                                        </div>
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
<script src="{{asset('admin/js/permission.js')}}"></script>

@endsection
