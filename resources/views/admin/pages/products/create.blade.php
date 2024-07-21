@extends('admin.layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="py-3 mb-4 fw-bold"><span class="text-muted fw-light">Products /</span>
                Create Product
            </h4>
            {{-- start row --}}
            <div class="mb-4 row">
                <!-- Browser Default -->
                <div class="mb-4 col-md mb-md-0">
                  <div class="card">
                    <h5 class="card-header">
                             Create Product

                    </h5>
                    <div class="card-body">

                      <form class="browser-default-validation" method="post" action="{{route('Product.store')}}" enctype="multipart/form-data">
                              {{csrf_field()}}

                                    <div class="row">

                                        {{-- Name--}}
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="name">Product Name <span style="color:#f00">*</span></label>
                                            <input type="text" class="form-control" value="{{old('title')}}" required name="title" id="name"  />

                                            </div>
                                        </div>

                                        {{-- price --}}
                                       <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="price">Price <span style="color:#f00">*</span></label>
                                            <input type="text" class="form-control" value="{{old('price')}}" required name="price" id="price"  />

                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        {{-- image--}}
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="image">image <span style="color:#f00">*</span></label>
                                            <input type="file" class="form-control" value="{{old('image')}}" required name="image" id="image"  />

                                            </div>
                                        </div>

                                      

                                    </div>

                                     <div class="row">

                                        {{-- details--}}
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="details">details</label>
                                                <textarea name="details" class="form-control" id="">{{old('details')}}</textarea>
                                                   
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
