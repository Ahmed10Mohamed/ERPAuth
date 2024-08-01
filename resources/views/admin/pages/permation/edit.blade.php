@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4 fw-bold"><span class="text-muted fw-light">Permations /</span>
                Update
            </h4>
            {{-- start row --}}
            <div class="mb-4 row">
                <!-- Browser Default -->
                <div class="mb-4 col-md mb-md-0">
                  <div class="card">
                    <h5 class="card-header">
                             Update Permation role {{optional($data->role_info)->name}} - in page {{optional($data->page_info)->page_name}}

                    </h5>
                    <div class="card-body">



                    <form class="browser-default-validation" method="post" action="{{url('Dashboard/Permation/'.$data->id)}}" enctype="multipart/form-data">
                              {{csrf_field()}}
                                        <input type="hidden" name="_method" value="PUT" />

                                    <hr>
                                       {{-- permission --}}
                                       <div class="row">
                                       <div class="col-12 ">
                                        <h5>Role Permissions</h5>
                                                                              <!-- Permission table -->
                                            @php
                                                $custom_update = customs_updats_delete_page_permation(optional($data->page_info)->page_name,$data->id,'update');

                                                $custom_delete = customs_updats_delete_page_permation(optional($data->page_info)->page_name,$data->id,'delete');

                                            @endphp

                                            <h4 class="text-nowrap fw-semibold"><span>Page Name:-</span>{{optional($data->page_info)->page_name}}</h4>
                                            <input type="hidden" name="page_id" value="{{$data->page_id}}">
                                            <input type="hidden" name="role_id" value="{{$data->role_id}}">

                                                <div class="d-flex">
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input checkAll" data-id="{{$data->page_id}}" type="checkbox" id="all-{{optional($data->page_info)->page_name}}" >
                                                        <label class="form-check-label" for="all-{{optional($data->page_info)->page_name}}"> All </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input read_col perm-{{$data->page_id}}" type="checkbox" data-id="{{$data->page_id}}" id="read-{{optional($data->page_info)->page_name}}" name="is_read" value="1" @if($data->is_read) checked @endif >
                                                        <label class="form-check-label" for="read-{{optional($data->page_info)->page_name}}"> Read </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input perm-{{$data->page_id}}" type="checkbox" id="insert-{{optional($data->page_info)->page_name}}" name="is_create" value="1" value="1" @if($data->is_create) checked @endif>
                                                        <label class="form-check-label" for="insert-{{optional($data->page_info)->page_name}}"> Insert </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input update_col perm-{{$data->page_id}}" data-id="{{$data->page_id}}" type="checkbox" id="update-{{optional($data->page_info)->page_name}}" name="is_update" value="1" value="1" @if($data->is_update) checked @endif>
                                                        <label class="form-check-label" for="update-{{optional($data->page_info)->page_name}}"> Update </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input check_custom_update_page"
                                                        type="checkbox"
                                                        data-page_id="{{optional($data->page_info)->page_name}}"
                                                        data-id="{{$data->page_id}}"
                                                        id="custom_update-{{$data->page_id}}"
                                                        data-type="update"
                                                        data-url="{{url('Dashboard/select-custom-update')}}"
                                                        name="is_custom_update"
                                                        data-page="{{optional($data->page_info)->page_name}}"
                                                        value="1"
                                                         @if($data->is_custom_update) checked @endif
                                                         @if(!$data->is_update) disabled @endif>

                                                        <label class="form-check-label" for="custom-{{optional($data->page_info)->page_name}}"> Custom Update </label>
                                                    </div>
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input delete_col perm-{{$data->page_id}} " data-id="{{$data->page_id}}"  type="checkbox" id="delete-{{optional($data->page_info)->page_name}}"  name="is_delete" value="1" @if($data->is_delete) checked @endif >

                                                        <label class="form-check-label" for="delete-{{optional($data->page_info)->page_name}}"> Delete </label>
                                                    </div>
                                                    <div class="form-check ">
                                                    <input class="form-check-input check_custom_update_page"
                                                        type="checkbox"
                                                        data-page_id="{{optional($data->page_info)->page_name}}"
                                                        data-id="{{$data->page_id}}"
                                                        id="custom_delete-{{$data->page_id}}"
                                                        data-type="delete"
                                                        data-url="{{url('Dashboard/select-custom-update')}}"
                                                        name="is_custom_delete"
                                                        data-page="{{optional($data->page_info)->page_name}}"
                                                        value="1"
                                                        @if($data->is_custom_delete) checked @endif

                                                        @if(!$data->is_delete) disabled @endif >
                                                        <label class="form-check-label" for="custom-{{optional($data->page_info)->page_name}}"> Custom Delete </label>

                                                    </div>
                                                </div>
                                                @if($custom_update)
                                                     @include('admin.pages.permation.custom_update_edit',['custom_update'=>$custom_update,'page'=>optional($data->page_info)])
                                                     @else
                                                     <div class="row custom_page" id="customPage-{{optional($data->page_info)->page_name}}"></div>
                                                     @endif
                                                     @if($custom_delete)
                                                     @include('admin.pages.permation.custom_delete_edit',['custom_delete'=>$custom_delete,'page'=>optional($data->page_info)])
                                                     @else
                                                     <div class="row custom_page" id="customPageDelete-{{optional($data->page_info)->page_name}}"></div>

                                                     @endif
                                            <hr>







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
