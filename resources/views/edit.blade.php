<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
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
<form method="POST" action="{{route('posts.update',$post['id'])}}">
    @csrf
    @method('PUT')
<div class="container center mb-3">
  <label class="form-label">Title</label>
  <input name = 'title' type="text" value="{{$post['title']}}"class="form-control" >
</div>
<div class="container center mb-3">
  <label class="form-label">Description</label>
  <textarea name = 'description' class="form-control" rows="3" >{{$post['description']}}</textarea>
</div>

<div class="container center mb-3">
<label class="form-label">Post Creator</label>
<select name = 'postCreator' class="form-select" aria-label="Default select example">
  @foreach($users as $user)
  <option @if($user->id == $post-> user_id) selected @endif value="{{$user['id']}}">{{$user['name']}}</option>
  @endforeach
</select>
</div>
<div class="container center mb-3">
<button class="btn btn-primary">Update</button>
</div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>