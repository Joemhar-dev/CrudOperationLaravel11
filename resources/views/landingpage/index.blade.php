{{-- call the main layout  --}}
@extends('layout')
{{-- for the titile of the page  --}}
@section('title') Product Listing @parent @endsection
{{-- additional style here intended for this blade  --}}
@section('styles')
@endsection
{{-- for the content of the page  --}}
@section('content')
@include('components.header')
@include('components.sidebar')
<script>
    fetch('http://localhost:8000/api/region')
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
</script>
@endsection
@section('scripts')
@endsection
