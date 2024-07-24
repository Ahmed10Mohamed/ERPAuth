<div class="col-4">
    <div class="mb-3">
        <label class="form-label" for="Roles">Select col <span style="color:#f00">*</span></label>
        <select name="col[]" class="form-select col_type" required data-id="{{$page_data->page_name}}" >
        <option value="" >Select Col</option>
        <option value="title" data-type="string" data-select2-id="title">Title</option>
            <option value="details" data-type="string" data-select2-id="details">Details</option>
            <option value="price" data-type="number" data-select2-id="price">price</option>
            <option value="created_at" data-type="date" data-select2-id="created_at">Date</option>

        </select>
    </div>
</div>
