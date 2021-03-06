@extends('index')

@section('title')
    {!! $post->title !!}
@endsection

@section('content')
<style>
   .link {
    color: #ec971f;
   }

   .link:hover{
    color: #ec971f;
    text-decoration: none;
   }
   .show > img {
    object-fit: cover;
   }
</style>


<div class="container pt-5">

      <div class="text-center">
         <h3 class="title"><a href="{{ url('/') }}" class="link">Home</a><i class="bi bi-slash"></i>{{ $post->title }}</h3>
      </div>
  
   <hr>

    <div class="row">
        <div class="col-lg-7 col-sm-12">
            <div class="card">
                <div class="text-center pt-2">
                       <i class="bi bi-clock pri"></i><small> {{ $post->created_at }}</small>
                    </div>
                <div class="justify">
                    <img src="/storage/{{$post->potrait}}" alt="{{ $post->title }}" class="card-img" style="height:200px; object-fit: cover;">
                </div>
                <div class="card-body">
                    <div class="container show">
                        {!!  $post->body  !!}
                    </div>
                </div>
            </div>
        </div>
    <div class="col-lg-5 col-sm-12">
        <h2 class="text-center title">Related Posts</h2>
        <div class="card">
            <div class="card-body">
            @foreach ($related as $category)
            <div class="row no-gutters">
                <div class="col">
                    <h3 class="title">{{ \Illuminate\Support\Str::limit($category->title, 20, $end='...') }}</h3>
                    <p>{{ \Illuminate\Support\Str::limit($category->about, 30, $end='...') }}</p>
                    <a href="{{ route('show', $category->id ) }}" class="btn btn-warning">Read More <i class="bi bi-arrow-right-short"></i></a>
                </div>
                <div class="col">
                    <img src="/storage/{{$category->potrait}}" alt="{{ $category->title }}" class="card-img-top" style="height:150px;object-fit: cover;">
                </div>
            </div>
            <hr>
            @endforeach
            </div>
        </div>
    </div>
</div>
</div>
@endsection