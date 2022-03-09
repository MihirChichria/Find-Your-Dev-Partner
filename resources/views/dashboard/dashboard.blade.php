@section('title', 'Family Portfolio | Dashboard')

@extends('layouts.app')

@section('content')
    <div class="card card-custom">
        <div class="col-sm-12">
            @include('common.partials._alert')
        </div>
        <div class="card-body">

        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dashboard/dashboard.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
    <script src="{{asset('js/common/ui-helper.js')}}"></script>
@endsection

{{--@section('styles')--}}
{{--    <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css')}}">--}}
{{--@endsection--}}
