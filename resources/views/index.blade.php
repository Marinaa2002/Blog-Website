<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Codezilla Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{route('posts.index')}}">All Posts</a>
        </li>
      </ul>
    
    </div>
  </div>
</nav>
<div class="container mt-5">
    <div class= "text-center">
        <a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a>
    </div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post['id']}}</th>
      <td>{{$post['title']}}</td>
      <td>{{$post->user? $post->user->name : "Not Found"}}</td>
      <td>{{$post['created_at']}}</td>
      <td> 
        <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View</a>
        <a href="{{route('posts.edit', $post['id'])}}" class="btn btn-primary">Edit</a>
        <form style="display: inline" method="POST" action="{{route('posts.destroy', $post['id'])}}">
          @csrf
          @method('DELETE')
        <button type="submit" href="{{route('posts.destroy', $post['id'])}}" class="btn btn-danger">Delete</button>
      </form>
        
    </td> 
    </tr>
    @endforeach
  </tbody>
</table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>