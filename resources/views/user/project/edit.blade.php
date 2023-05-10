@extends('master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Edit</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/my-task.style.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <div class="container">
        @section('user-project-edit')
        <div class="main px-lg-4 px-md-4">
            <div class="body d-flex py-lg-3 py-md-2">
                    <h5 class="modal-title fw-bold" id="createprojectlLabel"> Project Info Edit</h5>
                    <form class="mt-2" action="{{ route('user.project.update', ['id', $project->project_id])}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput77" class="form-label">Project Name</label>
                                <input type="text" class="form-control" id="project_title" name="project_title" placeholder="Explain what the Project Name">
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">Project Category</label>
                                <select class="form-select" name="project_category" aria-label="Default select Project Category">
                                    @foreach ($project_categories as $project_category)
                                    <option value={{ $project_category->category_id }}>{{ $project_category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="deadline-form">
                                <form>
                                    <div class="row g-3 mb-3">
                                        <div class="col">
                                            <label for="datepickerded" class="form-label">Project Start Date</label>
                                            <input type="date" class="form-control" id="project_start_date" name="project_start_date">
                                        </div>
                                        <div class="col">
                                            <label for="datepickerdedone" class="form-label">Project End Date</label>
                                            <input type="date" class="form-control" id="project_end_date" name="project_end_date">
                                        </div>
                                    </div>
                                    {{-- assign employee to project --}}
                                    {{-- <div class="row g-3 mb-3">
                                        <div class="col-sm-12">
                                            <label for="formFileMultipleone" class="form-label">Assginee</label>
                                            <select class="form-select" multiple aria-label="Default select Priority">
                                                @foreach ($employees as $employee)
                                                <option value={{ $employee->id }}>{{ $employee->email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> --}}
                                </form>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-sm">
                                    <label for="formFileMultipleone" class="form-label">Estimated cost</label>
                                    <input type="number" class="form-control" id="project_estimated_cost" name="project_estimated_cost">
                                </div>
                                <div class="col-sm">
                                    <label for="formFileMultipleone" class="form-label">Project Phase</label>
                                    <select class="form-select" aria-label="Default select Priority" name="project_phase">
                                        <option selected value="1">Planning</option>
                                        <option value="2">Implement</option>
                                        <option value="3">Testing</option>
                                        <option value="4">Finalize</option>
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label for="formFileMultipleone" class="form-label">Project lead</label>
                                    <select class="form-select" name="project_lead" id="project_lead">
                                        @foreach ($employees as $employee)
                                            <option value={{$employee->id}}>{{$employee->fullname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm">
                                    <label for="formFileMultipleone" class="form-label">Employees</label>
                                    <select class="form-select" name="employees_id[]" id="employees_id" multiple="multiple">
                                        @foreach ($employees as $employee)
                                            <option value={{$employee->id}}>{{$employee->fullname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
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
                                <div class="col-sm">
                                    <label for="formFileMultipleone" class="form-label">Department</label>
                                    <select class="form-select" name="department">
                                        @foreach ($departments as $department)
                                            <option value={{$department->department_id}}>{{$department->department_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description (optional)</label>
                                <textarea class="form-control" id="project_description" name="project_description" rows="3" placeholder="Add any extra details about the request"></textarea>
                            </div>
                            <button type="submit" class="btn btn-secondary mx-3 mt-1 mb-3">Create</button>
                        </div>
                    </form>
            </div>
        </div>
        @endsection
    </div>
<script>
    $(document).ready(function() {
        $('#project_lead').select2(
        );

        $('#employees_id').select2(
        );

        $('#required_skills').select2(
        );

        $('#required_roles').select2(
        );
    });
</script>
</body>
</div>
</html>