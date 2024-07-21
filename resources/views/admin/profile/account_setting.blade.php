@extends('admin.layout.main')

@section('content')
  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{translate('Account Settings')}} /</span> {{translate('Account')}}</h4>

      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column flex-md-row mb-4">
            <li class="nav-item">
              <a class="nav-link active" href="javascript:void(0);"
                ><i class="ti-xs ti ti-users me-1"></i> {{translate('Account')}}</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('Dashboard/Profile-Password')}}"
                ><i class="ti-xs ti ti-lock me-1"></i> {{translate('Security')}}</a
              >
            </li>
           

          </ul>
          <div class="card mb-4">
            <h5 class="card-header">{{translate('Profile Details')}}</h5>
            <!-- Account -->
            <form id="formAccountSettings" action="{{url('Dashboard/Update-profile')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
            <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">

                <img
                  src="@if(admin()->image !== null) {{asset(admin()->image)}} @else {{asset('backend/img/avatars/1.png')}} @endif"
                  alt="user-avatar"
                  class="d-block w-px-100 h-px-100 rounded"
                  id="uploadedAvatar"
                />
                <div class="button-wrapper">
                  <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                    <span class="d-none d-sm-block">{{translate('Upload new photo')}}</span>
                    <i class="ti ti-upload d-block d-sm-none"></i>
                    <input
                      name="image"
                      type="file"
                      id="upload"
                      class="account-file-input"
                      hidden
                      accept="image/png, image/jpeg"
                    />
                  </label>
                  {{-- <button type="button" class="btn btn-label-secondary account-image-reset mb-3">
                    <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Reset</span>
                  </button> --}}

                  <div class="text-muted">{{translate('Allowed JPG, GIF or PNG. Max size of 800K')}}</div>
                </div>
              </div>
            </div>

            <hr class="my-0" />
            <div class="card-body">
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">{{translate('Name')}}</label>
                    <input
                      class="form-control"
                      type="text"
                      id="name"
                      name="name"
                      value="{{admin()->name}}"
                      autofocus
                    />
                  </div>
                   <div class="mb-3 col-md-6">
                    <label for="user_name" class="form-label">{{translate('User Name')}}</label>
                    <input
                      class="form-control"
                      type="text"
                      id="user_name"
                      name="user_name"
                      value="{{admin()->user_name}}"
                      autofocus
                    />
                  </div>

                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">{{translate('E-Mail')}}</label>
                    <input
                      class="form-control"
                      type="text"
                      id="email"
                      name="email"
                      value="{{admin()->email}}"
                      placeholder="john.doe@example.com"
                    />
                  </div>

                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="phone"> {{translate('Phone')}}</label>
                    <div class="input-group input-group-merge">
                      <span class="input-group-text">{{translate('EGY')}} (+2)</span>
                      <input
                        type="text"
                        id="phone"
                        name="phone"
                        class="form-control"
                        placeholder="010 1589 1836"
                        value="{{admin()->phone}}"
                      />
                    </div>
                  </div>






                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">{{translate('Submit')}} </button>
                  <button type="reset" class="btn btn-label-secondary">{{translate('Reset')}}</button>
                </div>
            </div>
            </form>
            <!-- /Account -->
          </div>

        </div>
      </div>
    </div>
    <!-- / Content -->
@endsection
@section('js')
 <!-- Page JS -->
 <script src="{{asset('agent/js/pages-account-settings-account.js')}}"></script>
@endsection
