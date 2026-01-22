@extends('layouts.app')
@section('title', 'Create New Post')
@section('content')
    @include('partials.header')
    
    @include('components.createblog')
    
    @include('partials.footer')
@endsection