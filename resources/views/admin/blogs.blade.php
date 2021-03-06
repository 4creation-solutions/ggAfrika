@extends('layouts.admin')
@section('content')

@if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
@endif

@if (Auth::user()->is_admin == 1)
 
<section class="" style="background-color: #eee;">
    <div class="fluid-container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 col-xl-10">
          <div class="card bg-white">
            <div class="card-header p-3">
              <a href="{{route('create')}}" class="btn btn-success float-right" data-toggle="tooltip" data-placement="left" title="{!! trans('tooltips.post.create') !!}">
                <i class="bi bi-plus" aria-hidden="true"></i>
                <span class="hidden-xs">
                    Create Post
                </span>
            </a>
            <h5 class="mb-0 text-center"><i class="bi bi-tasks me-2"></i>Blog Post you can share to your users</h5>
            </div>
            <div class="card-body overflow-auto" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px; overflow-x:auto; ">
              <table class="table mb-0" style="width: 1200px;">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Date Posted</th>
                    <th scope="col">Title</th>
                    <th scope="col">Writer</th>
                    <th scope="col">Image</th>
                    <th scope="col" width="280px">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allPosts as $allpost)
                      <tr class="fw-normal">
                      <th>
                        <span class="ms-2">{{ $allpost->id}}</span>
                      </th>
                      <td class="align-middle">
                        <span >{{$allpost->created_at}}</span >
                      </td>
                      <td class="align-middle">
                        <h6 class="mb-0"><span >{{$allpost->title}}</span></h6>
                      </td>

                      <td class="align-middle">
                        <h4 >{{$allpost->user->name}}</h4 >
                      </td>
                      <td class="align-middle">
                        <span  ><img style="width:70px; height: 50px;" src="/storage/{{$allpost->potrait}}" alt="{{ $allpost->title}}"></span >
                      </td>
                      <td class="align-middle d-flex w-20 justify-content-between">
                        <a href="{{route('edit',$allpost->id)}}" class="btn btn-primary" data-mdb-toggle="tooltip" title="Edit"><i class="bi bi-pencil-fill"></i> Edit</a>
                        <a href="{{route('show',['post'=>$allpost->id])}}" class="btn btn-info" data-mdb-toggle="tooltip" title="View"><i class="bi bi-eye  me-3"></i> View</a>
                        <form method="POST" action="{{route('delete',['post'=>$allpost->id])}}">
                          @method('DELETE')
                          @csrf
                          <button type="submit"  class="btn btn-danger"><i class="bi bi-trash"></i>Delete</button>
                        </form>
                        <form method="POST" action="{{route('publish',['post'=>$allpost->id])}}">
                          @method('PUT')
                          @csrf
                          @if ($allpost->published == 1)
                          <button type="submit"  class="btn btn-warning"  ><i class="bi bi-x-octagon"></i> Remove</button>
                          @else
                          <button type="submit"  class="btn btn-success"  title="publish"><i class="bi bi-upload"></i> Publish</button>
                          @endif
                        </form>
                      </td>
                      </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @else
  <section class="vh-100" style="background-color: #eee;">
    <div class="fluid-container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 col-xl-10">
          <div class="card bg-white">
            <div class="card-header p-3">
              <a href="{{route('create')}}" class="btn btn-success float-right" data-toggle="tooltip" data-placement="left" title="{!! trans('tooltips.post.create') !!}">
                <i class="bi bi-plus" aria-hidden="true"></i>
                <span class="hidden-xs">
                    Create blog post
                </span>
            </a>
            <h5 class="mb-0"><i class="bi bi-tasks me-2"></i>Post List</h5>
            </div>
            <div class="card-body overflow-auto" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px; overflow-x:auto; ">
              <table class="table mb-0" style="width: 1200px;">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Date Posted</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                      <tr class="fw-normal">
                      <th>
                        <span class="ms-2">{{ $post->id}}</span>
                      </th>
                      <td class="align-middle">
                        <span >{{$post->created_at}}</span >
                      </td>
                      <td class="align-middle">
                        <h6 class="mb-0"><span >{{$post->title}}</span></h6>
                      </td>
                      <td class="align-middle">
                        <span ><img style="width:70px;" src="{{$post->potrait}}" alt=""></span >
                      </td>
                      <td class="align-middle d-flex w-20 justify-content-between">
                        <a href="{{route('edit',$post->id)}}" class="btn btn-primary" title="Edit"><i class="bi bi-edit  me-3 "></i>Edit</a>
                        <a href="{{route('show',['post'=>$post->id])}}" class="btn btn-info" ><i class="bi bi-eye  me-3"></i>View</a>
                      </td>
                      </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif
  @endsection
