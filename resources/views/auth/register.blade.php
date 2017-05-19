@extends('layouts.master')

@section('title')
    register
@stop

@section('content')
    <div class="jumbotron">
      <div class="container">
        <h1 id = "heading">Register</h1>
      </div>
    </div>


    <div class="container">
      <!-- Column of book summaries -->
      <div class="row">
        <div class="col-md-6">
                
            @if(count($errors) > 0)
                <ul class='errors'>
                    @foreach ($errors->all() as $error)
                        <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method='POST' action='/register'>
                    {!! csrf_field() !!}

                    <div class='form-group'>
                        <label for='name'>Name</label>
                        <input type='text' name='name' id='name' value='{{ old('name') }}'>
                    </div>

                    <div class='form-group'>
                        <label for='email'>Email</label>
                        <input type='text' name='email' id='email' value='{{ old('email') }}'>
                    </div>

                    <div class='form-group'>
                        <label for='password'>Password</label>
                        <input type='password' name='password' id='password'>
                    </div>

                    <div class='form-group'>
                        <label for='password_confirmation'>Confirm Password</label>
                        <input type='password' name='password_confirmation' id='password_confirmation'>
                    </div>

                    <button type='submit' class='btn btn-primary'>Register</button>

              </form>  
        </div>
      </div>

@stop