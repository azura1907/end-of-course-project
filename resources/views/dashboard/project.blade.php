@extends('master')
<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: My-Task:: Dashboard </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/plugin/datatables/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asseT('theme/dist/assets/plugin/datatables/dataTables.bootstrap5.min.css')}}">
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/my-task.style.min.css')}}">
</head>
<body>


    @section('project-dashboard')
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
                        <a class="m-link active" href="{{route('dashboard.project')}}">
                            <i class="icofont-home fs-5"></i> <span>Dashboard</span></a>
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
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#emp-Components" href="theme/dist/#"><i
                                class="icofont-users-alt-5"></i> <span>Employees</span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse show" id="emp-Components">
                            @if (Auth::user()->view_right == 1)
                                <li><a class="ms-link" href="{{route('admin.employee.index')}}"> <span>Members</span></a></li>
                            @endif
                            @if (Auth::user()->view_right !== 1)
                                <li><a class="ms-link" href="{{route('user.employee.index')}}"> <span>Members</span></a></li>
                            @endif
                        </ul>
                    </li>
                    @if (Auth::user()->view_right == 1)
                    <li class="collapsed">
                        <a class="m-link" data-bs-toggle="collapse" data-bs-target="#extra-Components" href="#">
                            <i class="icofont-code-alt"></i> <span>Admin Pages</span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu collapse show" id="extra-Components">
                            <li><a class="ms-link" href="{{route('admin.project-category.index')}}"> <span>Project Category</span></a></li>
                            <li><a class="ms-link" href="{{route('admin.skill.index')}}"> <span>Skills</span></a></li>
                            <li><a class="ms-link" href="{{route('admin.role.index')}}"><span>Roles</span></a></li>
                            <li><a class="ms-link" href="{{route('admin.department.index')}}"><span>Departments</span></a></li>
                        </ul>
                    </li>
                    @endif
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
                                <div>
                                    <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold">{{Auth::user()->email}}</span></p>
                                    @if(Auth::user()->view_right == 1)
                                        <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold">Admin</span></p>
                                    @endif
                                    @if(Auth::user()->view_right !== 1)
                                        <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold">Employee</span></p>
                                    @endif
                                </div>
                                <div>
                                    <a class="nav-link dropdown-toggle pulse p-0" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                                        <img class="avatar lg rounded-circle img-thumbnail" src="{{asset('theme/dist/assets/images/profile_av.png')}}" alt="profile">
                                    </a>
                                </div>
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
                                            <a href="{{route('user.employee.detailInfo',['id'=>Auth::user()->id])}}" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user-group fs-6 me-3"></i>Account info</a>
                                            <a href="{{route('auth.logout')}}" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-6 me-3"></i>Signout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- main menu Search-->
                        <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Body: Body -->
            <div class="body d-flex py-3">
                <div class="container-xxl">
                    <div class="row g-3 mb-3 row-deck">
                        <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar lg  rounded-1 no-thumbnail bg-lightyellow color-defult"><i class="bi bi-journal-check fs-4"></i></div>
                                        <div class="flex-fill ms-4">
                                            <div class="">Total Task</div>
                                            <h5 class="mb-0 ">{{$taskCount}}</h5>
                                        </div>
                                        <a href="{{ route('user.project.index') }}" title="view-members" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar lg  rounded-1 no-thumbnail bg-lightblue color-defult"><i class="bi bi-list-check fs-4"></i></div>
                                        <div class="flex-fill ms-4">
                                            <div class="">Completed Task</div>
                                            <h5 class="mb-0 ">{{$completedCount}}</h5>
                                        </div>
                                        <a href="{{ route('user.project.index') }}" title="space-used" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                            <div class="card ">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar lg  rounded-1 no-thumbnail bg-lightgreen color-defult"><i class="bi bi-clipboard-data fs-4"></i></div>
                                        <div class="flex-fill ms-4">
                                            <div class="">Progress Task</div>
                                            <h5 class="mb-0 ">{{$doingCount}}</h5>
                                        </div>
                                        <a href="{{ route('user.project.index') }}" title="renewal-date" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row End -->
                    <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4 row-cols-xxl-4">
                        <div class="col">
                            <div class="card bg-primary">
                                <div class="card-body text-white d-flex align-items-center">
                                    <i class="icofont-data fs-3"></i>
                                    <div class="d-flex flex-column ms-3">
                                        <h6 class="mb-0">Total Projects</h6>
                                        <span class="text-white">{{$projectCount}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card bg-primary">
                                <div class="card-body text-white d-flex align-items-center">
                                    <i class="icofont-chart-flow fs-3"></i>
                                    <div class="d-flex flex-column ms-3">
                                        <h6 class="mb-0">Coming Projects</h6>
                                        <span class="text-white">{{$planningCount}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card bg-primary">
                                <div class="card-body text-white d-flex align-items-center">
                                    <i class="icofont-chart-flow-2 fs-3"></i>
                                    <div class="d-flex flex-column ms-3">
                                        <h6 class="mb-0">Progress Projects</h6>
                                        <span class="text-white">{{$onGoingCount}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card bg-primary">
                                <div class="card-body text-white d-flex align-items-center">
                                    <i class="icofont-tasks fs-3"></i>
                                    <div class="d-flex flex-column ms-3">
                                        <h6 class="mb-0">Finished Projects</h6>
                                        <span class="text-white">{{$finalizeCount}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>             
                    </div>
                    <div class="row g-3 mb-3 row-deck">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <div class="info-header">
                                        <h6 class="mb-0 fw-bold ">Project Information</h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="fw-bold text-secondary">Project Title</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Leader</th>
                                                <th>Project Phase</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                @foreach ($projects as $project)
                                                    <tr>
                                                        <td>
                                                            <span class="fw-bold ms-1">{{$project->project_title}}</span>
                                                        </td>
                                                        <td>
                                                                <p>{{$project->project_start_date}}</p>
                                                        </td>
                                                        <td>
                                                                <p>{{$project->project_end_date}}</p>
                                                        </td>
                                                        <td>
                                                                <p>{{$project->fullname}}</p>
                                                        </td>
                                                        <td>
                                                            @if ($project->project_phase == 1)
                                                            <p class="badge bg-secondary w-30">Planning</p>
                                                            @endif
                                                            @if ($project->project_phase == 2)
                                                            <p class="badge bg-primary w-30">Implement</p>
                                                            @endif
                                                            @if ($project->project_phase == 3)
                                                            <p class="badge bg-danger w-30">Testing</p>
                                                            @endif
                                                            @if ($project->project_phase == 4)
                                                            <p class="badge bg-success w-30">Finalized</p>
                                                            @endif
                                                                
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
<script src="{{asset('theme/dist/assets/bundles/dataTables.bundle.js')}}"></script>
<script>
$(document).ready(function() {
        $('#myProjectTable')
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