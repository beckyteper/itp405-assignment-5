<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit a Tweet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>

    <div class="container">
      @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <h1>Edit a Tweet</h1>

      <form action="/tweets/{{ $tweet->id }}/update" method="post">
          {{ csrf_field() }}
        <div class="form-group">
          <label for="tweet">Tweet</label>
          <textarea name="tweet" id="tweet" class="form-control" rows="4" cols="80">{{ $tweet->tweet }}</textarea>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>

  </body>
</html>
