<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset(mix('vendors/js/ui/jquery.sticky.js'))}}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@yield('vendor-script')
@stack('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>

<!-- custome scripts file for user -->
<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>

@if($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
@stack('page-script')
<!-- END: Page JS-->

@if(Session::has('toastr'))
@php
    $toastr=Session::get('toastr');
@endphp
    <script>
        console.log('toastr run')
        toastr['{{ $toastr['type'] }}']('{{ $toastr['contant'] }}', '{{ $toastr['title'] }}', {
            closeButton: true,
            tapToDismiss: false,
            progressBar: true,
        });
    </script>
@endif
