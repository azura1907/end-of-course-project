@extends('master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Info Edit</title>
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/my-task.style.min.css')}}">
</head>
<body>
<div class="container">
    @section('employee-info-edit')
    <div class="main px-lg-4 px-md-4 mt-4">
    <!-- Create Employee-->
        <form action="{{route('admin.employee.storeDetailInfo')}}" method="POST">
            <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Edit Employee Detail Info</h5>
            @csrf
            <div class="row g-3 mb-3">
                <div class="col-sm-6">
                    <label class="form-label">Employee Id</label>
                    <input type="text" value={{$employee->id}} class="form-control" id="id" name="id" placeholder="Input employee fullname">
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Employee Fullname</label>
                    <input type="text" value="{{$employee->fullname}}" class="form-control" id="fullname" name="fullname" placeholder="Input employee fullname">
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Age</label>
                    <input type="text" value="{{$employee->age}}" class="form-control" id="age" name="age" placeholder="Input employee age">
                </div>
            </div>
            <label class="form-label mt-2"><strong>Gender</strong></label>
            <td>
                <input type="radio" name="gender" value="{{$employee->gender}}" {{ old('status', 1) == 1 ? 'checked' : '' }}> Male
                <input type="radio" name="gender" value="{{$employee->gender}}" {{ old('status') == 2 ? 'checked' : '' }}> Female
            </td>
            <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label  class="form-label">Address</label>
                        <input type="text" class="form-control" value="{{$employee->address}}" id="address" name="address" placeholder="Input employee address">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" value="{{$employee->phone}}" id="phone" name="phone" placeholder="Input employee phone number">
                    </div>
            </div>
                <button class="primary" type="submit">Create</button>
        </form>
    @endsection
</div>
</div>
<!-- Jquery Core Js -->
<script src="{{asset('theme/dist/assets/bundles/libscripts.bundle.js')}}"></script>

<!-- Jquery Page Js -->
<script src="{{asset('theme/js/template.js')}}"></script>
</body>
</html>
