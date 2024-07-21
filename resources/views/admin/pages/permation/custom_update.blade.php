<hr>
    <h4 class="text-nowrap fw-semibold"><span>custom Update Of Page:-</span>{{$page->page_name}}</h4>

                @if($page == 'products')
                    @include('admin.pages.permation.tables.products')
                @else
                    @include('admin.pages.permation.tables.users_emp')
                @endif

            <div class="col-4">
            <div class="mb-3">
                <label class="form-label" for="Roles">Select exp <span style="color:#f00">*</span></label>
                <select  class=" form-select" tabindex="-1" aria-hidden="true" name="exp" >
                    <option value="equal" data-select2-id="equal">equal</option>
                    <option value="bigger" data-select2-id="bigger">bigger</option>
                    <option value="smaller" data-select2-id="smaller">smaller</option>

                </select>
            </div>
        </div>
            {{-- value--}}
            <div class="col-4">
                <div class="mb-3">
                    <label class="form-label" for="value">value <span style="color:#f00">*</span></label>
                <input type="text" class="form-control" value="{{old('value')}}" required name="value" id="value"  />

                </div>
            </div>