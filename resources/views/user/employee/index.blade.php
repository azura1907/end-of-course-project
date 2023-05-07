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
</head>
<body>

<div id="mytask-layout" class="theme-indigo">
    @section('user-employee-index')
    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">
        <!-- Body: Body -->
        <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card border-0 mb-4 no-bg">
                            <div class="card-header py-3 px-0 d-sm-flex align-items-center  justify-content-between border-bottom">
                                <h3 class=" fw-bold flex-fill mb-0 mt-sm-0">Employee</h3>
                                <a href="{{route('admin.employee.create')}}"><button type="button" class="btn btn-dark me-1 mt-1 w-sm-100" >
                                <i class="icofont-plus-circle me-2 fs-6"></i>Employee</button></a>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle mt-1  w-sm-100" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Status
                                    </button>
                                    <ul class="dropdown-menu  dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item" href="#">All</a></li>
                                    <li><a class="dropdown-item" href="#">Task Assign Members</a></li>
                                    <li><a class="dropdown-item" href="#">Not Assign Members</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Row End -->
                <div class="row g-3 row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 row-deck py-1 pb-4">
                    <div class="col">
                        <div class="card teacher-card">
                            <div class="card-body d-flex">
                                <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                    <img src="{{asset('theme/dist/assets/images/lg/avatar3.jpg')}}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                    <div class="about-info d-flex align-items-center mt-3 justify-content-center">
                                        <div class="followers me-2">
                                            <i class="icofont-tasks color-careys-pink fs-4"></i>
                                            <span class="">04</span>
                                        </div>
                                        <div class="star me-2">
                                            <i class="icofont-star text-warning fs-4"></i>
                                            <span class="">4.5</span>
                                        </div>
                                        <div class="own-video">
                                            <i class="icofont-data color-light-orange fs-4"></i>
                                            <span class="">04</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                    <h6  class="mb-0 mt-2  fw-bold d-block fs-6">Luke Short</h6>
                                    <span class="light-info-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-11 mb-0 mt-1">UI/UX Designer</span>
                                    <div class="video-setting-icon mt-3 pt-3 border-top">
                                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                                    </div>
                                    <a href="task.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</a>
                                    <a href="employee-profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card teacher-card">
                            <div class="card-body d-flex">
                                <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                    <img src="{{asset('theme/dist/assets/images/lg/avatar4.jpg')}}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                    <div class="about-info d-flex align-items-center mt-3 justify-content-center">
                                        <div class="followers me-2">
                                            <i class="icofont-tasks color-careys-pink fs-4"></i>
                                            <span class="">00</span>
                                        </div>
                                        <div class="star me-2">
                                            <i class="icofont-star text-warning fs-4"></i>
                                            <span class="">00</span>
                                        </div>
                                        <div class="own-video">
                                            <i class="icofont-data color-light-orange fs-4"></i>
                                            <span class="">00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                    <h6  class="mb-0 mt-2  fw-bold d-block fs-6">Lillian	Powell</h6>
                                    <span class="light-success-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-11 mb-0 mt-1">Quality Assurance</span>
                                    <div class="video-setting-icon mt-3 pt-3 border-top">
                                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                                    </div>
                                    <a href="task.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-plus-circle me-2 fs-6"></i>First Task</a>
                                    <a href="employee-profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card teacher-card">
                            <div class="card-body d-flex">
                                <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                    <img src="{{asset('theme/dist/assets/images/lg/avatar9.jpg')}}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                    <div class="about-info d-flex align-items-center mt-3 justify-content-center">
                                        <div class="followers me-2">
                                            <i class="icofont-tasks color-careys-pink fs-4"></i>
                                            <span class="">10</span>
                                        </div>
                                        <div class="star me-2">
                                            <i class="icofont-star text-warning fs-4"></i>
                                            <span class="">04</span>
                                        </div>
                                        <div class="own-video">
                                            <i class="icofont-data color-light-orange fs-4"></i>
                                            <span class="">15</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                    <h6  class="mb-0 mt-2  fw-bold d-block fs-6">Rachel Parsons</h6>
                                    <span class="bg-lightgreen py-1 px-2 rounded-1 d-inline-block fw-bold small-11 mb-0 mt-1">Website Designer</span>
                                    <div class="video-setting-icon mt-3 pt-3 border-top">
                                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                                    </div>
                                    <a href="task.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</a>
                                    <a href="employee-profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card teacher-card">
                            <div class="card-body d-flex">
                                <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                    <img src="{{asset('theme/dist/assets/images/lg/avatar11.jpg')}}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                    <div class="about-info d-flex align-items-center mt-3 justify-content-center">
                                        <div class="followers me-2">
                                            <i class="icofont-tasks color-careys-pink fs-4"></i>
                                            <span class="">12</span>
                                        </div>
                                        <div class="star me-2">
                                            <i class="icofont-star text-warning fs-4"></i>
                                            <span class="">03</span>
                                        </div>
                                        <div class="own-video">
                                            <i class="icofont-data color-light-orange fs-4"></i>
                                            <span class="">25</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                    <h6  class="mb-0 mt-2  fw-bold d-block fs-6">John Hardacre</h6>
                                    <span class="light-orange-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-11 mb-0 mt-1">Developer</span>
                                    <div class="video-setting-icon mt-3 pt-3 border-top">
                                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                                    </div>
                                    <a href="task.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</a>
                                    <a href="employee-profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card teacher-card">
                            <div class="card-body d-flex">
                                <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                    <img src="{{asset('theme/dist/assets/images/lg/avatar12.jpg')}}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                    <div class="about-info d-flex align-items-center mt-3 justify-content-center">
                                        <div class="followers me-2">
                                            <i class="icofont-tasks color-careys-pink fs-4"></i>
                                            <span class="">12</span>
                                        </div>
                                        <div class="star me-2">
                                            <i class="icofont-star text-warning fs-4"></i>
                                            <span class="">4.5</span>
                                        </div>
                                        <div class="own-video">
                                            <i class="icofont-data color-light-orange fs-4"></i>
                                            <span class="">25</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                    <h6  class="mb-0 mt-2  fw-bold d-block fs-6">Jan Ince</h6>
                                    <span class="bg-lightblue py-1 px-2 rounded-1 d-inline-block fw-bold small-11 mb-0 mt-1">QA/QC Engineer</span>
                                    <div class="video-setting-icon mt-3 pt-3 border-top">
                                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                                    </div>
                                    <a href="task.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</a>
                                    <a href="employee-profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card teacher-card">
                            <div class="card-body d-flex">
                                <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                    <img src="{{asset('theme/dist/assets/images/lg/avatar8.jpg')}}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                    <div class="about-info d-flex align-items-center mt-3 justify-content-center">
                                        <div class="followers me-2">
                                            <i class="icofont-tasks color-careys-pink fs-4"></i>
                                            <span class="">08</span>
                                        </div>
                                        <div class="star me-2">
                                            <i class="icofont-star text-warning fs-4"></i>
                                            <span class="">03</span>
                                        </div>
                                        <div class="own-video">
                                            <i class="icofont-data color-light-orange fs-4"></i>
                                            <span class="">12</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                    <h6  class="mb-0 mt-2  fw-bold d-block fs-6">Steven	Butler</h6>
                                    <span class="bg-lightyellow py-1 px-2 rounded-1 d-inline-block fw-bold small-11 mb-0 mt-1">Mobile developer</span>
                                    <div class="video-setting-icon mt-3 pt-3 border-top">
                                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                                    </div>
                                    <a href="task.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</a>
                                    <a href="employee-profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card teacher-card">
                            <div class="card-body d-flex">
                                <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                    <img src="{{asset('theme/dist/assets/images/lg/avatar7.jpg')}}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                    <div class="about-info d-flex align-items-center mt-3 justify-content-center">
                                        <div class="followers me-2">
                                            <i class="icofont-tasks color-careys-pink fs-4"></i>
                                            <span class="">04</span>
                                        </div>
                                        <div class="star me-2">
                                            <i class="icofont-star text-warning fs-4"></i>
                                            <span class="">4.5</span>
                                        </div>
                                        <div class="own-video">
                                            <i class="icofont-data color-light-orange fs-4"></i>
                                            <span class="">04</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                    <h6  class="mb-0 mt-2  fw-bold d-block fs-6">Robert Hammer</h6>
                                    <span class="light-info-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-11 mb-0 mt-1">UI/UX Designer</span>
                                    <div class="video-setting-icon mt-3 pt-3 border-top">
                                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                                    </div>
                                    <a href="task.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</a>
                                    <a href="employee-profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card teacher-card">
                            <div class="card-body d-flex">
                                <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                    <img src="{{asset('theme/dist/assets/images/lg/avatar1.jpg')}}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                    <div class="about-info d-flex align-items-center mt-3 justify-content-center">
                                        <div class="followers me-2">
                                            <i class="icofont-tasks color-careys-pink fs-4"></i>
                                            <span class="">00</span>
                                        </div>
                                        <div class="star me-2">
                                            <i class="icofont-star text-warning fs-4"></i>
                                            <span class="">00</span>
                                        </div>
                                        <div class="own-video">
                                            <i class="icofont-data color-light-orange fs-4"></i>
                                            <span class="">00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                    <h6  class="mb-0 mt-2  fw-bold d-block fs-6">Paul Slater</h6>
                                    <span class="light-success-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-11 mb-0 mt-1">Quality Assurance</span>
                                    <div class="video-setting-icon mt-3 pt-3 border-top">
                                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                                    </div>
                                    <a href="task.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-plus-circle me-2 fs-6"></i>First Task</a>
                                    <a href="employee-profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card teacher-card">
                            <div class="card-body d-flex">
                                <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                    <img src="{{asset('theme/dist/assets/images/lg/avatar5.jpg')}}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                    <div class="about-info d-flex align-items-center mt-3 justify-content-center">
                                        <div class="followers me-2">
                                            <i class="icofont-tasks color-careys-pink fs-4"></i>
                                            <span class="">10</span>
                                        </div>
                                        <div class="star me-2">
                                            <i class="icofont-star text-warning fs-4"></i>
                                            <span class="">4.5</span>
                                        </div>
                                        <div class="own-video">
                                            <i class="icofont-data color-light-orange fs-4"></i>
                                            <span class="">15</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                    <h6  class="mb-0 mt-2  fw-bold d-block fs-6">Rachel Parsons</h6>
                                    <span class="bg-lightgreen py-1 px-2 rounded-1 d-inline-block fw-bold small-11 mb-0 mt-1">Website Designer</span>
                                    <div class="video-setting-icon mt-3 pt-3 border-top">
                                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                                    </div>
                                    <a href="task.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</a>
                                    <a href="employee-profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card teacher-card">
                            <div class="card-body d-flex">
                                <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                    <img src="{{asset('theme/dist/assets/images/lg/avatar6.jpg')}}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                    <div class="about-info d-flex align-items-center mt-3 justify-content-center">
                                        <div class="followers me-2">
                                            <i class="icofont-tasks color-careys-pink fs-4"></i>
                                            <span class="">10</span>
                                        </div>
                                        <div class="star me-2">
                                            <i class="icofont-star text-warning fs-4"></i>
                                            <span class="">04</span>
                                        </div>
                                        <div class="own-video">
                                            <i class="icofont-data color-light-orange fs-4"></i>
                                            <span class="">15</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                    <h6  class="mb-0 mt-2  fw-bold d-block fs-6">Rachel Parsons</h6>
                                    <span class="bg-lightgreen py-1 px-2 rounded-1 d-inline-block fw-bold small-11 mb-0 mt-1">Website Designer</span>
                                    <div class="video-setting-icon mt-3 pt-3 border-top">
                                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices</p>
                                    </div>
                                    <a href="task.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</a>
                                    <a href="employee-profile.html" class="btn btn-dark btn-sm mt-1"><i class="icofont-invisible me-2 fs-6"></i>Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Leave Request</h3>
                            <div class="col-auto d-flex w-sm-100">
                                <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#leaveadd"><i class="icofont-plus-circle me-2 fs-6"></i>Add Leave</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row end  -->
                <div class="row clearfix g-3">
                  <div class="col-sm-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Employee Id</th>
                                            <th>Employee Name</th>
                                            <th>Leave Type</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Reason</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="employee-profile.html" class="fw-bold text-secondary">#EMP : 00001</a>
                                            </td>
                                           <td>
                                               <img class="avatar rounded-circle" src="assets/images/xs/avatar1.jpg" alt="">
                                               <span class="fw-bold ms-1">Joan Dyer</span>
                                           </td>
                                           <td>
                                               Casual Leave
                                           </td>
                                           <td>
                                                12/03/2021
                                           </td>
                                           <td>
                                                14/03/2021
                                           </td>
                                           <td>
                                                Going to Holiday
                                           </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#leaveapprove"><i class="icofont-check-circled text-success"></i></button>
                                                    <button type="button" class="btn btn-outline-secondary deleterow" data-bs-toggle="modal" data-bs-target="#leavereject"><i class="icofont-close-circled text-danger"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="employee-profile.html" class="fw-bold text-secondary">#EMP : 00038</a>
                                            </td>
                                            <td>
                                                <img class="avatar rounded-circle" src="assets/images/xs/avatar2.jpg" alt="">
                                                <span class="fw-bold ms-1">Ryan	Randall</span>
                                            </td>
                                            <td>
                                                Casual Leave
                                            </td>
                                            <td>
                                                 11/04/2021
                                            </td>
                                            <td>
                                                 12/04/2021
                                            </td>
                                            <td>
                                                 Going to Holiday
                                            </td>
                                             <td>
                                                 <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                     <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#leaveapprove"><i class="icofont-check-circled text-success"></i></button>
                                                     <button type="button" class="btn btn-outline-secondary deleterow" data-bs-toggle="modal" data-bs-target="#leavereject"><i class="icofont-close-circled text-danger"></i></button>
                                                 </div>
                                             </td>
                                         </tr>
                                         <tr>
                                            <td>
                                                <a href="employee-profile.html" class="fw-bold text-secondary">#EMP : 00007</a>
                                            </td>
                                            <td>
                                                <img class="avatar rounded-circle" src="assets/images/xs/avatar3.jpg" alt="">
                                                <span class="fw-bold ms-1">Phil	Glover</span>
                                            </td>
                                            <td>
                                                Medical Leave
                                            </td>
                                            <td>
                                                 11/04/2021
                                            </td>
                                            <td>
                                                 12/04/2021
                                            </td>
                                            <td>
                                                Going to Hospital
                                            </td>
                                             <td>
                                                 <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                     <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#leaveapprove"><i class="icofont-check-circled text-success"></i></button>
                                                     <button type="button" class="btn btn-outline-secondary deleterow" data-bs-toggle="modal" data-bs-target="#leavereject"><i class="icofont-close-circled text-danger"></i></button>
                                                 </div>
                                             </td>
                                         </tr>
                                         <tr>
                                            <td>
                                                <a href="employee-profile.html" class="fw-bold text-secondary">#EMP : 00010</a>
                                            </td>
                                            <td>
                                                <img class="avatar rounded-circle" src="assets/images/xs/avatar4.jpg" alt="">
                                                <span class="fw-bold ms-1">Victor Rampling</span>
                                            </td>
                                            <td>
                                                Medical Leave
                                            </td>
                                            <td>
                                                 28/04/2021
                                            </td>
                                            <td>
                                                 30/04/2021
                                            </td>
                                            <td>
                                                Going to Hospital
                                            </td>
                                             <td>
                                                 <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                     <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#leaveapprove"><i class="icofont-check-circled text-success"></i></button>
                                                     <button type="button" class="btn btn-outline-secondary deleterow" data-bs-toggle="modal" data-bs-target="#leavereject"><i class="icofont-close-circled text-danger"></i></button>
                                                 </div>
                                             </td>
                                         </tr>
                                         <tr>
                                            <td>
                                                <a href="employee-profile.html" class="fw-bold text-secondary">#EMP : 00002</a>
                                            </td>
                                            <td>
                                                <img class="avatar rounded-circle" src="assets/images/xs/avatar5.jpg" alt="">
                                                <span class="fw-bold ms-1">Sally Graham</span>
                                            </td>
                                            <td>
                                                Medical Leave
                                            </td>
                                            <td>
                                                 01/05/2021
                                            </td>
                                            <td>
                                                 06/05/2021
                                            </td>
                                            <td>
                                                Hospital Admit
                                            </td>
                                             <td>
                                                 <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                     <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#leaveapprove"><i class="icofont-check-circled text-success"></i></button>
                                                     <button type="button" class="btn btn-outline-secondary deleterow" data-bs-toggle="modal" data-bs-target="#leavereject"><i class="icofont-close-circled text-danger"></i></button>
                                                 </div>
                                             </td>
                                         </tr>
                                         <tr>
                                            <td>
                                                <a href="employee-profile.html" class="fw-bold text-secondary">#EMP : 00005</a>
                                            </td>
                                            <td>
                                                <img class="avatar rounded-circle" src="assets/images/xs/avatar6.jpg" alt="">
                                                <span class="fw-bold ms-1">Robert Anderson</span>
                                            </td>
                                            <td>
                                                Medical Leave
                                            </td>
                                            <td>
                                                 03/05/2021
                                            </td>
                                            <td>
                                                 06/05/2021
                                            </td>
                                            <td>
                                                Hospital Admit
                                            </td>
                                             <td>
                                                 <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                     <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#leaveapprove"><i class="icofont-check-circled text-success"></i></button>
                                                     <button type="button" class="btn btn-outline-secondary deleterow" data-bs-toggle="modal" data-bs-target="#leavereject"><i class="icofont-close-circled text-danger"></i></button>
                                                 </div>
                                             </td>
                                         </tr>
                                         <tr>
                                            <td>
                                                <a href="employee-profile.html" class="fw-bold text-secondary">#EMP : 00014</a>
                                            </td>
                                            <td>
                                                <img class="avatar rounded-circle" src="assets/images/xs/avatar7.jpg" alt="">
                                                <span class="fw-bold ms-1">Ryan	Stewart</span>
                                            </td>
                                            <td>
                                                Casual Leave
                                            </td>
                                            <td>
                                                 10/07/2021
                                            </td>
                                            <td>
                                                 18/08/2021
                                            </td>
                                            <td>
                                               Famaily Holiday
                                            </td>
                                             <td>
                                                 <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                     <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#leaveapprove"><i class="icofont-check-circled text-success"></i></button>
                                                     <button type="button" class="btn btn-outline-secondary deleterow" data-bs-toggle="modal" data-bs-target="#leavereject"><i class="icofont-close-circled text-danger"></i></button>
                                                 </div>
                                             </td>
                                         </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                  </div>
                </div><!-- Row End -->
            </div>
        </div>
    </div>
    @endsection
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
