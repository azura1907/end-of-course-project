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
    <div class="container">
        @section('user-project-index')
        <!-- main body area -->
            <!-- Body: Body -->
            <div class="body d-flex py-lg-3">
                <div class="container-xxl">
                    <div class="row g-3 mb-3 row-deck">
                        <div class="border-0 mb-4">
                            <div class="card-header p-0 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold py-3 mb-0">Projects</h3>
                                <div class="d-flex py-2 project-tab flex-wrap w-sm-100">
                                    <a href="{{route('user.project.create')}}">
                                        <button type="button" class="btn btn-dark me-1 mt-1 w-sm-100" ><i class="icofont-plus-circle me-2 fs-6"></i>Create Project</button>
                                    </a>
                                    <ul class="nav nav-tabs tab-body-header rounded ms-3 prtab-set w-sm-100" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#All-list" role="tab">All</a></li>
                                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Started-list" role="tab">Started</a></li>
                                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Approval-list" role="tab">Approval</a></li>
                                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Completed-list" role="tab">Completed</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row end  -->
                    <div class="row g-3 mb-3 row-deck">
                        <div class="col-lg-12 col-md-12 flex-column">
                            <div class="tab-content mt-4">
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
                                                            @if (Auth::user()->role == 2)
                                                            <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#taskcreate-{{$targetproject->project_id}}"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</button>
                                                            @endif
                                                            {{-- <a href="{{route('user.task.create', ['project_id' => $project->project_id]) }}"><button type="button" class="btn btn-outline-secondary"><i class="icofont-plus-circle me-2 fs-6"></i>Add Task</button></a> --}}
                                                        <br>
                                                            <a href="{{route('user.project.edit', ['id' => $targetproject->project_id]) }}"><button type="button" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i>Edit Project</button></a>
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-list avatar-list-stacked pt-2">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar2.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar1.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar3.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar4.jpg')}}" alt="">
                                                            <span class="avatar rounded-circle text-center pointer sm" data-bs-toggle="modal" data-bs-target="#addUser"><i class="icofont-ui-add"></i></span>
                                                        </div>
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
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-group-students "></i>
                                                                <span class="ms-2">4 Members</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-ui-text-chat"></i>
                                                                <span class="ms-2">3</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dividers-block"></div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <h4 class="small fw-bold mb-0">Progress</h4>
                                                        <span class="small light-danger-bg  p-1 rounded"><i class="icofont-ui-clock"></i> 15 Days Left</span>
                                                    </div>
                                                    <div class="progress" style="height: 8px;">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                        <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: 25%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                        <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: 39%" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Started-list">
                                    <div class="row g-3 gy-5 py-3 row-deck">
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mt-5">
                                                        <div class="lesson_name">
                                                            <div class="project-block light-info-bg">
                                                                <i class="icofont-paint"></i>
                                                            </div>
                                                            <span class="small text-muted project_name fw-bold"> Social Geek Made </span>
                                                            <h6 class="mb-0 fw-bold  fs-6  mb-2">UI/UX Design</h6>
                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editproject"><i class="icofont-edit text-success"></i></button>
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-list avatar-list-stacked pt-2">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar2.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar1.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar3.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar4.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar8.jpg')}}" alt="">
                                                            <span class="avatar rounded-circle text-center pointer sm" data-bs-toggle="modal" data-bs-target="#addUser"><i class="icofont-ui-add"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2 pt-4">
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-paper-clip"></i>
                                                                <span class="ms-2">5 Attach</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-sand-clock"></i>
                                                                <span class="ms-2">4 Month</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-group-students "></i>
                                                                <span class="ms-2">5 Members</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-ui-text-chat"></i>
                                                                <span class="ms-2">10</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dividers-block"></div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <h4 class="small fw-bold mb-0">Progress</h4>
                                                        <span class="small light-danger-bg  p-1 rounded"><i class="icofont-ui-clock"></i> 35 Days Left</span>
                                                    </div>
                                                    <div class="progress" style="height: 8px;">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                        <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: 25%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                        <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Approval-list">
                                    <div class="row g-3 gy-5 py-3 row-deck">
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mt-5">
                                                        <div class="lesson_name">
                                                            <div class="project-block light-info-bg">
                                                                <i class="icofont-paint"></i>
                                                            </div>
                                                            <span class="small text-muted project_name fw-bold"> Software Chasers </span>
                                                            <h6 class="mb-0 fw-bold  fs-6  mb-2">UI/UX Design</h6>
                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editproject">
                                                                <i class="icofont-edit text-success"></i>
                                                                <a href="#"></a>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-list avatar-list-stacked pt-2">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar2.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar1.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar3.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar4.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar8.jpg')}}" alt="">
                                                            <span class="avatar rounded-circle text-center pointer sm" data-bs-toggle="modal" data-bs-target="#addUser"><i class="icofont-ui-add"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2 pt-4">
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-paper-clip"></i>
                                                                <span class="ms-2">5 Attach</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-sand-clock"></i>
                                                                <span class="ms-2">4 Month</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-group-students "></i>
                                                                <span class="ms-2">5 Members</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-ui-text-chat"></i>
                                                                <span class="ms-2">10</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dividers-block"></div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <h4 class="small fw-bold mb-0">Progress</h4>
                                                        <span class="small light-warning-bg  p-1 rounded"><i class="icofont-ui-clock"></i> Approval</span>
                                                    </div>
                                                    <div class="progress" style="height: 8px;">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                        <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: 0%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                        <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: 0%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Completed-list">
                                    <div class="row g-3 gy-5 py-3 row-deck">
                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between mt-5">
                                                        <div class="lesson_name">
                                                            <div class="project-block light-info-bg">
                                                                <i class="icofont-paint"></i>
                                                            </div>
                                                            <span class="small text-muted project_name fw-bold"> Sunburst </span>
                                                            <h6 class="mb-0 fw-bold  fs-6  mb-2">UI/UX Design</h6>
                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#deleteproject"><i class="icofont-ui-delete text-danger"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-list avatar-list-stacked pt-2">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar2.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar1.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar3.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar4.jpg')}}" alt="">
                                                            <img class="avatar rounded-circle sm" src="{{asset('theme/dist/assets/images/xs/avatar8.jpg')}}" alt="">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row g-2 pt-4">
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-paper-clip"></i>
                                                                <span class="ms-2">5 Attach</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-sand-clock"></i>
                                                                <span class="ms-2 text-success">Completed</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-group-students "></i>
                                                                <span class="ms-2">5 Members</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <i class="icofont-ui-text-chat"></i>
                                                                <span class="ms-2">10</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dividers-block"></div>
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <h4 class="small fw-bold mb-0">Progress</h4>
                                                        <span class="small light-success-bg  p-1 rounded"><i class="icofont-ui-clock"></i> Completed</span>
                                                    </div>
                                                    <div class="progress" style="height: 8px;">
                                                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                        <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: 25%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                        <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: 50%" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            <button type="button" class="btn btn-outline-secondary deleterow"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#removetask-{{$task->task_id}}"><i class="icofont-close-circled text-danger"></i></button>
                                                        </div>
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