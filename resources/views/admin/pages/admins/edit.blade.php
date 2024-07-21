@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4 fw-bold"><span class="text-muted fw-light">Admins /</span>
                Edit Admin
            </h4>
            {{-- start row --}}
            <div class="mb-4 row">
                <!-- Browser Default -->
                <div class="mb-4 col-md mb-md-0">
                  <div class="card">
                    <h5 class="card-header">
                             Edit Admin

                    </h5>
                    <div class="card-body">

                      <form class="browser-default-validation" method="post" action="{{url('Dashboard/admins/'.$data->id)}}" enctype="multipart/form-data">
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
                        <div class="col-12">
                          <h5>{{translate('Role Permissions')}}</h5>
                          <!-- Permission table -->
                          <div class="table-responsive">
                            <table class="table table-flush-spacing">
                              <tbody>
                                <tr>
                                  <td class="text-nowrap fw-semibold">

                                    {{translate('Administrator Access')}}
                                    <i
                                      class="ti ti-info-circle"
                                      data-bs-toggle="tooltip"
                                      data-bs-placement="top"
                                      title="Allows a full access to the system"
                                    ></i>
                                  </td>
                                  <td>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="selectAll" />
                                      <label class="form-check-label" for="selectAll"> {{translate('Select All')}} </label>
                                    </div>
                                  </td>
                                </tr>
                                @foreach (get_all_permissions() as $title_name => $title)
                                    <tr>
                                        @foreach ($title as $key => $value)
                                            <td>
                                                <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" @if(permission_checker($data->id, $key)) checked @endif name="permission[]" type="checkbox" value="{{$key}}" id="{{$key}}" />
                                                    <label class="form-check-label" for="{{$key}}"> {{$value}} </label>
                                                </div>


                                                </div>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach

                              </tbody>
                            </table>
                          </div>
                          <!-- Permission table -->
                        </div>


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
