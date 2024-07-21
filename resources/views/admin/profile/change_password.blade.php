@extends('admin.layout.main')

@section('content')
 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{translate('Account Settings')}} /</span> {{translate('Security')}}</h4>

      <div class="row">
        <div class="col-md-12">
          <ul class="nav nav-pills flex-column flex-md-row mb-4">
            <li class="nav-item">
              <a class="nav-link" href="{{url('Dashboard/profile')}}"
                ><i class="ti-xs ti ti-users me-1"></i> {{translate('Account')}}</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="javascript:void(0);"
                ><i class="ti-xs ti ti-lock me-1"></i> {{translate('Security')}}</a
              >
            </li>
          

          </ul>
          <!-- Change Password -->
          <div class="card mb-4">
            <h5 class="card-header">{{translate('Change Password')}}</h5>
            <div class="card-body">
              <form id="formAccountSettings" method="POST" action="{{url('Dashboard/update_password')}}">
                {{csrf_field()}}
                <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                    <label class="form-label" for="currentPassword">{{translate('Current Password')}}</label>
                    <div class="input-group input-group-merge has-validation">
                        <input class="form-control" type="password" name="current_password" id="currentPassword" placeholder="············">
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div><div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="newPassword">{{translate('New Password')}}</label>
                    <div class="input-group input-group-merge">
                      <input
                        class="form-control"
                        type="password"
                        id="newPassword"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      />
                      <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                  </div>

                  <div class="mb-3 col-md-6 form-password-toggle">
                    <label class="form-label" for="password_confirmation">{{translate('Confirm New Password')}}</label>
                    <div class="input-group input-group-merge">
                      <input
                        class="form-control"
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      />
                      <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                  </div>
                  <div class="col-12 mb-4">
                    <h6>{{translate('Password Requirements')}}:</h6>
                    <ul class="ps-3 mb-0">
                      <li class="mb-1">{{translate('Minimum 6 characters long - the more, the better')}}</li>
                      <li class="mb-1">{{translate('At least one lowercase character , the better')}}</li>

                    </ul>
                  </div>
                  <div>
                    <button type="submit" class="btn btn-primary me-2">{{translate('Submit')}}</button>
                    <button type="reset" class="btn btn-label-secondary">{{translate('Reset')}}</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!--/ Change Password -->




        </div>
      </div>
    </div>
    <!-- / Content -->

@endsection
@section('js')
 <!-- Page JS -->
 <script src="{{asset('agent/js/pages-account-settings-account.js')}}"></script>
@endsection
