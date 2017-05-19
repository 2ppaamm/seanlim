@extends('layouts.master')

@section('title')
  {{$chapters->name}}
@stop

@section('content')
        <!-- Main jumbotron for info on site -->
    <div class="jumbotron">
      <div class="container">
        <h1 id = "heading">{{$chapters->name}}</h1>
        <p><a class="btn btn-primary btn-lg" href="/books/{{$chapters->book_id}}" role="button" id = "learn">Back to book index &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Column of book summaries -->
      <div class="row">

        <div class='col-md-12'>
          <p>{{$chapters->content}}</p>

          <p><a class="btn btn-primary btn-lg" href="/books/{{$chapters->book_id}}/chapters/{{$chapters->id}}/edit" role="button" id = "learn">Edit this chapter</a></p>
        </div>
      </div>
      <hr>
@stop