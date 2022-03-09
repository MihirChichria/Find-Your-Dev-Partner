@section('title', 'Family Portfolio | Dashboard')

@extends('layouts.app')

@section('content')
    <div class="card card-custom">
        <div class="col-sm-12">
            @include('common.partials._alert')
        </div>
        <div class="card-body">
            <div class="col-md-12 row">
                <div class="form-group">
                    <h6>Basic Information</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="=name" name="name" placeholder="Enter Full Name"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">Select Your Gender <span class="text-danger">*</span></label>
                        <select name="gender" id="gender" class="select2 form-control">
                            <option value="" selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Others</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Your Email"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="number">Phone Number</label>
                        <input type="text" class="form-control" id="number" name="number" placeholder="Enter Your Phone Number"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter Your City"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="stackoverflow">Stackoverflow</label>
                        <input type="text" class="form-control" id="stackoverflow" name="stackoverflow" placeholder="Enter Your Stackoverflow"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="git">Github/Gitlab</label>
                        <input type="text" class="form-control" id="git" name="git" placeholder="Enter Your Git Link"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="linkedin">LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="Enter Your LinkedIn Id"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <h6>About</h6>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea name="bio" id="bio" cols="30" rows="5" class="form-control" placeholder="Enter Your Bio"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="cv">CV/Resume</label>
                        <br>
                        <input type="file" name="cv" id="cv" placeholder="CV/Resume">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <h6>Qualification</h6>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gender">Degree Type <span class="text-danger">*</span></label>
                        <select name="degree" id="degree" class="select2 form-control">
                            <option value="" selected>Select Degree</option>
                            <option value="male">Bachelors</option>
                            <option value="female">Phd</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="education">Educational Institution</label>
                        <input type="text" class="form-control" id="education" name="education" placeholder="Enter Your Education"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="study">Field Of Study</label>
                        <input type="text" class="form-control" id="study" name="study" placeholder="Enter Your Field Of Study"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="percentage">Average Percentage</label>
                        <input type="number" name="precentage" id="percentage" placeholder="Enter Your Percentage" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 date" >
                    <label for="start_year">Start Year <span class="text-danger">*</span></label>
                    <input data-provide="datepicker"
                            class="form-control"
                            placeholder="Start Year"
                            value="{{old('start_year')}}"
                            id="start_year"
                            required/>
                </div>
                <div class="form-group col-md-6 date" >
                    <label for="end_year">End Year <span class="text-danger">*</span></label>
                    <input data-provide="datepicker"
                            class="form-control"
                            placeholder="End Year"
                            value="{{old('end_year')}}"
                            id="end_year"
                            required/>
                </div>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">    
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
