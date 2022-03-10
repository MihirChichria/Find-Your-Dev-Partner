@section('title', 'Find Dev Partner | Dashboard')

@extends('layouts.app')

@section('content')
    <div class="card card-custom">
        <div class="col-sm-12">
            @include('common.partials._alert')
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card-body rounded bg-grey text-center bg-danger text-white">
                    <span><i class="fa fa-brands fa-github fa-2x text-white btn"></i></span>
                    <h2 class="card-title"><b>No. of Developers</b></h2>
                    <h3>140</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body bg-grey rounded text-center bg-primary text-white">
                    <span><i class="fa fa-solid fa-handshake fa-2x text-white btn"></i></span>
                    <h2 class="card-title"><b>No. of Matches</b></h2>
                    <h3>14</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body bg-grey rounded text-center bg-success text-white">
                    <span><i class="fa fa-solid fa-handshake fa-2x text-white btn"></i></span>
                    <h2 class="card-title"><b>Thinking</b></h2>
                    <h3>14</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-grey mt-4">
        <div class="m-4">
            <table class="table table-borderless">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Skills</th>
                    <th scope="col">Rating</th>
                    <th scope="col">No of Projects</th>
                    <th scope="col">No of Matches</th>
                    <th scope="col">View Profile</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Emma Smith</td>
                    <td>Java, JavaScript, PHP, Laravel</td>
                    <td>4.6</td>
                    <td>14</td>
                    <td>6</td>
                    <td><button class="btn-sm btn-primary"><i class="fa fa-solid fa-eye fa-sm text-white"></i></button></td>
                </tr>
                <tr>
                    <td>Jaanvi Rijhwani(JMC)</td>
                    <td>Java, JavaScript, PHP, Laravel, Sab aata h bc</td>
                    <td>5</td>
                    <td>14000</td>
                    <td>1400000</td>
                    <td><button class="btn-sm btn-primary"><i class="fa fa-solid fa-eye fa-sm text-white"></i></button></td>
                </tr>
                </tbody>
            </table>
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
