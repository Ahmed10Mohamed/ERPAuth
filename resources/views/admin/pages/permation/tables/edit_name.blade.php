<div class="col-4">
    <div class="mb-3">
        <label class="form-label" for="Roles">Select col <span style="color:#f00">*</span></label>
        <select name="col[]" class="form-select col_type" required data-id="{{$custom_update->page_custom}}" >
        <option value="" >Select Col</option>
        @foreach (get_page_tables($custom_update->model_name) as $table=>$col_type )
            <option value="{{$table}}" data-type="{{$col_type}}" data-pagetype="{{$custom_update->page_type}}"  data-select2-id="{{$table}}" @if($custom_update->col == $table )selected @endif >{{$table}}</option>

        @endforeach

        </select>
    </div>
</div>
 <input type="hidden" name="model_name[]" value="{{$custom_update->model_name}}">
