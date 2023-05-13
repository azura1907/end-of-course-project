@extends('master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>:: My-Task:: Employee Detail Info</title>
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/my-task.style.min.css')}}">
</head>
<body>
    @section('employee-info-edit')
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
        <div class="row g-3 mb-3 row-deck">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Personal Info</h3>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-xl-8 col-lg-12 col-md-12">
                <div class="card teacher-card  mb-3">
                    <div class="card-body  d-flex teacher-fulldeatil">
                        <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center w220 mx-sm-0 mx-auto">
                            <a href="#">
                                <img src="{{asset('theme/dist/assets/images/lg/avatar3.jpg')}}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            </a>
                            <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                <h6 class="mb-0 fw-bold d-block fs-6">{{$role}}</h6>
                                <span class="text-muted small">Employee Id : {{$employee->id}}</span>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6  class="mb-0 mt-2  fw-bold d-block fs-6">{{$employee->fullname}}</h6>
                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">{{$department}}</span>
                            <div class="row g-2 pt-2">
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-people"></i>
                                        @if ($personalInfo->gender == 1)
                                        <span class="ms-2 small">Male</span>
                                        @endif
                                        @if ($personalInfo->gender == 2)
                                        <span class="ms-2 small">Female</span>
                                        @endif
                                        @if ($personalInfo->gender == 3)
                                        <span class="ms-2 small">Others</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-ui-touch-phone"></i>
                                        <span class="ms-2 small">{{$personalInfo->phone}}</span>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-email"></i>
                                        <span class="ms-2 small">{{$employee->email}}</span>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-birthday-cake"></i>
                                        <span class="ms-2 small">{{$personalInfo->dob}}</span>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-address-book"></i>
                                        <span class="ms-2 small">{{$personalInfo->address}}</span>
                                    </div>
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
