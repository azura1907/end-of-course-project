@extends('master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>:: My-Task:: Employee Edit</title>
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/my-task.style.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    @section('employee-edit')
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
                            <li><a class="ms-link active" href="{{route('admin.employee.index')}}"> <span>Members</span></a></li>
                        </ul>
                    </li>
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
            <!-- Edit Employee-->
            <div class="row g-3 mb-3 row-deck">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Edit Employee Info</h3>
                    </div>
                </div>
            </div>
            <div class="body d-flex py-lg-3 py-md-2">
                <div class="modal-body">
                    <form action="{{ route('admin.employee.update',['id' => $employee->id]) }}" method="POST">
                        @csrf
                        <div class="w-25 mb-3">
                            <label class="form-label">Employee Id</label>
                            <input readonly class="form-control" name="employee_id" value="{{$employee->id}}">
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label class="form-label">Employee email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Input employee email" value="{{$employee->email}}" disabled>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Entry Date</label>
                                <input type="date" class="form-control" id="entry_date" name="entry_date" value={{$employee->entry_date}}>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Employee Name</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" 
                                placeholder="Input employee fullname" value="{{ $employee->fullname}}">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label  class="form-label">Department</label>
                                <select class="form-select" name="department"aria-label="Default select Project Category">
                                @foreach ($departments as $department)
                                    <option value={{$department->department_id}} {{$employee->department == $department->department_id ? 'selected' : ''}}>
                                        {{ $department->department_name }}
                                    </option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col">
                                <label  class="form-label">Role</label>
                                <select class="form-select" name="role" aria-label="Default select Project Category">
                                @foreach ($roles as $role)
                                    <option value={{$role->role_id}} {{$employee->role == $role->role_id ? 'selected' : ''}}>{{ $role->role_name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col">
                                <label class="form-label">Skills</label>
                                <select class="form-select" name="skills[]" id="skills" multiple="multiple" aria-label="Default select Project Category">
                                    @foreach ($skills as $skill)
                                        <option value={{$skill->skill_id}}>
                                            {{ $skill->skill_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status" id="status">
                                    <option value="1" {{$employee->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="2" {{$employee->status == 2 ? 'selected' : ''}}>Block</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-secondary mx-3 mt-1 mb-3">Update</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
<script type="text/javascript">
    $(document).ready(function() {
        $('#skills').select2();
        
        var skillsvalue = {!! json_encode($oldSkills) !!};
        const data = [];
        for (let index = 0; index < skillsvalue.length; index++) {
            const skillId = skillsvalue[index];
            data.push(skillId);
        }
        
        $('#skills').val(data).trigger('change');
    });
</script>
</body>
</html>
