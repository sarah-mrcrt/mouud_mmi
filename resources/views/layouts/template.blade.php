@if(request()->ajax())
@yield('content')
@else
@include('layouts.full')
<script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
@endif

@if(Session::has('toastr'))
<script>
    $(document).ready(function() {
        toastr.{{Session::get('toastr')['statut']}}('{{Session::get('toastr')['message']}}')
    });
</script>
@endif