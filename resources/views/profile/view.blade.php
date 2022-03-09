@section('title', 'Family Portfolio | Dashboard')

@extends('layouts.app')

@section('content')
    <div class="card card-custom">
        <div class="col-sm-12">
            @include('common.partials._alert')
        </div>
        <div class="card-body">
            <div class="container col-md-12">
                <div class="row p-4">
                    <div class="col-md-6 p-4">
                        <h4>Bhavesh Galani</h4>
                    </div>
                    <div class="col-md-6 text-right">
                        <span><i class="fa fa-brands fa-github fa-2x text-grey btn"></i></span>
                        <span><i class="fa fa-brands fa-linkedin fa-2x btn" style="color: #0e76a8;"></i></span>
                        <span><i class="fa fa-brands fa-gitlab fa-2x btn" style="color: #554488"></i></span>
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col-md-12">
                        <h6>To obtain a fresher position as a software engineer in an organization where technical skills and creative thinking are useful. A highly motivated software engineer seeking to get a position in a company, where I can use my skills and knowledge to learn new things and grow as a software developer.</h6>                    
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col-md-12">
                        <h5><b>Skills</b></h5>
                        <ul class="list-group">
                            <li class="" style="list-style: none"><h6>PHP</h6></li>
                            <li class="" style="list-style: none"><h6>Java</h6></li>
                            <li class="" style="list-style: none"><h6>JavaScript</h6></li>
                            <li class="" style="list-style: none"><h6>Data Structures</h6></li>
                            <li class="" style="list-style: none"><h6>Laravel</h6></li>
                        </ul>
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col-md-12">
                        <h5><b>Experience</b></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Company : J.P MORGAN & CHASE</h6>
                            </div>

                            <div class="col-md-3">
                                <h6>Start Date : <span>22/2/2222</span></h6>
                            </div>
                            <div class="col-md-3">
                                <h6>End Date : <span>22/2/2222</span></h6>
                            </div>
                            <div class="col-md-12">
                                <h5>Job Role : Backend Developer</h5>
                                <h6>To obtain a fresher position as a software engineer in an organization where technical skills and creative thinking are useful. A highly motivated software engineer seeking to get a position in a company, where I can use my skills and knowledge to learn new things and grow as a software developer.</h6>
                            </div>    
                        </div>
                        
                    </div>
                </div>
            
                
                <div class="row p-4">
                    <div class="col-md-12">
                        <h5><b>Qualification</b></h5>
                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Thadomal Shahani Engineering College</h6>
                            </div>
                            <div class="col-md-3">
                                <h6>Start Date : 22/2/2222</h6>
                            </div>
                            <div class="col-md-3">
                                <h6>End Date : 22/2/2222</h6>
                            </div>
                        </div>
                        
                        <h6>Degree : Bachelors</h6>
                        <h6>Field of Study : Comps & Science Engineering</h6>
                        
                            
                        <h6>CGPA : 7.8</h6>
                            
                            
                        
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col-md-12">
                        <h5><b>Projects</b></h5>
                    </div>
                    <div class="col-md-6">
                        <h6>Proejct Title: Tera Marad Chutia</h6>
                    </div>
                    <div class="col-md-3">
                        <h6>Start Date : 22/2/2222</h6>
                    </div>
                    <div class="col-md-3">
                        <h6>End Date : 22/2/2222</h6>
                    </div>
                    <div class="col-md-12">
                        <h6>Skills : Java, JavaScript, PHP, Laravel</h6>
                    </div>
                    <div class="col-md-12">
                        <h5>Description</h5>
                        <h6>To obtain a fresher position as a software engineer in an organization where technical skills and creative thinking are useful. A highly motivated software engineer seeking to get a position in a company, where I can use my skills and knowledge to learn new things and grow as a software developer.</h6>
                    </div>
                </div>
                <div class="col-md-12">
                    <a href="" class="btn btn-primary">Chat</a>
                </div>           
            </div>
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
    {{-- <script src="https://cdn.datatables.net/plug-ins/1.10.25/dataRender/datetime.js"></script> --}}
@endsection

{{--@section('styles')--}}
{{--    <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css')}}">--}}
{{--@endsection--}}
