<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
        <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
            <div>
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                {{-- , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-semibold">Pixinvent</a>
                --}}
            </div>

        </div>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('admin/vendor/libs/jquery/jquery.js')}}"></script>
{{-- <script src="{{asset('ckeditor/ckeditor.js')}}"></script> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>



<script src="{{asset('admin/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('admin/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('admin/vendor/libs/node-waves/node-waves.js')}}"></script>

<script src="{{asset('admin/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{asset('admin/vendor/libs/i18n/i18n.js')}}"></script>
<script src="{{asset('admin/vendor/libs/typeahead-js/typeahead.js')}}"></script>

<script src="{{asset('admin/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('admin/vendor/libs/apex-charts/apexcharts.js')}}"></script>




<!-- Vendors JS -->
<script src="{{asset('admin/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('admin/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('admin/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('admin/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('admin/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('admin/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('admin/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>

<script src="{{asset('admin/vendor/libs/pickr/pickr.js')}}"></script>
    <script src="{{asset('admin/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('admin/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
    <script src="{{asset('admin/vendor/libs/jquery-timepicker/jquery-timepicker.js')}}"></script>

<script src="{{asset('ckeditor/js/sample.js')}}"></script>
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->


<!-- endbuild -->
<script src="{{asset('admin/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js')}}"></script>
<script type="text/javascript" src="{{asset('js/toaster.js')}}"></script>
    <!-- BEGIN PAGE LEVEL JS-->
            @if(session()->has('success') )
            <script>toastr.success('{{ session()->get("success") }}')</script>


            @endif
            @if(session()->has('fail') || $errors->any() )

            <script>
            let failMessage = "{{ $errors->first() ?: session()->get('fail') }}" ;
            let failTitle = "Opps!"
            toastr.error(failMessage, failTitle);
            </script>


            @endif


<!-- Vendors JS -->

<script src="{{asset('admin/vendor/libs/jszip/jszip.js')}}"></script>
<script src="{{asset('admin/vendor/libs/pdfmake/pdfmake.js')}}"></script>
<!-- Flat Picker -->
<script src="{{asset('admin/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('admin/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<!-- Row Group JS -->


<script src="{{ asset('datatables/datatables.bundle.js')}}"></script>
		<script src="{{ asset('crud/datatables/data-sources/html.js')}}"></script>



<!-- Vendors JS -->
<script src="{{asset('admin/vendor/libs/bs-stepper/bs-stepper.js')}}"></script>
<script src="{{asset('admin/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>


<!-- Page JS -->
    <!-- Page JS -->
    <script src="{{asset('admin/js/modal-add-new-cc.js')}}"></script>
    <script src="{{asset('admin/js/modal-add-new-address.js')}}"></script>
    <script src="{{asset('admin/js/modal-edit-user.js')}}"></script>
    <script src="{{asset('admin/js/modal-enable-otp.js')}}"></script>
    <script src="{{asset('admin/js/modal-share-project.js')}}"></script>
    <script src="{{asset('admin/js/modal-create-app.js')}}"></script>
    <script src="{{asset('admin/js/modal-two-factor-auth.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('admin/js/main.js')}}"></script>
<script src="{{asset('admin/js/custom.js')}}"></script>

@yield('script')

<!-- Page JS -->
<script src="{{asset('admin/js/dashboards-ecommerce.js')}}"></script>




</body>

</html>




    <!-- Vendors JS -->

