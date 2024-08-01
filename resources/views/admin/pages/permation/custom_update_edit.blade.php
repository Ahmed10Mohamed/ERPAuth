<div class="row custom_page" id="customPage-{{$page->page_name}}">
<h4 class="text-nowrap fw-semibold"><span>Custom Update Of Page:-</span>{{$custom_update->page_custom}}</h4>
    <input type="hidden" name="page_custom[]" value="{{$custom_update->page_custom}}" >
    @include('admin.pages.permation.tables.edit_name',['custom_update'=>$custom_update])

    <div class="col-4">
        <div class="mb-3">
            <label class="form-label" for="Roles">Select exp <span style="color:#f00">*</span></label>
            <select name="exp[]" class=" form-select">

                <option value="=" data-select2-id="=" @if($custom_update->exp == '=') selected @endif >equal</option>
                <option value=">=" data-select2-id=">=" @if($custom_update->exp == '>=') selected @endif  >bigger</option>
                <option value="<=" data-select2-id="<=" @if($custom_update->exp == '<=') selected @endif  >smaller</option>
                <option value="search" data-select2-id="search" @if($custom_update->exp == 'search') selected @endif  >search</option>

            </select>
        </div>
    </div>
    <input type="hidden" class="form-control" value="{{$custom_update->db_type}}" required name="db_type[]" id="db_type-{{$custom_update->page_type}}-{{$custom_update->page_custom}}"  />
    <input type="hidden" class="form-control" value="{{$custom_update->page_type}}" required name="page_type[]"  />

        {{-- value--}}
        <div class="col-4">
            <div class="mb-3">
                <label class="form-label" for="value">value <span style="color:#f00">*</span></label>
            <input type="text" class="form-control" value="{{$custom_update->value}}" required name="value[]" id="value"  />

            </div>
        </div>
</div>
