<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create a Tweet</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>

    <div class="container">
      @if (session('successStatus'))
        <div class="alert alert-success" role="alert">
          {{ session('successStatus') }}
        </div>
      @endif

      @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <h1>Create a Tweet</h1>

      <form action="/" method="post">
          {{ csrf_field() }}
        <div class="form-group">
          <label for="tweet">Tweet</label>
          <textarea name="tweet" id="tweet" class="form-control" rows="4" cols="80">{{ old('tweet') }}</textarea>
          <button type="submit" class="btn btn-primary">Tweet</button>
        </div>
      </form>

      <table class="table">
        <thead>
          <tr>
            <th colspan="3">Tweets</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tweets as $tweet)
            <tr>
              <td>{{ $tweet->tweet }}</td>
              <td>
                <a href="/tweets/{{ $tweet->id }}" class="btn">View</a>
              </td>
              <td>
                <a href="/{{ $tweet->id }}/delete" class="btn">X</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>

  </body>
</html>
