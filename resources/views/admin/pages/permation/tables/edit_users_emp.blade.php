<div class="col-4">
    <div class="mb-3">


        <label class="form-label" for="Roles">Select col <span style="color:#f00">*</span></label>

        <select name="col[]" class="form-select col_type" required data-id="{{$custom_update->page_custom}}" >
            <option value="">Select Col</option>
            <option value="name" data-type="string" data-select2-id="name" data-pagetype="{{$custom_update->page_type}}"  @if($custom_update->col == 'name')selected @endif >Name</option>
            <option value="user_name" data-type="string" data-select2-id="user_name"@if($custom_update->col == 'user_name')selected @endif >User Name</option>
            <option value="phone" data-type="string" data-select2-id="phone" data-pagetype="{{$custom_update->page_type}}"  @if($custom_update->col == 'phone')selected @endif >Phone</option>
            <option value="email" data-type="string" data-select2-id="email" data-pagetype="{{$custom_update->page_type}}"  @if($custom_update->col == 'email')selected @endif >E-Mail</option>
            <option value="created_at" data-type="date" data-select2-id="created_at" data-pagetype="{{$custom_update->page_type}}"  @if($custom_update->col == 'created_at')selected @endif >Date</option>
        </select>

    </div>
</div>
