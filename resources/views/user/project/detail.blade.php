@extends('master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>:: My-Task:: Project Detail</title>
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/my-task.style.min.css')}}">
</head>
<body>
    @section('user-project-detail')
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
                            <li><a class="ms-link" href="{{route('admin.employee.index')}}"> <span>Members</span></a></li>
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
    <div class="main px-lg-4 px-md-4 mt-4">
        <!-- Body: Header -->
        <div class="header">
            <nav class="navbar py-4">
                <div class="container-xxl">
                    <!-- header rightbar icon -->
                    <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                        <div class="dropdown user-profile ml-2 ml-sm-3 d-block align-items-center zindex-popover">
                                <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold">{{Auth::user()->email}}</span></p>
                                @if(Auth::user()->view_right == 1)
                                    <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold">Admin</span></p>
                                @endif
                                @if(Auth::user()->view_right !== 1)
                                    <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold">Employee</span></p>
                                @endif
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
        <div class="row g-3">
            <div class="col-xl-8 col-lg-12 col-md-12">
                <div class="card teacher-card  mb-3">
                    <div class="card-body  d-flex teacher-fulldeatil">
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6 class="text-muted small-25 d-flex">Project Id : {{$project->project_id}}</h6>
                            <h3 class="mb-0 mt-2 fw-bold d-block">{{$project->project_title}}</h3>
                            <div class="row g-2 pt-2">
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <span class="py-1 small-15 mb-0 mt-1"><strong>Project Cost: </strong>{{$project->project_estimated_cost}}</span>
                                    </div>
                            </div>
                            <div class="row g-2 pt-2">
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        @if ($project->project_phase == 1)
                                        <span class="py-1 small-15 mb-0 mt-1"><strong>Project Phase: </strong>Planning</span>
                                        @endif
                                        @if ($project->project_phase == 2)
                                        <span class="py-1 small-15 mb-0 mt-1"><strong>Project Phase: </strong>Implement</span>
                                        @endif
                                        @if ($project->project_phase == 3)
                                        <span class="py-1 small-15 mb-0 mt-1"><strong>Project Phase: </strong>Testing</span>
                                        @endif
                                        @if ($project->project_phase == 4)
                                        <span class="py-1 small-15 mb-0 mt-1"><strong>Project Phase: </strong>Finalized</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <span class="py-1 small-15 mb-0 mt-1"><strong>Project Category: </strong>{{$project_categories->category_name}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 pt-2">
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <span class="py-1 small-15 mb-0 mt-1"><strong>Project Start Date: </strong>{{$project->project_start_date}}</span>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <span class="py-1 small-15 mb-0 mt-1"><strong>Project End Date: </strong>{{$project->project_end_date}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 pt-2">
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <span class="py-1 small-15 mb-0 mt-1"><strong>Project Estimated Cost: </strong>{{$project->project_estimated_cost}} ($)</span>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <span class="py-1 small-15 mb-0 mt-1"><strong>Project Leader: </strong>{{$prjLead->fullname}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 pt-2">
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <span class="py-1 small-15 mb-0 mt-1"><strong>Project's Department: </strong>{{$departments->department_name}}</span>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <span class="py-1 small-15 mb-0 mt-1"><strong>Project Assignee: </strong>
                                            @foreach ($assigneeData as $assignee)
                                            <div>{{$assignee}}</div>
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 pt-2">
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <span class="py-1 small-15 mb-0 mt-1"><strong>Project Required Skills: </strong>
                                            @foreach ($prjSkills as $prjSkill)
                                            <div>{{$prjSkill}}</div>
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <span class="py-1 small-15 mb-0 mt-1"><strong>Project Required Role: </strong>
                                            @foreach ($prjRoles as $prjRole)
                                            <div>{{$prjRole}}</div>
                                            @endforeach
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="py-1 small-15 mb-0 mt-1"><strong>Project Description: </strong></span>
                                <textarea name="project_desscription" id="project_desscription" class="form-control mt-2" rows="3" readonly>{{$project->project_description}}</textarea>
                            </div>
                            <div class="row g-2 pt-2">
                                <div class="col-xl-5 mt-5">
                                    <a href="{{route('user.project.edit',['id' => $project->project_id] )}}">
                                        <button type="button" class="btn btn-dark btn-set-task w-sm-100"><i class="icofont-edit fs-6"></i>Edit Project</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
<!-- Jquery Core Js -->
<script src="{{asset('theme/dist/assets/bundles/libscripts.bundle.js')}}"></script>
</body>
</html>
