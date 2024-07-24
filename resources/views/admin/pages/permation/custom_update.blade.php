<hr>
    <h4 class="text-nowrap fw-semibold"><span>custom Update Of Page:-</span>{{$page_data->page_name}}</h4>
                <input type="hidden" name="page_custom[]" value="{{$page_data->page_name}}" >
                @if($page == 'products')
                    @include('admin.pages.permation.tables.products')
                @else
                    @include('admin.pages.permation.tables.users_emp')
                @endif

            <div class="col-4">
            <div class="mb-3">
                <label class="form-label" for="Roles">Select exp <span style="color:#f00">*</span></label>
                <select name="exp[]" class=" form-select">

                    <option value="=" data-select2-id="=">equal</option>
                    <option value=">=" data-select2-id=">=">bigger</option>
                    <option value="<=" data-select2-id="<=">smaller</option>

                </select>
            </div>
        </div>
        <input type="hidden" class="form-control" value="{{old('db_type')}}" required name="db_type[]" id="db_type-{{$page_data->page_name}}"  />

            {{-- value--}}
            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label" for="value">value <span style="color:#f00">*</span></label>
                <input type="text" class="form-control" value="{{old('value')}}" required name="value[]" id="value"  />

                </div>
            </div>
