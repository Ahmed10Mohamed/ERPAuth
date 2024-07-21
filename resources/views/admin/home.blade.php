@extends('admin.layout.main')

@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row">
        <!-- View sales -->
        <div class="col-xl-4 mb-4 col-lg-5 col-12">
          <div class="card">
            <div class="d-flex align-items-end row">
              <div class="col-7">
                <div class="card-body text-nowrap">
                  <h5 class="card-title mb-0">Congratulations {{admin()->user_name}}! 🎉</h5>
                  <p class="mb-2">count of users used appication</p>
                  <h4 class="text-primary mb-1">10</h4>
                  {{-- <a href="javascript:;" class="btn btn-primary">View Sales</a> --}}
                </div>
              </div>
              <div class="col-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                  <img
                    src="{{asset('admin/img/illustrations/card-advance-sale.png')}}"
                    height="140"
                    alt="view sales"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- View sales -->

        <!-- Statistics -->
        <div class="col-xl-8 mb-4 col-lg-7 col-12">
          <div class="card h-100">
            <div class="card-header">
              <div class="d-flex justify-content-between mb-3">
                <h5 class="card-title mb-0">Statistics</h5>
                {{-- <small class="text-muted">Updated 1 month ago</small> --}}
              </div>
            </div>
            <div class="card-body">
              <div class="row gy-3">
                <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                      <i class="ti  ti-users ti-sm"></i>
                    </div>
                    <div class="card-info">
                      <h5 class="mb-0">50k</h5>
                      <small>Total Students</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                      <i class="ti  ti-users ti-sm"></i>
                    </div>
                    <div class="card-info">
                      <h5 class="mb-0">90k</h5>
                      <small>Total Users</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-info me-3 p-2">
                      <i class="fas fa-city ti-sm"></i>
                    </div>
                    <div class="card-info">
                      <h5 class="mb-0">100k</h5>
                      <small>Total Schools </small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-6">
                  <div class="d-flex align-items-center">
                    <div class="badge rounded-pill bg-label-danger me-3 p-2">
                      <i class="fas fa-sync-alt ti-sm"></i>
                    </div>
                    <div class="card-info">
                      <h5 class="mb-0">120k</h5>
                      <small>Total Courses</small>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!--/ Statistics -->

        <div class="col-xl-4 col-12">
          <div class="row">


            <!-- Profit last month -->
            <div class="col-xl-12 mb-4 col-md-3 col-6">
              <div class="card">
                <div class="card-header pb-0">
                  <h5 class="card-title mb-0">System profits</h5>
                  <!-- <small class="text-muted">This Month</small> -->
                </div>
                <div class="card-body">
                  <div id="profitLastMonth"></div>
                  <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                    <h4 class="mb-0">54895</h4>
                    <small class="text-success">$</small>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Profit last month -->


          </div>
        </div>





        <!-- Popular Product -->
        <div class="col-md-6 col-xl-4 mb-4">
          <div class="card h-100">
            <div class="card-header d-flex justify-content-between">
              <div class="card-title m-0 me-2">
                <h5 class="m-0 me-2">Latest Courses</h5>
              </div>

            </div>
            <div class="card-body">
              <ul class="p-0 m-0">




              </ul>
            </div>
          </div>
        </div>
        <!--/ Popular Product -->



        <!-- Invoice table -->
        <div class="col-lg-12">
          <div class="card h-100">
            <h3 style="padding: 20px 0 0 20px;">Latest Users</h3>
            <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>E-Mail</th>
                        <th>Phone</th>
                        <th>Account Type</th>

                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">


                  </tbody>
                </table>
              </div>
          </div>
        </div>
        <!-- /Invoice table -->
      </div>
    </div>
    <!-- / Content -->



@endsection
