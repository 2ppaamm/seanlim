@extends('layouts.master')

@section('title')
    Editing  chapter: {{ $chapters->title }}
@stop

@section('content')
    <div class="jumbotron">
      <div class="container">
        <h1 id = "heading">Editing Chapter {{$chapters->name}}</h1>
      </div>
    </div>

    <div class="container">
      <!-- Column of book summaries -->
      <div class="row">
        <div class="col-md-12">
          @include('errors')
            <div class = "col-md-6">
                <form method='POST' action='/books/{{$books->id}}/chapters/{{$chapters->id}}'>
                    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                    <input name="_method" type="hidden" value="PUT">
                    <div class = 'form-group'>
                        <label for='name'>Chapter name</label>
                        <input type='text' name='name' class = 'form-control' value = '{{$chapters->name}}'>
                    </div>
                    <div class='form-group'>
                          <label for='order'>Chapter number</label>
                          <input name='order' class = 'form-control' type='text' value = '{{$chapters->order}}'>
                    </div>
                    <div class='form-group'>
                          <label for='content'>Content</label>
                          <textarea class="form-control" rows="5" name='content'>{{$chapters->content}}</textarea>
                    </div>
                    <input type='submit' value='Save Changes'>
                </form>
              </div>
            </div>
        </div>
    </div>





@endsection