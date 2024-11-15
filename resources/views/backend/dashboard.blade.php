@extends('backend.layouts.master')

@section('title', 'Trang tổng quan')



@push('scripts')
    <!-- apexcharts -->
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>


    <!-- Dashboard init -->
    {{-- <script src="{{ asset('backend/assets/js/pages/dashboard-ecommerce.init.js') }}"></script> --}}
@endpush
