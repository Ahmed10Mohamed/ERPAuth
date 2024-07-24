<div class="col-4">
    <div class="mb-3">


        <label class="form-label" for="Roles">Select col <span style="color:#f00">*</span></label>

        <select name="col[]" class="form-select col_type" required data-id="{{$page_data->page_name}}" >
            <option value="">Select Col</option>
            <option value="name" data-type="string" data-select2-id="name">Name</option>
            <option value="user_name" data-type="string" data-select2-id="user_name">User Name</option>
            <option value="phone" data-type="string" data-select2-id="phone">Phone</option>
            <option value="email" data-type="string" data-select2-id="email">E-Mail</option>
            <option value="created_at" data-type="date" data-select2-id="created_at">Date</option>
        </select>

    </div>
</div>
