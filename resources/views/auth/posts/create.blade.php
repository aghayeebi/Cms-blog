@extends('layouts.auth')

@section('title', 'Create Post')

{{--@section('styles')--}}
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

@endpush

{{--@endsection--}}

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Posts </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Posts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Post</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Create Post</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>

                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="forms-sample" method="post" action="{{route('posts.store')}}"
                              enctype="multipart/form-data"  data-parsley-validate>
                            <input type="hidden" name="_token" value="{{csrf_token()}}" id="">
                            <div class="form-group">
                                <label for="exampleInputName1">title</label>
                                <input name="title" type="text" class="form-control" id="exampleInputName1"
                                       placeholder="Title" value="{{old('title')}}" required>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control" required>
                                    <option disabled selected>Choose Option</option>
                                    @if(count($category) > 0)
                                        @foreach($category as $cat)
                                            <option
                                                @selected(old('category') === $cat->id ) value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                </select>

                                @endif

                            </div>
                            <div class="form-group">
                                <label>Published</label>
                                <select name="is_publish" class="form-control" required>
                                    <option disabled selected>Choose Options</option>
                                    <option @selected(old('is_publish') === 1) value="1">Published</option>
                                    <option @selected(old('is_publish') === 0) value="0">Draft</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="file" class="form-control" id="" required>
                            </div>

                            <div class="form-group">
                                <label for="Description"></label><textarea name="description" class="form-control"
                                                                           id="summernote" rows="4"
                                                                           required>{{old('description')}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

{{--@section('scripts')--}}

@push('scripts')
    <script src="jquery.js"></script>
    <script src=""></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote();
        });
    </script>
@endpush


{{--@endsection--}}
