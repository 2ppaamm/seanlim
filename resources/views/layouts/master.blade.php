<!DOCTYPE html>
<html lang="en" ng-app="searchApp">
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

    <link href="/css/homepage.css" rel="stylesheet">

    <link rel="icon" href="/images/favicon.ico" sizes="16x16" type="image/x-icon">

  </head>
  <body ng-controller="searchController">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">
            @if(Auth::user())
              <img src = "{{Auth::user()->image}}" alt = "{{Auth::user()->name}}'s avatar" style="max-height:40px; margin-top:-10px;"></img>
            @else
              <img src = "images/favicon.png" alt = "Seanbooks logo" style="max-height:40px; margin-top:-10px;" />
            @endif
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="/">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="/about">About <span class="sr-only">(current)</span></a></li>
          @if(Auth::check())
            <li><a href="/books/create">Create New Book<span class="sr-only">(current)</span></a></li>
            <li><a href="/logout">Logout<span class="sr-only">(current)</span></a></li>
          @else
          @desktop 
            <li><a onclick="lock.show();">Login or Register<span class="sr-only">(current)</span></a></li>
          @elsedesktop
            <li><a href="/login">Login or Register<span class="sr-only">(current)</span></a></li>
          @enddesktop
          @endif
          </ul>
          <form id = "searchForm" class="navbar-form navbar-right" action='/search'>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search Book/Chapter" ng-model="searchInput.title">
              <input type="hidden" ng-model="searchInput.name" ng-bind="searchChapter.name = searchInput.title"/>
            </div>
          </form>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
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
    <script src="https://cdn.auth0.com/js/lock/10.15/lock.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js"></script>
        <script>
          var lock = new Auth0Lock('wtFlUHJRvMDfov_5cIYZ2pguRkEkTwFV', 'seanlim.au.auth0.com', {
            auth: {
              redirectUrl: 'https://www.sunshine-boy.me/auth0/callback',
              responseType: 'code',
              params: {
                scope: 'openid email', // Learn about scopes: https://auth0.com/docs/scopes
              }
            },
            theme: {
              logo: 'images/favicon.png',
              primaryColor: '#524bb9'
            },
            languageDictionary: {
              emailInputPlaceholder: "something@youremail.com",
              title: "SeanBooks"
            },                          
          });
          var searchApp = angular.module("searchApp", []);
          searchApp.controller("searchController", function($scope) {
          });
          $(document).ready(function(){
              $(".submitdeleteform").submit(function(e){
                  e.preventDefault();
                  $('.modal').modal('hide');
                  $.ajax({
                    type:"POST",
                    url: $(this).data('url'),
                    data: $(this).serialize(),
                    success: function(msg) {
                      $books=msg.books;
                      $chapters=msg.chapters;
                      //$scope.apply();
                      location.reload()
                    }
                  });
              });
          });
  </script>


  </body>
</html>
