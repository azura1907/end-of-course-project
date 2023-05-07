@extends('master')
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>:: My-Task:: Members</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/my-task.style.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/dist/assets/plugin/datatables/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/dist/assets/plugin/datatables/dataTables.bootstrap5.min.css')}}">
</head>
<body>
    <div id="mytask-layout" class="theme-indigo">
        <div class="container"> 
            @section('admin-employee-index')
            <!-- main body area -->
            <div class="main px-lg-4 px-md-4">
                <div class="body d-flex py-lg-3 py-md-2">
                    <div class="container-xxl">
                        <div class="row align-items-center">
                            <div class="border-0 mb-4">
                                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                    <h3 class="fw-bold mb-0">Employee List</h3>
                                    <div class="col-auto d-flex w-sm-100">
                                        <a href="{{route('admin.employee.create')}}">
                                            <button type="button" class="btn btn-dark btn-set-task w-sm-100"><i class="icofont-plus-circle me-2 fs-6"></i>Add Employee</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Row end  -->
                        <div class="row clearfix g-3">
                          <div class="col-sm-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <table id="employeeTable" class="table table-hover align-middle mb-0" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Employee Id</th>
                                                    <th>Employee Email</th>
                                                    <th>Status</th>
                                                    <th>Entry date</th>
                                                    <th>Employee Name</th>
                                                    <th>Department</th>
                                                    <th>Role</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($employees as $employee)
                                                <tr>
                                                    <td>
                                                        <a href="#" class="fw-bold text-secondary">{{$employee->id}}</a>
                                                    </td>
                                                   <td>
                                                        <p>{{$employee->email}}</p>
                                                   </td>
                                                   <td>
                                                        <p>{{$employee->status}}</p>
                                                   </td>
                                                   <td>
                                                        <p>{{$employee->entry_date}}</p>
                                                   </td>
                                                   <td>
                                                        <p>{{$employee->fullname}}</p>
                                                    </td>
                                                   <td>
                                                        <p>{{$employee->department}}</p>
                                                   </td>
                                                   <td>
                                                        <p>{{$employee->role}}</p>
                                                   </td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            <a href="{{route('admin.employee.infoEdit',['id' => $employee->id])}}">
                                                                <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-edit"></i>Edit Employee Personal infos</button>
                                                            </a>
                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            <a href="{{route('admin.employee.destroy',['id' => $employee->id])}}">
                                                                <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-close-circled text-danger"></i></button>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                          </div>
                        </div><!-- Row End -->
                    </div>
                </div>
        @endsection
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{asset('theme/dist/assets/bundles/libscripts.bundle.js')}}"></script>

<!-- Plugin Js-->
<script src="{{asset('theme/dist/assets/bundles/dataTables.bundle.js')}}"></script>

<!-- Jquery Page Js -->
<script src="{{asset('theme/js/template.js')}}"></script>

<script>
    $(document).ready(function() {
       $('#employeeTable')
       .addClass( 'nowrap' )
       .dataTable( {
           responsive: true,
           columnDefs: [
               { targets: [-1, -3], className: 'dt-body-right' }
           ]
       });
   });
</script>

</body>
</html>
