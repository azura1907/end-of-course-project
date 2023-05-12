@extends('master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Edit</title>
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/my-task.style.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    @section('user-project-edit')
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
                                <li><a class="ms-link" href="{{route('user.employee.index')}}"> <span>Members</span></a></li>
                            @endif
                            @if (Auth::user()->view_right !== 1)
                                <li><a class="ms-link" href="{{route('admin.employee.index')}}"> <span>Members</span></a></li>
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
            <div class="body d-flex py-lg-3 py-md-2">
                    <h5 class="modal-title fw-bold" id="createprojectlLabel"> Project Info Edit</h5>
                    <form class="mt-2" action="{{ route('user.project.update', ['id', $project->project_id])}}" method="POST">
                        @csrf
                        <div class="w-25 mb-3">
                            <label class="form-label">Project Id</label>
                            <input readonly class="form-control" name="project_id" value="{{$project->project_id}}">
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput77" class="form-label">Project Title</label>
                                <input type="text" class="form-control" id="project_title" name="project_title" value="{{$project->project_title}}" placeholder="Explain what the Project Name">
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Project Category</label>
                                <select class="form-select" name="project_category" aria-label="Default select Project Category">
                                    @foreach ($project_categories as $project_category)
                                    <option value={{ $project_category->category_id }} {{$project->project_category == $project_category->category_id ? 'selected' : ''}}>{{ $project_category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="deadline-form">
                                <form>
                                    <div class="row g-3 mb-3">
                                        <div class="col">
                                            <label for="datepickerded" class="form-label">Project Start Date</label>
                                            <input type="date" class="form-control" id="project_start_date" name="project_start_date" value={{$project->project_start_date}}>
                                        </div>
                                        <div class="col">
                                            <label for="datepickerdedone" class="form-label">Project End Date</label>
                                            <input type="date" class="form-control" id="project_end_date" name="project_end_date" value={{$project->project_end_date}}>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-sm">
                                    <label for="formFileMultipleone" class="form-label">Project Unit Price ($)</label>
                                    <input type="number" class="form-control" id="project_estimated_cost" name="project_estimated_cost" value={{$project->project_estimated_cost}}>
                                </div>
                                <div class="col-sm">
                                    <label for="formFileMultipleone" class="form-label">Project Phase</label>
                                    <select class="form-select" aria-label="Default select Priority" name="project_phase">
                                        <option value="1" {{$project->project_phase == 1 ? 'selected' : ''}}>Planning</option>
                                        <option value="2" {{$project->project_phase == 2 ? 'selected' : ''}}>Implement</option>
                                        <option value="3" {{$project->project_phase == 3 ? 'selected' : ''}}>Testing</option>
                                        <option value="4" {{$project->project_phase == 4 ? 'selected' : ''}}>Finalize</option>
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label for="formFileMultipleone" class="form-label">Project lead</label>
                                    <select class="form-select" name="project_lead" id="project_lead">
                                        @foreach ($employees as $employee)
                                            <option value={{$employee->id}} {{$project->project_lead == $employee->id ? 'selected' : ''}}>{{$employee->fullname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-sm">
                                    <label for="formFileMultipleone" class="form-label">Employees</label>
                                    <select class="form-select" name="employees_id[]" id="employees_id" multiple="multiple">
                                        @foreach ($employees as $employee)
                                            <option value={{$employee->id}}>{{$employee->fullname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label for="formFileMultipleone" class="form-label">Skills</label>
                                    <select class="form-select" name="required_skills[]" id="required_skills" multiple="multiple">
                                        @foreach ($skills as $skill)
                                            <option value={{$skill->skill_id}}>{{$skill->skill_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label for="formFileMultipleone" class="form-label">Roles</label>
                                    <select class="form-select" name="required_roles[]" id="required_roles" multiple="multiple">
                                        @foreach ($roles as $role)
                                            <option value={{$role->role_id}}>{{$role->role_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-sm">
                                    <label for="formFileMultipleone" class="form-label">Department</label>
                                    <select class="form-select" name="department">
                                        @foreach ($departments as $department)
                                            <option value={{$department->department_id}} {{$project->department == $department->department_id ? 'selected' : ''}}>{{$department->department_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label class="form-label">Description (optional)</label>
                                    <textarea class="form-control" id="project_description" name="project_description" rows="3" placeholder="Add any extra details about the request">{{$project->project_description}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-secondary mt-1 mb-3">Update</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    @endsection
<script>
    $(document).ready(function() {
        //show old project lead data
        $('#project_lead').select2();
        var prjLeadValue = {!! json_encode($oldPrjLead) !!};
        const prjLeadData = [];
        for (let index = 0; index < prjLeadValue.length; index++) {
            const prjLeadId = prjLeadValue[index];
            prjLeadData.push(prjLeadId);
        }
        
        //show old assignees data
        $('#employees_id').select2();
        var assigneesvalue = {!! json_encode($oldAssignee) !!};
        const assigneeData = [];
        for (let index = 0; index < assigneesvalue.length; index++) {
            const assigneeId = assigneesvalue[index];
            assigneeData.push(assigneeId);
        }
        $('#employees_id').val(assigneeData).trigger('change');

        //show old skills data
        $('#required_skills').select2();
        var skillsvalue = {!! json_encode($oldSkills) !!};
        const skillData = [];
        for (let index = 0; index < skillsvalue.length; index++) {
            const skillId = skillsvalue[index];
            skillData.push(skillId);
        }
        $('#required_skills').val(skillData).trigger('change');

        //show old roles data
        $('#required_roles').select2();
        var rollsValue = {!! json_encode($oldRoles) !!};
        const roleData = [];
        for (let index = 0; index < rollsValue.length; index++) {
            const roleId = rollsValue[index];
            roleData.push(roleId);
        }
        $('#required_roles').val(roleData).trigger('change');

    });
</script>
</body>
</div>
</html>