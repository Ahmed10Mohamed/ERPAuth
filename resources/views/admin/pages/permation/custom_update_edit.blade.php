<div class="row custom_page" id="customPage-{{$page->page_name}}">
<h4 class="text-nowrap fw-semibold"><span>Custom Update Of Page:-</span>{{$custom_update->page_custom}}</h4>
    <input type="hidden" name="page_custom[]" value="{{$custom_update->page_custom}}" >
    @if($custom_update->page_custom == 'products')
        @include('admin.pages.permation.tables.edit_products',['custom_update'=>$custom_update])
    @else
        @include('admin.pages.permation.tables.edit_users_emp',['custom_update'=>$custom_update])
    @endif
    <div class="col-4">
        <div class="mb-3">
            <label class="form-label" for="Roles">Select exp <span style="color:#f00">*</span></label>
            <select name="exp[]" class=" form-select">

                <option value="=" data-select2-id="=" @if($custom_update->exp == '=') selected @endif >equal</option>
                <option value=">=" data-select2-id=">=" @if($custom_update->exp == '>=') selected @endif  >bigger</option>
                <option value="<=" data-select2-id="<=" @if($custom_update->exp == '<=') selected @endif  >smaller</option>

            </select>
        </div>
    </div>
    <input type="hidden" class="form-control" value="{{old('db_type',$custom_update->db_type)}}" required name="db_type[]" id="db_type-{{$custom_update->page_type}}-{{$custom_update->page_custom}}"  />
    <input type="hidden" class="form-control" value="{{old('page_type',$custom_update->page_type)}}" required name="page_type[]"  />

        {{-- value--}}
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label" for="value">value <span style="color:#f00">*</span></label>
            <input type="text" class="form-control" value="{{old('value',$custom_update->value)}}" required name="value[]" id="value"  />

            </div>
        </div>
</div>