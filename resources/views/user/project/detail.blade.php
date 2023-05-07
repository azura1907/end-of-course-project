@extends('master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Detail</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/my-task.style.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/dist/assets/plugin/datatables/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/dist/assets/plugin/datatables/dataTables.bootstrap5.min.css')}}">
</head>
<body>
    <div id="mytask-layout" class="theme-indigo">
        @section('user-project-detail')
        <div class="main px-lg-4 px-md-4">
            <div class="container">
            <!-- Body: Header -->
                <div class="header">
                    <nav class="navbar py-4">
                        <div class="container-xxl">
            
                            <!-- header rightbar icon -->
                            <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                                <div class="d-flex">
                                    <a class="nav-link text-primary collapsed" href="help.html" title="Get Help">
                                        <i class="icofont-info-square fs-5"></i>
                                    </a>
                                </div>
                                <div class="dropdown notifications zindex-popover">
                                    <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
                                        <i class="icofont-alarm fs-5"></i>
                                        <span class="pulse-ring"></span>
                                    </a>
                                    <div id="NotificationsDiv" class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-sm-end p-0 m-0">
                                        <div class="card border-0 w380">
                                            <div class="card-header border-0 p-3">
                                                <h5 class="mb-0 font-weight-light d-flex justify-content-between">
                                                    <span>Notifications</span>
                                                    <span class="badge text-white">11</span>
                                                </h5>
                                            </div>
                                            <div class="tab-content card-body">
                                                <div class="tab-pane fade show active">
                                                    <ul class="list-unstyled list mb-0">
                                                        <li class="py-2 mb-1 border-bottom">
                                                            <a href="javascript:void(0);" class="d-flex">
                                                                <img class="avatar rounded-circle" src="{{asset('theme/dist/assets/images/xs/avatar1.jpg')}}" alt="">
                                                                <div class="flex-fill ms-2">
                                                                    <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Dylan Hunter</span> <small>2MIN</small></p>
                                                                    <span class="">Added  2021-02-19 my-Task ui/ux Design <span class="badge bg-success">Review</span></span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="py-2 mb-1 border-bottom">
                                                            <a href="javascript:void(0);" class="d-flex">
                                                                <div class="avatar rounded-circle no-thumbnail">DF</div>
                                                                <div class="flex-fill ms-2">
                                                                    <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Diane Fisher</span> <small>13MIN</small></p>
                                                                    <span class="">Task added Get Started with Fast Cad project</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="py-2 mb-1 border-bottom">
                                                            <a href="javascript:void(0);" class="d-flex">
                                                                <img class="avatar rounded-circle" src="{{asset('theme/dist/assets/images/xs/avatar3.jpg')}}" alt="">
                                                                <div class="flex-fill ms-2">
                                                                    <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Andrea Gill</span> <small>1HR</small></p>
                                                                    <span class="">Quality Assurance Task Completed</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="py-2 mb-1 border-bottom">
                                                            <a href="javascript:void(0);" class="d-flex">
                                                                <img class="avatar rounded-circle" src="{{asset('theme/dist/assets/images/xs/avatar5.jpg')}}" alt="">
                                                                <div class="flex-fill ms-2">
                                                                    <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Diane Fisher</span> <small>13MIN</small></p>
                                                                    <span class="">Add New Project for App Developemnt</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="py-2 mb-1 border-bottom">
                                                            <a href="javascript:void(0);" class="d-flex">
                                                                <img class="avatar rounded-circle" src="{{asset('theme/dist/assets/images/xs/avatar6.jpg')}}" alt="">
                                                                <div class="flex-fill ms-2">
                                                                    <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Andrea Gill</span> <small>1HR</small></p>
                                                                    <span class="">Add Timesheet For Rhinestone project</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="py-2">
                                                            <a href="javascript:void(0);" class="d-flex">
                                                                <img class="avatar rounded-circle" src="{{asset('theme/dist/assets/images/xs/avatar7.jpg')}}" alt="">
                                                                <div class="flex-fill ms-2">
                                                                    <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Zoe Wright</span> <small class="">1DAY</small></p>
                                                                    <span class="">Add Calander Event</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a class="card-footer text-center border-top-0" href="#"> View all notifications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                                    <div class="u-info me-2">
                                        <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold">Dylan Hunter</span></p>
                                        <small>Admin Profile</small>
                                    </div>
                                    <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                                        <img class="avatar lg rounded-circle img-thumbnail" src="{{asset('theme/dist/assets/images/profile_av.png')}}" alt="profile">
                                    </a>
                                    <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                        <div class="card border-0 w280">
                                            <div class="card-body pb-0">
                                                <div class="d-flex py-1">
                                                    <img class="avatar rounded-circle" src="assets/images/profile_av.png" alt="profile">
                                                    <div class="flex-fill ms-3">
                                                        <p class="mb-0"><span class="font-weight-bold">Dylan Hunter</span></p>
                                                        <small class="">Dylan.hunter@gmail.com</small>
                                                    </div>
                                                </div>
                                                
                                                <div><hr class="dropdown-divider border-dark"></div>
                                            </div>
                                            <div class="list-group m-2 ">
                                                <a href="task.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-tasks fs-5 me-3"></i>My Task</a>
                                                <a href="members.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user-group fs-6 me-3"></i>members</a>
                                                <a href="ui-elements/auth-signin.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-6 me-3"></i>Signout</a>
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
                    
                    <div class="body d-flex py-lg-3 py-md-2">
                        <div class="container-xxl">
                            <div class="row align-items-center">
                                <div class="border-0 mb-4">
                                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                        <h3 class="fw-bold mb-0">Role List</h3>
                                        <div class="col-auto d-flex w-sm-100">
                                            <a href="{{route('admin.role.create')}}">
                                                <button type="button" class="btn btn-dark btn-set-task w-sm-100"><i class="icofont-plus-circle me-2 fs-6"></i>Add Role</button>
                                            </a>
                                            </div>
                                    </div>
                                </div>
                            </div> <!-- Row end  -->
                            <div class="row clearfix g-3">
                            <div class="col-sm-12">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <table id="roleTable" class="table table-hover align-middle mb-0" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Role Id</th>
                                                        <th>Role Name</th>
                                                        <th>Detail</th>
                                                        <th>Status</th>
                                                        <th>View rights</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($roles as $role)
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="fw-bold text-secondary">{{ $role->role_id}}</a>
                                                        </td>
                                                    <td>
                                                        <span class="fw-bold ms-1">{{$role->role_name}}</span>
                                                    </td>
                                                    <td>
                                                            <p>{{$role->role_detail}}</p>
                                                    </td>
                                                    <td>
                                                            <p>{{$role->status == 1 ? 'Active' : 'Deactived'}}</p>
                                                    </td>
                                                    <td>
                                                            <p>{{$role->view_right}}</p>
                                                    </td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                <a href="{{route('admin.role.destroy',['id' => $role->role_id])}}">
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
                            </div><!-- Row End -->
                        </div>
                    </div>
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
               $('#roleTable')
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