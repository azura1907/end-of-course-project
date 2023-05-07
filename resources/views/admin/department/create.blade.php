@extends('master')
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: My-Task:: Forms</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/plugin/parsleyjs/css/parsley.css')}}">

    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/my-task.style.min.css')}}">
</head>
<body>
<div id="mytask-layout" class="theme-indigo">
    @section('department-create')
    <div class="main px-lg-4 px-md-4 mt-4">
        <!-- Body: Form -->
        <div class="card mb-3">
            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                <h6 class="mb-0 fw-bold ">Create New Department</h6> 
            </div>
            <div class="card-body">
                <form id="advanced-form" action="{{ route('admin.department.store') }}" method="POST" data-parsley-validate novalidate>
                    @csrf
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Deparment Name</label>
                                <input type="text" id="department_name" name="department_name" class="form-control" required data-parsley-minlength="5">
                                <br />
                                <label for="text-input4" class="form-label">Department Detail</label>
                                <input type="text" id="department_detail" name="department_detail" class="form-control">
                                <br />
                                <label for="text-input4" class="form-label">Department Director</label>
                                <input type="text" id="department_director" name="department_director" class="form-control">
                                <br />
                                    <td>
                                        <input type="radio" name="status" value="1" {{ old('status', 1) == 1 ? 'checked' : '' }}> Active
                                        <input type="radio" name="status" value="2" {{ old('status') == 2 ? 'checked' : '' }}> Deactive
                                      </td>
                                <br />
                            </div>
                    </div>
                    <a href="#"><button type="submit" class="btn btn-primary">Create</button></a>
                </form>
            </div>
        </div>
    </div>
    @endsection
    <!-- Jquery Core Js -->
    <script src="{{asset('theme/dist/assets/bundles/libscripts.bundle.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{asset('theme/dist/assets/plugin/parsleyjs/js/parsley.js')}}"></script>
        
    <!-- Jquery Page Js -->
    <script src="{{asset('theme/js/template.js')}}"></script>     
    <script>
        $(function() {
            // initialize after multiselect
            $('#basic-form').parsley();
        });
    </script>
</div>
</body>
</html>