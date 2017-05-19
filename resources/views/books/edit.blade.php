@extends('layouts.master')

@section('title')
    Editing  book: {{ $books->title }}
@stop

@section('content')
    <div class="jumbotron">
      <div class="container">
        <h1 id = "heading">Edit Book</h1>
      </div>
    </div>

    <div class="container">
      <!-- Column of book summaries -->
      <div class="row">
        <div class="col-md-12">
          @include('errors')
            <div class = "col-md-6">
                <form method='POST' action='/books/{{$books->id}}'>
                    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                    <input name="_method" type="hidden" value="PUT">
                    <h2> {{$books->title}} </h2>
                    <div class = 'form-group'>
                        <label for='title'>Title*</label>
                        <input type='text' name='title' class = 'form-control' value = '{{$books->title}}'>
                    </div>
                    <div class='form-group'>
                          <label for='cover'>Cover image link</label>
                          <input type='text' name='cover' class = 'form-control' value = '{{$books->cover}}'>
                    </div>
                    <div class='form-group'>
                          <label for='synopsis'>Synopsis</label>
                          <textarea class="form-control" rows="5" name='synopsis'>{{$books->synopsis}}</textarea>
                    </div>
                    <input type='submit' value='Save Changes'>
                </form>
              </div>
            </div>
        </div>
    </div>
@endsection