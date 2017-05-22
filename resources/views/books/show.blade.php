@extends('layouts.master')

@section('title')
  {{$books->title}}
@stop

@section('content')
        <!-- Main jumbotron for info on site -->
    <div class="jumbotron">
      <div class="container">
        <h1 id = "heading">{{$books->title}}</h1>
        @if (Auth::user() && Auth::user()->id == $books->user->id)
        <p>
          <a class="btn btn-primary btn-lg" href="/books/{{$books->id}}/edit" role="button" id = "learn">Edit this book</a>
          <a class="btn btn-primary btn-lg" href="/books/{{$books->id}}/chapters/create" role="button" id = "learn">Add a chapter</a>
        </p>
        @endif

      </div>
    </div>

    <div class="container">
      <!-- Column of book summaries -->
      <div class="row">
        <div class="col-md-4">
          <p><img id = "cover" alt = "Cover image" src = "{{$books->cover}}" class = 'img-responsive'/></p>
        </div>
        <div class = 'col-md-8'>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Synopsis</h3>
            </div>
            <div class="panel-body">
              {{$books->synopsis}}
            </div>
          </div>
          <div class="panel panel-default chapter-panel" ng-init="chapters = {{$chapters}}">
            <!-- Default panel contents -->
            <div class="panel-heading">Chapters</div>
            <!-- List group -->
            <ul class="list-group" ng-repeat="chapter in filteredchapters=( chapters |filter:searchChapter)">
                <li class="list-group-item">
                  Chapter @{{chapter.order}}
                  <a href = '/books/{{$books->id}}/chapters/@{{chapter.id}}'>@{{chapter.name}}</a>
                  @if (Auth::user() && Auth::user()->id == $books->user->id)                  
                    <!-- Modal Trigger -->
                    <a href="" data-toggle="modal" data-target="#myModal@{{chapter.id}}"><span class='pull-right'>Delete</span></a>
                    <a href='/books/{{$books->id}}/chapters/@{{chapter.id}}/edit'><span class='pull-right'>Edit &nbsp;</span></a>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal@{{chapter.id}}" role="dialog">
                      <div class="modal-dialog">
                      
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure you want to delete chapter @{{chapter.name}}?</p>
                          </div>
                          <div class="modal-footer">
                            <form method="POST" data-url='/books/{{$books->id}}/chapters/@{{chapter.id}}' class='submitdeleteform'>                    
                              <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                              <input name="_method" type="hidden" value="DELETE">
                              <button type="submit" class="btn btn-default">Yes</button>
                            </form>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  @endif
                </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
      <hr>
@stop