@extends('layouts.template')
@section('content')
<div class="container-fluid error_404">
<img src="{{ asset('image/404.png') }}"/>
<h4 style="text-align: center;">This page does not exist</h4>
<a href="{{ asset('/') }}" data-pjax class="btn btn_fondBleu">Back to Home</a>
</div>
@endsection
