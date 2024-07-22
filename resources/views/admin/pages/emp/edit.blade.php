@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4 fw-bold"><span class="text-muted fw-light">Employee /</span>
                Edit Employee
            </h4>
            {{-- start row --}}
            <div class="mb-4 row">
                <!-- Browser Default -->
                <div class="mb-4 col-md mb-md-0">
                  <div class="card">
                    <h5 class="card-header">
                             Edit Employee

                    </h5>
                    <div class="card-body">

                      <form class="browser-default-validation" method="post" action="{{url('Dashboard/Employee/'.$data->id)}}" enctype="multipart/form-data">
                              {{csrf_field()}}
                                        <input type="hidden" name="_method" value="PUT" />

                                    <div class="row">

                                        {{-- Name--}}
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="name">Name <span style="color:#f00">*</span></label>
                                            <input type="text" class="form-control" value="{{$data->name}}" required name="name" id="name"  />

                                            </div>
                                        </div>

                                        {{-- user_name --}}
                                       <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="user_name">User Name <span style="color:#f00">*</span></label>
                                            <input type="text" class="form-control" value="{{$data->user_name}}" required name="user_name" id="user_name"  />

                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        {{-- Phone--}}
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="phone">Phone <span style="color:#f00">*</span></label>
                                            <input type="text" class="form-control" value="{{$data->phone}}" required name="phone" id="phone"  />

                                            </div>
                                        </div>

                                        {{-- email --}}
                                       <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="email">E-Mail <span style="color:#f00">*</span></label>
                                            <input type="email" class="form-control" value="{{$data->email}}" required name="email" id="email"  />

                                            </div>
                                        </div>

                                    </div>
                                        <hr>
                                           <span  style="color: #f00">Please Enter New Password If You Went To Change Password</span>

                                     <div class="row">

                                        {{-- Password--}}
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="password">New Password </label>
                                            <input type="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"   name="password" id="password"  />

                                            </div>
                                        </div>

                                        {{-- password_confirmation --}}
                                       <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="password_confirmation">Confirm Password </label>
                                            <input type="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"  name="password_confirmation" id="password_confirmation"  />

                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                                                     {{-- permation --}}
                  

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