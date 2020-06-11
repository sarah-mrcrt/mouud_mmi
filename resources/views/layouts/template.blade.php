@if(request()->ajax())
@yield('content')
@else
@include('layouts.full')
@endif

@if(Session::has('toastr'))
<script>
    $(document).ready(function() {
        toastr.{{Session::get('toastr')['statut']}}('{{Session::get('toastr')['message']}}')
    });
  	$('body').removeClass('modal-open');
  	$('body').removeAttr("style");
    $('.modal').remove('.show');
    $('.modal-backdrop').remove();
</script>
@endif