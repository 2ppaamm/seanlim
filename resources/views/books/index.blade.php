@extends('layouts.master')

@section('title') 
  Index
@stop

@section('content')


    <!-- Main jumbotron for info on site -->
    <div class="jumbotron">
      <div class="container">
        <h1 id = "heading">@if(Auth::user()) {{Auth::user()->name}}'s Stuff @endif</h1>
        <p><a class="btn btn-primary btn-lg" href="/about" role="button" id = "learn">About this site &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Column of book summaries -->

    @if ($mybooks)
      <div class="row">
        <div class="col-md-3 col-sm-12">      
          <div class="panel panel-default">
            <div class="panel-heading"><h3>My Books</h3></div>
            <div class="panel-body">
              @foreach ($mybooks as $book)
              <div class="col-md-6 col-sm-12 col-lg-3">
                <img src="{{$book->cover}}" class="img-responsive" alt="Cover Image for {{$book->title}}"/>
                <h2>{{$book->title}}</h2><span>by {{$book->user->name}}</span>
                <p>{{$book->synopsis}}</p>
                <p>
                  <a class="btn btn-default" href="/books/{{$book->id}}" role="button">View details &raquo;</a>
                </p>
              </div>
              @endforeach
              @if (sizeOf($mybooks) == 0)
                <p> It seems like you don't have any books at the moment. <a href="/books/create">Click here</a> to create one! </p>
              @endif
            </div>
          </div>
        </div>
    @endif

        <div class="col-lg-9 col-sm-12 col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading"><h3>Book list</h3></div>
              <div class="panel-body" ng-init="books = {{$books}}">
                <div ng-repeat="book in filteredbooks=( books |filter:searchInput)" class="col-md-4">
                  <img src="@{{book.cover}}" class="img-responsive" alt="Cover Image for @{{book.title}}"/>
                  <h2>@{{book.title}}</h2><span>by @{{book.user.name}}</span>
                  <p>@{{book.synopsis}}</p>
                  <p><a class="btn btn-default" href="/books/@{{book.id}}" role="button">View details &raquo;</a></p>
                </div>
                <p ng-hide="filteredbooks.length"> Nothing found for what you are looking for! <a href="/books/create">Click here</a> to create a similar one! </p>
              </div>
          </div>
        </div>
      </div>
    </div> <!--container-->

      <hr>
@stop