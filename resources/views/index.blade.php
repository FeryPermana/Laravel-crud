@extends('layouts.master')
@section('title','crud')
@section('content')
<div class="section-body">
    ini isi content
    {{ Auth::user()->email }}
</div>
@endsection
@push('page-script')
@endpush