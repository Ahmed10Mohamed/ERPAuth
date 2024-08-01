<!-- resources/views/admin/pages/permation/select_page.blade.php -->
<h5>Role Permissions</h5>
<!-- Permission table -->
<h4 class="text-nowrap fw-semibold"><span>Page Name:</span> {{ $page->page_name }}</h4>

<input type="hidden" name="page_id" value="{{ $page->id }}">
<div class="d-flex">
    <!-- Permission checkboxes -->
    <div class="form-check me-3 me-lg-5">
        <input class="form-check-input checkAll" data-id="{{ $page->id }}" type="checkbox" id="all-{{ $page->page_name }}">
        <label class="form-check-label" for="all-{{ $page->page_name }}"> All </label>
    </div>
    <div class="form-check me-3 me-lg-5">
        <input class="form-check-input read_col perm-{{ $page->id }}" type="checkbox" data-id="{{ $page->id }}" id="read-{{ $page->page_name }}" name="is_read" value="1">
        <label class="form-check-label" for="read-{{ $page->page_name }}"> Read </label>
    </div>
    <div class="form-check me-3 me-lg-5">
        <input class="form-check-input perm-{{ $page->id }}" type="checkbox" id="insert-{{ $page->page_name }}" name="is_create" value="1">
        <label class="form-check-label" for="insert-{{ $page->page_name }}"> Insert </label>
    </div>
    <div class="form-check me-3 me-lg-5">
        <input class="form-check-input update_col perm-{{ $page->id }}" data-id="{{ $page->id }}" type="checkbox" id="update-{{ $page->page_name }}" name="is_update" value="1">
        <label class="form-check-label" for="update-{{ $page->page_name }}"> Update </label>
    </div>
    <div class="form-check me-3 me-lg-5">
        <input class="form-check-input check_custom_update_page" type="checkbox" data-page_id="{{ $page->page_name }}" data-id="{{ $page->id }}" id="custom_update-{{ $page->id }}" data-type="update" data-url="{{ url('Dashboard/select-custom-update') }}" name="is_custom_update" data-page="{{ $page->page_name }}" value="1" disabled>
        <label class="form-check-label" for="custom_update-{{ $page->id }}"> Custom Update </label>
    </div>
    <div class="form-check me-3 me-lg-5">
        <input class="form-check-input delete_col perm-{{ $page->id }}" data-id="{{ $page->id }}" type="checkbox" id="delete-{{ $page->page_name }}" name="is_delete" value="1">
        <label class="form-check-label" for="delete-{{ $page->page_name }}"> Delete </label>
    </div>
    <div class="form-check">
        <input class="form-check-input check_custom_update_page" type="checkbox" data-page_id="{{ $page->page_name }}" data-id="{{ $page->id }}" id="custom_delete-{{ $page->id }}" data-type="delete" data-url="{{ url('Dashboard/select-custom-update') }}" name="is_custom_delete" data-page="{{ $page->page_name }}" value="1" disabled>
        <label class="form-check-label" for="custom_delete-{{ $page->id }}"> Custom Delete </label>
    </div>
</div>
<div class="row custom_page" id="customPage-{{ $page->page_name }}"></div>
<div class="row custom_page" id="customPageDelete-{{ $page->page_name }}"></div>
<hr>
