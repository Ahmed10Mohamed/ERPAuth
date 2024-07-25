<div class="row custom_page" id="customPageDelete-{{$page->page_name}}">

<h4 class="text-nowrap fw-semibold"><span>Custom Delete Of Page:-</span>{{$custom_delete->page_custom}}</h4>
    <input type="hidden" name="page_custom[]" value="{{$custom_delete->page_custom}}" >
    @if($custom_delete->page_custom == 'products')
        @include('admin.pages.permation.tables.edit_products',['custom_update'=>$custom_delete])
    @else
        @include('admin.pages.permation.tables.edit_users_emp',['custom_update'=>$custom_delete])
    @endif
    <div class="col-4">
        <div class="mb-3">
            <label class="form-label" for="Roles">Select exp <span style="color:#f00">*</span></label>
            <select name="exp[]" class=" form-select">

                <option value="=" data-select2-id="=" @if($custom_delete->exp == '=') selected @endif >equal</option>
                <option value=">=" data-select2-id=">=" @if($custom_delete->exp == '>=') selected @endif  >bigger</option>
                <option value="<=" data-select2-id="<=" @if($custom_delete->exp == '<=') selected @endif  >smaller</option>

            </select>
        </div>
    </div>
    <input type="hidden" class="form-control" value="{{old('page_type',$custom_delete->page_type)}}" required name="page_type[]" id="db_type-{{$custom_delete->page_type}}-{{$custom_delete->page_name}}"  />
    <input type="hidden" class="form-control" value="{{old('db_type',$custom_delete->db_type)}}" required name="db_type[]" id="db_type-{{$custom_delete->page_type}}-{{$custom_delete->page_custom}}"  />

        {{-- value--}}
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label" for="value">value <span style="color:#f00">*</span></label>
            <input type="text" class="form-control" value="{{old('value',$custom_delete->value)}}" required name="value[]" id="value"  />

            </div>
        </div>
</div>


