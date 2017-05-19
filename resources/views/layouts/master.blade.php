<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>
        @yield('title', "Sean's Stuff")
    </title>

    <!-- Link to Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- <link href="css/homepage.css" rel="stylesheet"> -->
    <style>
      #learn{
        background-color: #123456;
        border-color: #FFFFFF;
      }

      #heading, #header{
        color: #FFFFFF;
      }

      .jumbotron{
        background-image: url("http://www.planwallpaper.com/static/images/518169-backgrounds.jpg");
      }

      .btn-default, .btn, .btn-success{
        background-color: #123456;
        border-color: #FFFFFF;
        color: #FFFFFF;
      }

      #avatar{
        border-radius: 1000px;
      }

      #cover{
        height: auto;
        width: 360px;
        border-color:#000000;
        border-width: 4px;
        border-style: double;
      }


    </style>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">    
          @if(Auth::check())
            <?php
              echo 'Hello, ';
              echo Auth::user()->name;
              echo '!';
            ?>
          @else
            <?php
              echo 'Hello, Guest!'
            ?>
          @endif
          </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        @if(Auth::check())
          <li><a href="/about">About <span class="sr-only">(current)</span></a></li>
          <li><a href="/books/create">Create New Book<span class="sr-only">(current)</span></a></li>
          <li><a href="/logout">Logout<span class="sr-only">(current)</span></a></li>
        @else
          <li><a href="/about">About <span class="sr-only">(current)</span></a></li>
          <li><a href="/login">Login<span class="sr-only">(current)</span></a></li>
          <li><a href="/register">Register<span class="sr-only">(current)</span></a></li>
        @endif
      </ul>
          <form name = "searchForm" class="navbar-form navbar-right" onsubmit="return validateForm()" method="post">
            <div class="form-group">
              <input type="text" class="form-control" name = "searchInput">
            </div>
            <button type="submit" class="btn btn-success">Search</button>
          </form>
    </div><!-- /.navbar-collapse -->
        <div id="navbar" class="navbar-collapse collapse">

        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    @yield('content')

      <footer>
        <p>&copy; Sean Lim</p>
      </footer>
    </div> <!-- /container -->
    <p>
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
      <img style="border:0;width:88px;height:31px"
          src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
          alt="Valid CSS!" />
      </a>
    </p>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/javascript/homepage.js"></script>

  </body>
</html>
