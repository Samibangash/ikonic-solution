@props([
    'type',
    'title',
    'colors' => [
        'success' => 'success',
        'error' => 'error',
        'info' => 'info',
        'warning' => 'warning',
    ],
    'message',
])

@php
    $position = ($type == 'success' || $type == 'info') ? 'toastr-top-right' : 'toastr-bottom-right';
    $output = '';
@endphp

@if($type)
    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "{{ $position }}",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        toastr.{{ $colors[$type] }}("{{ $message }}", "{{ $title }}");
    </script>
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        @php $output .= "<span>{$error}</span>"; @endphp
    @endforeach
    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toastr-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
            "escapeHtml": false,
        };
        toastr.error("{!! $output !!}", "error");
    </script>
@endif
