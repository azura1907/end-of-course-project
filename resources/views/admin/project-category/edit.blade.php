@extends('master')
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: My-Task:: Forms</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/plugin/parsleyjs/css/parsley.css')}}">

    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('theme/dist/assets/css/my-task.style.min.css')}}">
</head>
<body>
<div id="mytask-layout" class="theme-indigo">
    @section('project-category-edit')
    <div class="main px-lg-4 px-md-4 mt-4">
        <!-- Body: Form -->
        <div class="card mb-3">
            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                <h6 class="mb-0 fw-bold ">Edit Project Category</h6> 
            </div>
            <div class="card-body">
                <form id="advanced-form" action="{{route('admin.project-category.update', ['id' => $project_category->category_id]) }}" method="POST">
                    @csrf
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text-input1" class="form-label">Project Category Name</label>
                                    <input type="text" 
                                    id="category_name" 
                                    name="category_name" 
                                    class="form-control"
                                    value="{{ old('category_name', $project_category->category_name) }}"
                                    required data-parsley-minlength="8">
                                    <br />
                                    <label for="text-input4" class="form-label">Project Category Detail</label>
                                    <input type="text" id="category_detail" name="category_detail" class="form-control"
                                    value="{{ old('category_detail', $project_category->category_detail) }}">
                                    <br />
                                    <label class="form-label">Status</label>
                                    <br />
                                        <td>
                                            <input type="radio" name="status" value="1" {{ old('status', 1) == 1 ? 'checked' : '' }}> Active
                                            <input type="radio" name="status" value="2" {{ old('status') == 2 ? 'checked' : '' }}> Block
                                          </td>
                                    <br />
                                </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
            </div>
        </div>
    </div>
    @endsection
    <!-- Jquery Core Js -->
    <script src="{{asset('theme/dist/assets/bundles/libscripts.bundle.js')}}"></script>

    <!-- Plugin Js-->
    <script src="{{asset('theme/dist/assets/plugin/parsleyjs/js/parsley.js')}}"></script>
        
    <!-- Jquery Page Js -->
    <script src="{{asset('theme/js/template.js')}}"></script>     
    <script>
        $(function() {
            // initialize after multiselect
            $('#basic-form').parsley();
        });
    </script>
</div>
</body>
</html>