@extends('FrontEnd.layout.master')
@section('title')
    Hire Tutor
@endsection
@php
    //dd();
@endphp
@section('custom_css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('body')
    <section class="section gb mt120">
        <div class="container-fluid">
            <div class="row" style="margin-bottom: 15px;">
                @include('FrontEnd.include.sidebar')
                <div class="col-lg-9">
                    <div class="course-box" style="border-radius: 6px !important;">
                        <div class="course-details" style="padding-top: .5rem">
                            <h2 class="text-center" style="margin-bottom: 30px;">Tuition Information</h2>
                            <form method="post" action="{{route('hire.tutor.store')}}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tuition_type">Tuition Type <span style="color: red">*</span></label>
                                        <select name="tuition_type" id="tuition_type" class="form-control select2" required>
                                            <option value="">Select Type</option>
                                            <option value="1">Home Tutoring</option>
                                            <option value="2">Online Tutoring</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="institute_name">Institute Name</label>
                                        <input type="text" class="form-control" id="institute_name" name="institute_name" placeholder="Enter Institute Name">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="city">City <span style="color: red">*</span></label>
                                        <select name="city_id" id="city" class="form-control select2" required>
                                            <option value="">Select...</option>
                                            @foreach($cities as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="no_of_student">No. of Students <span style="color: red">*</span></label>
                                        <select name="no_of_student" id="no_of_student" class="form-control select2" required>
                                            <option value="">Select...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="address">Address <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="House, Road, Area" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="no_of_days">Days / Week</label>
                                        <select name="no_of_days" id="no_of_days" class="form-control">
                                            <option value="">Select...</option>
                                            <option value="1 day / week">1 Day / Week</option>
                                            <option value="2 days / week">2 Days / Week</option>
                                            <option value="3 days / week">3 Days / Week</option>
                                            <option value="4 days / week">4 Days / Week</option>
                                            <option value="5 days / week">5 Days / Week</option>
                                            <option value="6 days / week">6 Days / Week</option>
                                            <option value="7 days / week">7 Days / Week</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="category">Category <span style="color: red">*</span></label>
                                        <select name="category_id" id="category" class="form-control select2" required>
                                            <option value="">Select Category</option>
                                            <option value="1">Bangla Medium</option>
                                            <option value="2">English Version</option>
                                            <option value="3">English Medium (Ed-Excel)</option>
                                            <option value="4">English Medium (Cambridge)</option>
                                            <option value="5">English Medium (ib)</option>
                                            <option value="6">Madrasha Medium</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="tutoring_time">Tutoring Time</label>
                                        <input type="text" class="form-control time" id="tutoring_time" name="tutoring_time" placeholder="Choose Tutoring Time">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="class_course">Class/Course <span style="color: red">*</span></label>
                                        <select name="class_course" id="class_course" class="form-control class_course select2" required>
                                            <option value="">Select...</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="hire_date">Hire Date <span style="color: red">*</span></label>
                                        <input type="text" class="form-control datetimepicker" id="hire_date" name="hire_date" placeholder="Choose Hire Date" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="subject">Choose The Required Subject <span style="color: red">*</span></label>
                                        <select name="subject[]" id="subject" class="form-control subject select2" multiple required>
                                            <option value="">Select...</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="salary">Salary (BDT) <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter Salary Amount" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Student Gender<span style="color: red">*</span></label>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="radio" name="gender" value="male" id="male" required>
                                                <label for="male">Male</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" name="gender" value="female" id="female" required>
                                                <label for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Tutor Gender Preference<span style="color: red">*</span></label>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="radio" name="gender_pref" value="male" id="male_pref" required>
                                                <label for="male_pref">Male</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" name="gender_pref" value="female" id="female_pref" required>
                                                <label for="female_pref">Female</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" name="gender_pref" value="any" id="other_pref" required>
                                                <label for="other_pref">Any</label>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="more_requirement">More about your Requirement</label>
                                        <textarea class="form-control" id="more_requirement" name="more_requirement" rows="2" placeholder="Type Here...">

                                        </textarea>
                                    </div>
                                </div>

                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary text-center">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end container -->
    </section>
@endsection


@section('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function () {
            $(".select2").select2({
                placeholder: "Select...",
            });
        });

        $('#category').on('change', function () {
            var cat = $(this).val();
            var basepath = `{{URL::to('/')}}`;
            $.ajax({
                url: basepath + "/get_course/" + cat,
                type: 'GET',
                success: function (data) {
                    $(".class_course").empty().append($("<option></option>").attr("value", null).text("Select Class/Course"));
                    $.each(data, function (value, key) {
                        $(".class_course").append($("<option></option>").attr("value", value).text(key));
                    });
                }
            });
        });

        $('#class_course').on('change', function () {
            var cat = $('#category').val();
            var course = $(this).val();
            var basepath = `{{URL::to('/')}}`;
            $.ajax({
                url: basepath + "/get_subject/" + cat + "/" + course,
                type: 'GET',
                success: function (data) {
                    $(".subject").empty().append($("<option></option>").attr("value", null).text("Select Subject"));
                    $.each(data, function (value, key) {
                        $(".subject").append($("<option></option>").attr("value", value).text(key));
                    });
                }
            });
        });
    </script>

@endsection
