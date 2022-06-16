<html>
<head>
  <title> Admin - ggAfrika Creating Blog </title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Font Awesome Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
   <link
	rel="stylesheet"
	href="//cdnjs.cloudflare.com/ajax/libs/jodit/3.18.9/jodit.min.css"
/>
<script src="//cdnjs.cloudflare.com/ajax/libs/jodit/3.18.9/jodit.min.js"></script>
</head>
<style>
  body {
    font-family: 'Varela Round', sans-serif;
  }
  .btn-primary {
    background-color: #ffc107;
    border-color: #ffc107;
  }
  .btn-primary:hover {
    background-color: #ffc107;
    border-color: #ffc107;
  }
</style>

<body>
  <div class="">
    <div class="container">
      <div class="">
        <a href="{{route('admin')}}" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="{!! trans('tooltips.post.create') !!}">
          <i class="fas fa-plus" aria-hidden="true"></i>
          <span class="hidden-xs">
            Back To DashBoard
          </span>
        </a>
        <a href="#" class="btn btn-success" style="float:right;" data-toggle="modal" data-target="#form" data-placement="right" title="{!! trans('tooltips.post.create') !!}">
          <i class="fas fa-plus" aria-hidden="true"></i>
          <span class="hidden-xs">
            Add New Category
          </span>
        </a>
        <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header border-bottom-0">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="{{route('cat')}}" enctype='multipart/form-data'>
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name">
                  </div>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h1>Edit Post</h1>
            <div class="card-body">
              <form action="{{route('update',$post->id)}}" method="POST" enctype='multipart/form-data'>
                @csrf
                @method('PUT')
                

                <div class="form-group">
                  <label for="title">Title <span class="require">*</span></label>
                  <input type="text" value="{{$post->title}}" class="form-control" name="title" />
                </div>
                <div class="form-group">
                  <label for="category">Choose Category</label>
                  <select class="form-control" id="category" name="category">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id}}">{{$category->name}}</option>
                    @endforeach

                  </select>
                </div>
                <div class="form-group">
                  <label for="image" class="form-label">Post Image </label>
                  <input class="form-control form-control-lg" value="{{ $post->potrait }}" id="image" name="image" type="file">
                  
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea value="" rows="5" class="form-control" name="description">{{$post->about}}</textarea>
                </div>
                <div class="form-group">
                  <label for="content">Content</label>
                  <textarea value="" name="content" id="content">{{$post->body}}</textarea>
                </div>

                <div class="form-group">
                  <p><span class="require">*</span> - required fields</p>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">
                    Update
                  </button>
                  <button class="btn btn-default">
                    Cancel
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
	const editor = Jodit.make('#editor', {
    height: 400
  });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>