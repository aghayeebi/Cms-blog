@extends('layouts.auth')

@section('content')
<!-- partial -->
<div class="container-fluid page-body-wrapper">
    <!-- partial:../../partials/_sidebar.html -->



    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title"> Posts </h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Posts</a></li>
              <li class="breadcrumb-item active" aria-current="page">All Posts </li>
            </ol>
          </nav>
        </div>
        <div class="row">


          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">

              <div class="card-body">
                @if (count($posts) > 0)
                <h4 class="card-title">Posts</h4>

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th> Image </th>
                      <th> Title </th>
                      <th> Description </th>
                      <th> Category </th>
                      <th> Action </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td class="py-1">
                          <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                        </td>
                        <td> {{$post->title}} </td>
                        <td>
                            {{ Str::limit($post->description, 15, '...') }}
                        </td>
                        <td>  {{$post->category->name}}</td>

                        <td> $ 77.99 </td>
                        <td> May 15, 2015 </td>
                      </tr>

                    @endforeach

                  </tbody>
                </table>

                @else
                <h3 class="text-center text-danger">No Post found</h3>
                @endif
              </div>
            </div>
          </div>


          </div>
        </div>
      </div>
    </div>
@endsection
