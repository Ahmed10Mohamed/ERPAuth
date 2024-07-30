<div class="col-4">
    <div class="mb-3">
        <label class="form-label" for="Roles">Select col <span style="color:#f00">*</span></label>
        <select name="col[]" class="form-select col_type" required data-id="{{$page_data->page_name}}" >
        <option value="" >Select Col</option>
        @foreach (get_page_tables($page_data->model_name) as $table=>$col_type )
            <option value="{{$table}}" data-type="{{$col_type}}" data-pagetype="{{$type}}"  data-select2-id="{{$table}}">{{$table}}</option>

        @endforeach

        </select>
    </div>
</div>
<input type="hidden" name="model_name[]" value="{{$page_data->model_name}}">
