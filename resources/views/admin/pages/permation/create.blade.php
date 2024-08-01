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
                                                <select class="select2 form-select select2-hidden-accessible " name="role_id" data-allow-clear="true" data-select2-id="collapsible-state" tabindex="-1" aria-hidden="true" required>

                                                <option value="">Select Role</option>
                                                            @foreach ($roles as $role )
                                                                <option value="{{$role->id}}" data-select2-id="{{$role->id}}" @selected($role->id == old('role_id')) >{{$role->name}}</option>

                                                            @endforeach
                                                        </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="Page">Select Page <span style="color:#f00">*</span></label>

                                                <select class="select2 form-select select2-hidden-accessible select_page" name="page_id" data-allow-clear="true" data-select2-id="collapsible-state" tabindex="-1" aria-hidden="true" required data-url="{{ route('PageSelect') }}">
                                                <option value="">Select Page</option>
                                                    @foreach ($pages as $page)
                                                        <option value="{{ $page->id }}" data-select2-id="{{ $page->id }}" @selected($page->id == old('page_id'))>
                                                            {{ $page->page_name }}
                                                        </option>
                                                    @endforeach
                                                </select>


                                            </div>
                                        </div>

                                    </div>


                                    <hr>
                                    <div id="page_data"></div>

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
