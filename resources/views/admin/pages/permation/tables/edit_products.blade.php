<div class="col-4">
    <div class="mb-3">
        <label class="form-label" for="Roles">Select col <span style="color:#f00">*</span></label>
        <select name="col[]" class="form-select col_type" required data-id="{{$custom_update->page_custom}}" >
        <option value="" >Select Col</option>
        <option value="title" data-type="string" data-select2-id="title" data-pagetype="{{$custom_update->page_type}}"  @if($custom_update->col == 'title')selected @endif>Title</option>
            <option value="details" data-type="string" data-select2-id="details" data-pagetype="{{$custom_update->page_type}}"  @if($custom_update->col == 'details')selected @endif >Details</option>
            <option value="price" data-type="number" data-select2-id="price" data-pagetype="{{$custom_update->page_type}}"  @if($custom_update->col == 'price')selected @endif >price</option>
            <option value="created_at" data-type="date" data-select2-id="created_at" data-pagetype="{{$custom_update->page_type}}"  @if($custom_update->col == 'created_at')selected @endif >Date</option>

        </select>
    </div>
</div>
