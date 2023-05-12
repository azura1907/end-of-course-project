@extends('master')
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: My-Task:: Projects </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/my-task.style.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/dist/assets/plugin/datatables/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/dist/assets/plugin/datatables/dataTables.bootstrap5.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    @section('user-project-index')
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
                        <a class="m-link active"  data-bs-toggle="collapse" data-bs-target="#project-Components" href="#">
                            <i class="icofont-briefcase"></i><span>Projects</span></a>
                        <!-- Menu: Sub menu ul -->
                        <ul class="sub-menu show" id="project-Components">
                            <li><a class="ms-link active" href="{{route('user.project.index')}}"><span>Projects</span></a></li>
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
            <!-- main body area -->
            <!-- Body: Body -->
            <div class="body d-flex py-lg-3">
                <div class="container-xxl">
                    <div class="row g-3 mb-3 row-deck">
                        <div class="border-0 mb-4">
                            <div class="card-header p-0 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold py-3 mb-0">Projects</h3>
                                <div class="d-flex py-2 project-tab flex-wrap w-sm-100">
                                    @if(Auth::user()->view_right !== 3)
                                        <a href="{{route('user.project.create')}}">
                                            <button type="button" class="btn btn-dark me-1 mt-1 w-sm-100" ><i class="icofont-plus-circle me-2 fs-6"></i>Create Project</button>
                                        </a>
                                    @endif
                                    <ul class="nav nav-tabs tab-body-header rounded ms-3 prtab-set w-sm-100" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#All-list" role="tab">All</a></li>
                                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Planning-list" role="tab">Planning</a></li>
                                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Ongoing-list" role="tab">Ongoing</a></li>
                                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Finalized-list" role="tab">Finalized</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row g-3 mb-3 row-deck">
                        <div class="col-lg-12 col-md-12 flex-column">
                            <div class="tab-content mt-4">
                                @if(isset($projects))
                                <div class="tab-pane fade show active" id="All-list">
                                    <div class="row g-3 gy-5 py-3 row-deck">
                                        @foreach ($projects as $targetproject)
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mt-5">
                                                        <div class="lesson_name">
                                                            <div class="project-block bg-lightgreen">
                                                                <i class="icofont-vector-path"></i>
                                                            </div>
                                                            <h6 class="mb-0 fw-bold  fs-6  mb-2">{{$targetproject->project_title}}</h6>
                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            @if (Auth::user()->view_right !== 3)
                                                            <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#taskcreate-{{$targetproject->project_id}}"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</button>
                                                            <a href="{{route('user.project.edit', ['id' => $targetproject->project_id]) }}"><button type="button" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i>Edit Project</button></a>
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject-{{$targetproject->project_id}}"><i class="icofont-ui-delete text-danger"></i></button>
                                                        @endif
                                                        </div>
                                                    </div>
                                                    <div class="row g-2 pt-4">
                                                        <a href="{{route('user.project.detail', ['id' => $targetproject->project_id]) }}"><button type="button" class="btn btn-outline-secondary"><i class="icofont-file-document text-success"></i>Project Detail</button></a>
                                                    </div>
                                                    <div class="row g-2 pt-4">
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-sand-clock">Start</i>
                                                            <span class="ms-2">{{$targetproject->project_start_date}}</span>
                                                        </div>
                                                    </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-sand-clock">End</i>
                                                                <span class="ms-2">{{$targetproject->project_end_date}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                @if (isset($planningProjects))
                                <div class="tab-pane fade" id="Planning-list">
                                    <div class="row g-3 gy-5 py-3 row-deck">
                                        @foreach ($planningProjects as $planningProject)
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mt-5">
                                                        <div class="lesson_name">
                                                            <div class="project-block bg-lightgreen">
                                                                <i class="icofont-vector-path"></i>
                                                            </div>
                                                            <h6 class="mb-0 fw-bold  fs-6  mb-2">{{$planningProject->project_title}}</h6>
                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            @if (Auth::user()->view_right !== 3)
                                                            <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#taskcreate-{{$planningProject->project_id}}"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</button>
                                                            @endif
                                                            {{-- <a href="{{route('user.task.create', ['project_id' => $project->project_id]) }}"><button type="button" class="btn btn-outline-secondary"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</button></a> --}}
                                                        <br>
                                                        @if(Auth::user()->view_right !== 3)
                                                            <a href="{{route('user.project.edit', ['id' => $planningProject->project_id]) }}"><button type="button" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i>Edit Project</button></a>
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject-{{$planningProject->project_id}}"><i class="icofont-ui-delete text-danger"></i></button>
                                                        @endif
                                                        </div>
                                                    </div>
                                                    <div class="row g-2 pt-4">
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-sand-clock">Start</i>
                                                                <span class="ms-2">{{$planningProject->project_start_date}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-sand-clock">End</i>
                                                                <span class="ms-2">{{$planningProject->project_end_date}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                @if (isset($ongoingProjects))
                                <div class="tab-pane fade" id="Ongoing-list">
                                    <div class="row g-3 gy-5 py-3 row-deck">
                                        @foreach ($ongoingProjects as $ongoingProject)
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mt-5">
                                                        <div class="lesson_name">
                                                            <div class="project-block bg-lightgreen">
                                                                <i class="icofont-vector-path"></i>
                                                            </div>
                                                            <h6 class="mb-0 fw-bold  fs-6  mb-2">{{$ongoingProject->project_title}}</h6>
                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            @if (Auth::user()->view_right !== 3)
                                                            <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#taskcreate-{{$ongoingProject->project_id}}"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</button>
                                                            @endif
                                                            {{-- <a href="{{route('user.task.create', ['project_id' => $project->project_id]) }}"><button type="button" class="btn btn-outline-secondary"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</button></a> --}}
                                                        <br>
                                                        @if(Auth::user()->view_right !== 3)
                                                            <a href="{{route('user.project.edit', ['id' => $ongoingProject->project_id]) }}"><button type="button" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i>Edit Project</button></a>
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject-{{$ongoingProject->project_id}}"><i class="icofont-ui-delete text-danger"></i></button>
                                                        @endif
                                                        </div>
                                                    </div>
                                                    <div class="row g-2 pt-4">
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-sand-clock">Start</i>
                                                                <span class="ms-2">{{$ongoingProject->project_start_date}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-sand-clock">End</i>
                                                                <span class="ms-2">{{$ongoingProject->project_end_date}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                @if (isset($finalizedProjects))
                                <div class="tab-pane fade" id="Finalized-list">
                                    <div class="row g-3 gy-5 py-3 row-deck">
                                        @foreach ($finalizedProjects as $finalizedProject)
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mt-5">
                                                        <div class="lesson_name">
                                                            <div class="project-block bg-lightgreen">
                                                                <i class="icofont-vector-path"></i>
                                                            </div>
                                                            <h6 class="mb-0 fw-bold  fs-6  mb-2">{{$finalizedProject->project_title}}</h6>
                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            @if (Auth::user()->view_right !== 3)
                                                            <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#taskcreate-{{$finalizedProject->project_id}}"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</button>
                                                            @endif
                                                            {{-- <a href="{{route('user.task.create', ['project_id' => $project->project_id]) }}"><button type="button" class="btn btn-outline-secondary"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</button></a> --}}
                                                        <br>
                                                        @if(Auth::user()->view_right !== 3)
                                                            <a href="{{route('user.project.edit', ['id' => $finalizedProject->project_id]) }}"><button type="button" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i>Edit Project</button></a>
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject-{{$finalizedProject->project_id}}"><i class="icofont-ui-delete text-danger"></i></button>
                                                        @endif
                                                        </div>
                                                    </div>
                                                    <div class="row g-2 pt-4">
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-sand-clock">Start</i>
                                                                <span class="ms-2">{{$finalizedProject->project_start_date}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-sand-clock">End</i>
                                                                <span class="ms-2">{{$finalizedProject->project_end_date}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3 row-deck">
                        <div class="border-0 mb-4">
                            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Task List</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Row end  -->
                    <div class="row clearfix g-3">
                        <div class="col-sm-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <table id="taskTable" class="table table-hover align-middle mb-0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Task Id</th>
                                                <th>Project Name</th>
                                                <th>Task Title</th>
                                                <th>Assignee</th>
                                                <th>Start date</th>
                                                <th>End date</th>
                                                <th>Cost (hour)</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tasks as $task)
                                                <tr>
                                                    <td>
                                                        <a href="#" class="fw-bold text-secondary">{{ $task->task_id}}</a>
                                                    </td>
                                                    <td>
                                                        <span class="fw-bold ms-1">{{$task->project_title}}</span>
                                                    </td>
                                                    <td>
                                                            <p>{{$task->task_name}}</p>
                                                    </td>
                                                    <td>
                                                            <p>{{$task->fullname}}</p>
                                                    </td>
                                                    <td>
                                                            <p>{{$task->task_start_date}}</p>
                                                    </td>
                                                    <td>
                                                            <p>{{$task->task_end_date}}</p>
                                                    </td>
                                                    <td>
                                                            <p>{{$task->task_estimated_cost}}</p>
                                                    </td>
                                                    <td>
                                                        @if ($task->task_status == 1)
                                                            <span class="badge bg-warning text-dark">New</span>
                                                        @endif
                                                        @if ($task->task_status == 2)
                                                            <span class="badge bg-info">Doing</span>
                                                        @endif
                                                        @if ($task->task_status == 3)
                                                            <span class="badge bg-success">Done</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-dark btn-set-task w-sm-100"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#taskedit-{{$task->task_id}}"><i class="icofont-edit me-2 fs-6"></i>Edit Task</button>
                                                        @if(Auth::user()->view_right !== 3)
                                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                <button type="button" class="btn btn-outline-secondary deleterow"
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#removetask-{{$task->task_id}}"><i class="icofont-close-circled text-danger"></i></button>
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr> 
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
            </div>
        </div>

        <!-- Modal  Remove Project-->
        @foreach ($projects as $project)
        <div class="modal fade" id="deleteproject-{{$project->project_id}}" tabindex="-1"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="dremovetaskLabel"> Remove Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body justify-content-center flex-column d-flex">
                    <i class="icofont-ui-rate-remove text-danger display-2 text-center mt-2"></i>
                    <p class="mt-4 fs-5 text-center">Do you want to remove
                    <strong>"{{$project->project_title}}"</strong> from Project List?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{route('user.project.destroy',['id' => $project->project_id])}}">
                        <button type="button" class="btn btn-danger color-fff">Remove</button>                        
                    </a>
                </div>
            </div>
            </div>
        </div>
        @endforeach

        <!-- Create task modal-->
        @foreach ($projects as $targetproject)
        <div class="modal fade" id="taskcreate-{{$targetproject->project_id}}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Create Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('user.task.store')}}" method="POST">
                    @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label  class="form-label">Project Name</label>
                                <select class="form-select" name="project_id">
                                    @foreach ($projects as $project)
                                        <option value={{$project->project_id}} {{$project->project_id == $targetproject->project_id ? 'selected' : ''}}>{{$project->project_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Task Name</label>
                                <input type="text" class="form-control" id="task_name" name="task_name">
                            </div>
                            <div class="deadline-form mb-3">
                                <form>
                                    <div class="row">
                                    <div class="col">
                                        <label for="datepickerded" class="form-label">Task Start Date</label>
                                        <input type="date" class="form-control" name="task_start_date">
                                    </div>
                                    <div class="col">
                                        <label for="datepickerdedone" class="form-label">Task End Date</label>
                                        <input type="date" class="form-control" name="task_end_date">
                                    </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm">
                                <label for="formFileMultipleone" class="form-label">Estimate cost (hour)</label>
                                <input type="text" name="task_estimated_cost" class="form-control">
                            </div>
                            <div class="col-sm">
                                <label for="formFileMultipleone" class="form-label">Assignee</label>
                                <select class="form-select assignee-select" name="assignee">
                                    @foreach ($employees as $employee)
                                        <option value={{$employee->id}}>{{$employee->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm">
                                <label for="exampleFormControlTextarea78" class="form-label">Description (optional)</label>
                                <textarea class="form-control" id="task_description" name="task_description" rows="3" placeholder="Input task description here"></textarea>
                            </div>
                            <div class="col-sm mt-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        
        <!-- Edit task modal-->
        @foreach ($tasks as $task)
        <div class="modal fade" id="taskedit-{{$task->task_id}}" tabindex="-1" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Edit Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('user.task.update',['id' => $task->task_id])}}" method="POST">
                    @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label  class="form-label">Task Id</label>
                                <p>{{$task->task_id}}</p>
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Project Name</label>
                                <select class="form-select" aria-label="Default select Project Category">
                                    @foreach ($projects as $project)
                                        <option value={{$project->project_id}} {{$task->project_id == $project->project_id ? 'selected' : ''}}>{{$project->project_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Task Name</label>
                                <input type="text" class="form-control" id="task_name" name="task_name" value="{{$task->task_name}}">
                            </div>
                            <div class="deadline-form mb-3">
                                <form>
                                    <div class="row">
                                    <div class="col">
                                        <label for="datepickerded" class="form-label">Task Start Date</label>
                                        <input type="date" class="form-control" id="datepickerded" name="task_start_date" value={{$task->task_start_date}}>
                                    </div>
                                    <div class="col">
                                        <label for="datepickerdedone" class="form-label">Task End Date</label>
                                        <input type="date" class="form-control" name="task_end_date" id="datepickerdedone" value={{$task->task_end_date}}>
                                    </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm">
                                <label for="formFileMultipleone" class="form-label">Estimate cost (hour)</label>
                                <input type="text" name="task_estimated_cost" value={{$task->task_estimated_cost}} class="form-control">
                            </div>
                            <div class="col-sm">
                                <label for="formFileMultipleone" class="form-label">Assignee</label>
                                <select class="form-select" name="assignee">
                                    @foreach ($employees as $employee)
                                        <option value={{$employee->id}} {{ $task->assignee == $employee->id ? 'selected' : '' }}>{{$employee->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm">
                                <label class="form-label">Description (optional)</label>
                                <textarea class="form-control" id="task_description" name="task_description" rows="3" >{{$task->task_description}}</textarea>
                            </div>
                            <div class="col-sm">
                                <label for="formFileMultipleone" class="form-label">Status</label>
                                <select class="form-select" name="task_status">
                                    <option value="1" {{ $task->task_status == 1 ? 'selected' : '' }}>New</option>
                                    <option value="2" {{ $task->task_status == 2 ? 'selected' : '' }}>Doing</option>
                                    <option value="3" {{ $task->task_status == 3 ? 'selected' : '' }}>Done</option>
                                </select>
                            </div>
                            <div class="col-sm mt-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Modal  Remove Task-->
        @foreach ($tasks as $task)
        <div class="modal fade" id="removetask-{{$task->task_id}}" tabindex="-1"  aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title  fw-bold" id="dremovetaskLabel"> Remove Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body justify-content-center flex-column d-flex">
                    <i class="icofont-ui-rate-remove text-danger display-2 text-center mt-2"></i>
                    <p class="mt-4 fs-5 text-center">Do you want to remove
                    <strong>"{{$task->task_name}}"</strong> from Task List?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{route('user.task.destroy',['id' => $task->task_id])}}">
                        <button type="button" class="btn btn-danger color-fff">Remove</button>                        
                    </a>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    @endsection
 <!-- Jquery Core Js -->
 <script src="{{asset('theme/dist/assets/bundles/libscripts.bundle.js')}}"></script>
        
 <!-- Plugin Js-->
 <script src="{{asset('theme/dist/assets/bundles/dataTables.bundle.js')}}"></script>
 
 <!-- Jquery Page Js -->
 <script src="{{asset('theme/js/template.js')}}"></script>
 <script>
     $(document).ready(function() {
        $('#taskTable')
        .addClass( 'nowrap' )
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
    });
 </script>
 <script>
   
 </script>
</body>
</html>