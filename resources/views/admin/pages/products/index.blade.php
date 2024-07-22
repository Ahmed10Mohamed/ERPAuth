@extends('admin.layout.main')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="card">
            <!-- card -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row me-2">
                    <div class="col-md-4">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products</h4>
                    </div>
                    <div class="col-md-8">
                        <div
                            class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0">

                            <a href="{{ route('Product.create') }}" class="dt-button add-new btn btn-primary"><span><i
                                        class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span
                                        class="d-none d-sm-inline-block">create</span></span></a>
                        </div>
                    </div>
                </div>


                {{-- start --}}
                <!-- Bootstrap Table with Header - Dark -->
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    @if(check_has_permission('update-products') || check_has_permission('delete-products') )

                                    <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($all_data as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->price }}</td>
                                        @if(check_has_permission('update-products') || check_has_permission('delete-products') )
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="ti ti-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                    @if(check_has_permission('update-products') )
                                                        <a class="dropdown-item" href="{{ route('Product.edit', $data->id) }}"><i
                                                                class="ti ti-pencil me-1"></i> Edit</a>

                                                    @endif
                                                    @if(check_has_permission('delete-products') )

                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#basicModal-{{ $data->id }}"><i
                                                                class="ti ti-trash me-1"></i> Delete</a>
                                                   @endif
                                                            </div>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="basicModal-{{ $data->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel1">Delete Product
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <form role="form"
                                                                action="{{ url('Dashboard/Product/' . $data->id) }}" class=""
                                                                method="POST">
                                                                <div class="modal-body">

                                                                    <input name="_method" type="hidden" value="DELETE">
                                                                    {{ csrf_field() }}
                                                                    <p>Are You Sure?</p>



                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-label-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger"
                                                                        name='delete_modal'><i class="fa fa-trash"
                                                                            aria-hidden="true"></i> Delete</button>
                                                                    </a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- end --}}

                                            </td>
                                        @endif



                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/ Bootstrap Table with Header Dark -->

                {{-- end --}}

            </div>
            <!-- / card -->
        </div>





    </div>

    <!-- / Content -->
@endsection