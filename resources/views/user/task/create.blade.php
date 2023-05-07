<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Create</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/my-task.style.min.css')}}">
</head>
<body>
    <div class="container">
    <h1>User - Task Create</h1>
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Create Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.task.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput77" class="form-label">Task Name</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Input task title">
                    </div>
                    {{-- <div class="deadline-form">
                        <form> --}}
                            {{-- assign  to project --}}
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
                        {{-- </form>
                    </div> --}}
                    <div class="row g-3 mb-3">
                        <div class="col">
                            <label for="datepickerded" class="form-label">Task Start Date</label>
                            <input type="date" class="form-control" id="task_start_date" name="task_start_date">
                        </div>
                        <div class="col">
                            <label for="datepickerdedone" class="form-label">Task End Date</label>
                            <input type="date" class="form-control" id="task_end_date" name="task_end_date">
                        </div>
                    </div>
                    <div class="col-sm">
                        <label for="formFileMultipleone" class="form-label">Estimate cost (hour)</label>
                        <input type="text" name="estimated_cost" placeholder="Please input task estimation cost" class="form-control">
                    </div>
                    <div class="col-sm">
                        <label for="formFileMultipleone" class="form-label">Project</label>
                        <select class="form-select" name="project_id">
                            @foreach ($projects as $project)
                                <option selected value={{$project_id}}>{{$project->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="formFileMultipleone" class="form-label">Assignee</label>
                        <select class="form-select" name="assignee">
                            @foreach ($employees as $employee)
                                <option value={{$employee->id}}>{{$employee->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="exampleFormControlTextarea78" class="form-label">Description (optional)</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Add any extra details about the request"></textarea>
                    </div>
                    <button type="submit" class="btn btn-secondary mx-3 mt-1 mb-3">Create</button>
                </div>
            </form>
        </div>
        </div>
</body>
</div>
</html>