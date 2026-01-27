@extends('layouts.app')
@section('title', 'Create New Post')
@section('content')
    
@include('partials.header-mobile')
    
    @include('components.createblog')
    
    @include('partials.footer-mobile')
@endsection