@extends('layouts.app') {{-- Sesuaikan dengan base layout Anda --}}

@section('sidebar')
    @include('superadmin.layouts.sidebar')
@endsection

@section('content')
    {{-- Konten utama untuk superadmin akan dimuat di sini --}}
    @yield('superadmin_content')
@endsection
