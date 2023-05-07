@extends('master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Create</title>
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/my-task.style.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
<div class="container">
    @section('employee-create')
    <div class="main px-lg-4 px-md-4 mt-4">
    <!-- Create Employee-->
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Add Employee</h5>
                </div>
                    <form action="{{route('admin.employee.store')}}" method="POST">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label class="form-label">Employee email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Input employee email">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Input employee password">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Entry Date</label>
                                <input type="date" class="form-control" id="entry_date" name="entry_date">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Input employee fullname">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label  class="form-label">Department</label>
                                <select class="form-select" name="department"aria-label="Default select Project Category">
                                @foreach ($departments as $department)
                                    <option value={{$department->department_id}}>{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col">
                                <label  class="form-label">Role</label>
                                <select class="form-select" name="role" aria-label="Default select Project Category">
                                @foreach ($roles as $role)
                                    <option value={{$role->role_id}}>{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col">
                                <label class="form-label">Skills</label>
                                <select class="form-select" name="skills[]" id="skills" multiple="multiple" aria-label="Default select Project Category">
                                @foreach ($skills as $skill)
                                    <option value={{$skill->skill_id}}>{{ $skill->skill_name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <button type="submit">Create</button>
                    </form>
                </div>
            </div>  
        </div>
    </div>
    @endsection
</div>
</div>
<!-- Jquery Core Js -->
{{-- <script src="{{asset('theme/dist/assets/bundles/libscripts.bundle.js')}}"></script> --}}

<!-- Jquery Page Js -->
<script src="{{asset('theme/js/template.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#skills').select2(
        );
    });
</script>
</body>
</html>
