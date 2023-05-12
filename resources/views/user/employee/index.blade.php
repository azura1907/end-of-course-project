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
    @section('admin-employee-index')
        <div id="mytask-layout" class="theme-indigo">
            <!-- Side bar -->
            <div class="sidebar px-4 py-4 py-md-5 me-0">
                <div class="d-flex flex-column h-100">
                    <a href="theme/dist/index.html" class="mb-0 brand-icon">
                        <span class="logo-icon">
                            <svg  width="35" height="35" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                            </svg>
                        </span>
                        <span class="logo-text">My-Task</span>
                    </a>
                    <!-- Menu: main ul -->
                    <ul class="menu-list flex-grow-1 mt-3">
                        <li class="collapsed">
                            <a class="m-link" href="{{route('dashboard.project')}}">
                                <i class="icofont-home fs-5"></i> <span>Project Dashboard</span></a>
                        </li>
                        <li  class="collapsed">
                            <a class="m-link"  data-bs-toggle="collapse" data-bs-target="#project-Components" href="#">
                                <i class="icofont-briefcase"></i><span>Projects</span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu show" id="project-Components">
                                <li><a class="ms-link" href="{{route('user.project.index')}}"><span>Projects</span></a></li>
                            </ul>
                        </li>
                        <li class="collapsed">
                            <a class="m-link active" data-bs-toggle="collapse" data-bs-target="#emp-Components" href="theme/dist/#"><i
                                    class="icofont-users-alt-5"></i> <span>Employees</span></a>
                            <!-- Menu: Sub menu ul -->
                            <ul class="sub-menu collapse show" id="emp-Components">
                                <li><a class="ms-link active" href="{{route('user.employee.index')}}"> <span>Members</span></a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Menu: menu collepce btn -->
                    <a href="{{route('auth.logout')}}">
                        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                        </button>
                    </a>
                </div>
            </div>
            <!-- main body area -->
            <div class="main px-lg-4 px-md-4">
                <!-- Body: Header -->
                <div class="header">
                    <nav class="navbar py-4">
                        <div class="container-xxl">
                            <!-- header rightbar icon -->
                            <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                                <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                                    <div class="u-info me-2">
                                        <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold">{{Auth::user()->email}}</span></p>
                                    </div>
                                    <a class="nav-link dropdown-toggle pulse p-0" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                                        <img class="avatar lg rounded-circle img-thumbnail" src="{{asset('theme/dist/assets/images/profile_av.png')}}" alt="profile">
                                    </a>
                                    <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                        <div class="card border-0 w280">
                                            <div class="card-body pb-0">
                                                <div class="d-flex py-1">
                                                    <img class="avatar rounded-circle" src="{{asset('theme/dist/assets/images/profile_av.png')}}" alt="profile">
                                                    <div class="flex-fill ms-3">
                                                        <p class="mb-0"><span class="font-weight-bold">{{Auth::user()->fullname}}</span></p>
                                                        <small class="">{{Auth::user()->email}}</small>
                                                    </div>
                                                </div>
                                                
                                                <div><hr class="dropdown-divider border-dark"></div>
                                            </div>
                                            <div class="list-group m-2 ">
                                                <a href="task.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-tasks fs-5 me-3"></i>My Task</a>
                                                <a href="members.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user-group fs-6 me-3"></i>members</a>
                                                <a href="{{route('auth.logout')}}" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-6 me-3"></i>Signout</a>
                                                <div><hr class="dropdown-divider border-dark"></div>
                                                <a href="ui-elements/auth-signup.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-contact-add fs-5 me-3"></i>Add personal account</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <!-- menu toggler -->
                            <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                                <span class="fa fa-bars"></span>
                            </button>
            
                            <!-- main menu Search-->
                            <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                                <div class="input-group flex-nowrap input-group-lg">
                                    <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                                    <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                        
                        </div>
                    </nav>
                </div>
                <div class="body d-flex py-lg-3 py-md-2">
                    <div class="container-xxl">
                        <div class="row align-items-center">
                            <div class="border-0 mb-4">
                                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                    <h3 class="fw-bold mb-0">Employee List</h3>
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
                                                    <th>Action</th>
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
                                                        <p>{{$employee->department_name}}</p>
                                                   </td>
                                                   <td>
                                                        <p>{{$employee->role_name}}</p>
                                                   </td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            <a href="{{route('user.employee.detailInfo',['id'=>$employee->id])}}">
                                                                <button type="button" class="btn btn-dark btn-set-task w-sm-100"><i class="icofont-file-document me-2 fs-6"></i></i>Detail</button>
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
            </div>
        </div>
    @endsection
<!-- Jquery Core Js -->
<script src="{{asset('theme/dist/assets/bundles/libscripts.bundle.js')}}"></script>
<!-- Plugin Js-->
<script src="{{asset('theme/dist/assets/bundles/dataTables.bundle.js')}}"></script>
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
