@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4 fw-bold"><span class="text-muted fw-light">Admins /</span>
                Create Admin
            </h4>
            {{-- start row --}}
            <div class="mb-4 row">
                <!-- Browser Default -->
                <div class="mb-4 col-md mb-md-0">
                  <div class="card">
                    <h5 class="card-header">
                             Create Admin

                    </h5>
                    <div class="card-body">

                      <form class="browser-default-validation" method="post" action="{{route('admins.store')}}" enctype="multipart/form-data">
                              {{csrf_field()}}

                                    <div class="row">

                                        {{-- Name--}}
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="name">Name <span style="color:#f00">*</span></label>
                                            <input type="text" class="form-control" value="{{old('name')}}" required name="name" id="name"  />

                                            </div>
                                        </div>

                                        {{-- user_name --}}
                                       <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="user_name">User Name <span style="color:#f00">*</span></label>
                                            <input type="text" class="form-control" value="{{old('user_name')}}" required name="user_name" id="user_name"  />

                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        {{-- Phone--}}
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="phone">Phone <span style="color:#f00">*</span></label>
                                            <input type="text" class="form-control" value="{{old('phone')}}" required name="phone" id="phone"  />

                                            </div>
                                        </div>

                                        {{-- email --}}
                                       <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="email">E-Mail <span style="color:#f00">*</span></label>
                                            <input type="email" class="form-control" value="{{old('email')}}" required name="email" id="email"  />

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                            {{-- Roles --}}
                                       <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="Roles">Select Role <span style="color:#f00">*</span></label>
                                                <select id="select2Basic" name="permition_id" class="select2 form-select form-select-lg select2-hidden-accessible" data-allow-clear="true" data-select2-id="select2Basic" tabindex="-1" aria-hidden="true">
                                                            @foreach ($permitions as $permition )
                                                                <option value="{{$permition->id}}" data-select2-id="{{$permition->id}}" @selected($permition->id == old('permition_id')) >{{optional($permition->role_info)->name}}</option>

                                                            @endforeach
                                                        </select>
                                            </div>
                                        </div>
                                    </div>

                                     <div class="row">

                                        {{-- Password--}}
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="password">Password <span style="color:#f00">*</span></label>
                                            <input type="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required name="password" id="password"  />

                                            </div>
                                        </div>

                                        {{-- password_confirmation --}}
                                       <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="password_confirmation">Confirm Password <span style="color:#f00">*</span></label>
                                            <input type="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"  required name="password_confirmation" id="password_confirmation"  />

                                            </div>
                                        </div>

                                    </div>
                                    <hr>



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
