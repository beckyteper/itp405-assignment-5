<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tweet {{ $tweet->id }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>

    <div class="container">
      @if (session('successStatus'))
        <div class="alert alert-success" role="alert">
          {{ session('successStatus') }}
        </div>
      @endif

      <div class="">
        <h3>Tweet {{ $tweet->id }}</h3>
        <p>{{ $tweet->tweet }}</p>
        <a href="/tweets/{{ $tweet->id }}/edit" class="btn">Edit</a>
        <br>
        <a href="/">Return to List of Tweets</a>
      </div>
    </div>

  </body>
</html>
