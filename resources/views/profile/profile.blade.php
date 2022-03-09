@section('title', 'Profile | Dashboard')

@extends('layouts.app')

@section('content')
    <div class="card card-custom">
        <div class="col-sm-12">
            @include('common.partials._alert')
        </div>
        <div class="card-body">
            <div class="col-md-12 p-0">
                <div class="form-group p-0">
                    <h5>Basic Information</h5>
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
                            @foreach(\App\Helpers\Constants\BaseConstants::GENDER as $key=>$val)
                            <option value="{{$val}}">{{$key}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="email"
                               value="{{old('email')}}"
                               name="email" placeholder="Enter Your Email"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone_number">Phone Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="phone_number"
                               value="{{old('phone_number')}}"
                               name="phone_number" placeholder="Enter Your Phone Number"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">City <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="city"
                               value="{{old('city')}}"
                               name="city" placeholder="Enter Your City"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="stackoverflow_id">Stackoverflow</label>
                        <input type="text" class="form-control"
                               id="stackoverflow_id" name="stackoverflow_id"
                               value="{{old('stackoverflow_id')}}"
                               placeholder="Enter Your Stackoverflow"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="github_id">Github/Gitlab</label>
                        <input type="text" class="form-control" id="github_id"
                               value="{{old('github_id')}}"
                               name="github_id" placeholder="Enter Your Git Link"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="linked_in">LinkedIn</label>
                        <input type="text" class="form-control"
                               value="{{old('linked_in')}}"
                               id="linked_in" name="linked_in" placeholder="Enter Your LinkedIn Id"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <hr style="width:100%">
                <div class="col-md-12">
                    <div class="form-group">
                        <h5>About</h5>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="bio">Bio <span class="text-danger">*</span></label>
                        <textarea name="bio" id="bio" cols="30" rows="5" class="form-control"
                                  placeholder="Enter Your Bio">{{old('bio')}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="resume">CV/Resume <span class="text-danger">*</span></label>
                        <br>
                        <input type="file" name="resume" id="resume" placeholder="CV/Resume">
                    </div>
                </div>
            </div>
            <div class="row">
                <hr style="width:100%">

            </div>


            <h5>Qualification</h5>
            223
            <div class="kt_docs_repeater_row">
                <div data-repeater-list="education[]">
                    <div data-repeater-item class="form-group row mb-5 repeater-item">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Degree Type <span class="text-danger">*</span></label>
                                <select name="degree_type" id="degree_type" class="form-control" data-kt-repeater="select2">
                                    <option value="" selected>Select Degree</option>
                                    @foreach(\App\Helpers\Constants\BaseConstants::DEGREE_TYPE as $key=>$value)
                                        <option value="{{$value}}">{{$key}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="institute_name">Educational Institution <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="institute_name"
                                       name="institute_name"  value="{{old('institute_name')}}"
                                       placeholder="Enter Your Institute Name"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field_study">Field Of Study <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="field_study"
                                       name="field_study" value="{{old('field_study')}}"
                                       placeholder="Enter Your Field Of Study"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="average_percentage">Average Percentage <span class="text-danger">*</span></label>
                                <input type="number" name="average_percentage" id="average_percentage"
                                       placeholder="Enter Your Average Percentage"
                                       value="{{old('average_percentage')}}"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-6 date" >
                            <label for="start_date">Start Date</label>
                            <input data-provide="datepicker"
                                    class="form-control start_date"
                                    placeholder="Start date"
                                   name="start_date"
                                    value="{{old('start_date')}}"
                                    id="start_date"
                                    required/>
                        </div>
                        <div class="form-group col-md-6 date" >
                            <label for="end_date">End Date</label>
                            <input data-provide="datepicker"
                                    class="end_date form-control"
                                    placeholder="End date"
                                    name="end_date"
                                    value="{{old('end_date')}}"
                                    id="end_date"
                                    required/>
                        </div>
                        <div class="col-md-2">
                            <a href="javascript:;" data-repeater-delete
                               class="btn btn-sm btn-light-danger mt-3 mt-md-9 remove-subject-metadata">
                                <i class="la la-trash-o fs-3"></i>Delete
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-7">
                    <a href="javascript:;" data-repeater-create
                       class="add-metadata btn btn-light-primary">
                        <i class="la la-plus"></i>Add
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr style="width:100%">
                    <div class="form-group">
                        <h5>Skills</h5>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="skills">Enter Your Skills <span class="text-danger">*</span></label>
                                <select name="skills" id="skills"
                                        class="select2 form-control" multiple="multiple">
                                    @foreach(\App\Models\Skill::all() as $skill)
                                        <option value="{{$skill->id}}">{{$skill->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="width:100%">
            <h5>Experience</h5>
            <div class="kt_docs_repeater_row_exp">
                <div data-repeater-list="experience[]">
                    <div data-repeater-item class="form-group row mb-5 repeater-item">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" id="company_name"
                                       name="company_name"  value="{{old('company_name')}}"
                                       placeholder="Enter Your Company Name"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="job_role">Job Role</label>
                                <input type="text" class="form-control" id="job_role"
                                       name="job_role"  value="{{old('job_role')}}"
                                       placeholder="Enter Your Job Role"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="job_description">Job Description</label>
                                <textarea name="job_description" id="job_description" cols="30" rows="5"
                                          class="form-control"
                                          value="{{old('job_description')}}"
                                          placeholder="Enter Your Job Description"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-md-6 date" >
                            <label for="start_date">Start Date</label>
                            <input data-provide="datepicker"
                                   class="form-control start_date"
                                   placeholder="Start Date"
                                   name="start_date"
                                   value="{{old('start_date')}}"
                                   id="start_date"
                                   required/>
                        </div>
                        <div class="form-group col-md-6 date" >
                    <label for="end_date">End Date</label>
                    <input data-provide="datepicker"
                           class="form-control end_date"
                           placeholder="End Date"
                           name="end_date"
                           value="{{old('end_date')}}"
                           id="end_date"
                           required/>
                </div>

                        <div class="col-md-2">
                            <a href="javascript:;" data-repeater-delete
                               class="btn btn-sm btn-light-danger mt-3 mt-md-9 remove-subject-metadata">
                                <i class="la la-trash-o fs-3"></i>Delete
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-7">
                    <a href="javascript:;" data-repeater-create
                       class="add-metadata btn btn-light-primary">
                        <i class="la la-plus"></i>Add
                    </a>
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
            $('#skills').select2( {
                'placeholder': 'Select Skills'
            });
        });
    </script>
{{--    <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>--}}
    <script src="{{asset('js/common/ui-helper.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('.kt_docs_repeater_row').repeater({
                initEmpty: false,
                isFirstItemUndeletable: true,
                show: function () {
                    console.log('ss');
                    $(this).slideDown();
                    $(this).find('[data-kt-repeater="select2"]').select2();
                    var lastInsertedName = $('[data-repeater-item]').last().find('.end_date')[0].name;;
                    var temp = lastInsertedName.indexOf("[");
                    var temp1 = lastInsertedName.indexOf("]");
                    var elementId = lastInsertedName.substr(temp+1, temp1-temp-1);

                },
                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                },
                ready: function(){
                    $('[data-kt-repeater="select2"]').select2();
                }
            });
            $('.kt_docs_repeater_row_exp').repeater({
                initEmpty: false,
                isFirstItemUndeletable: true,
                show: function () {
                    console.log('ss');
                    $(this).slideDown();
                    $(this).find('[data-kt-repeater="select2"]').select2();
                    var lastInsertedName = $('[data-repeater-item]').last().find('.end_date')[0].name;;
                    var temp = lastInsertedName.indexOf("[");
                    var temp1 = lastInsertedName.indexOf("]");
                    var elementId = lastInsertedName.substr(temp+1, temp1-temp-1);

                },
                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                },
                ready: function(){
                    $('[data-kt-repeater="select2"]').select2();
                }
            });
        });
    </script>
    {{-- <script src="https://cdn.datatables.net/plug-ins/1.10.25/dataRender/datetime.js"></script> --}}
@endsection

{{--@section('styles')--}}
{{--    <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css')}}">--}}
{{--@endsection--}}
