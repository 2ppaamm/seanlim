@extends('layouts.master')

@section('title')
    login
@stop

@section('content')
    <div class="jumbotron">
      <div class="container">
        <h1 id = "heading">Login</h1>
      </div>
    </div>


    <div class="container">
      <!-- Column of book summaries -->
      <div class="row">
        <div class="col-md-6">
            <p>To register click <a href="/register">here</a>. 
            @include('errors')
            <form method='POST' action='/login'>
                <div class='form-group'>
                    <label for='email'>Email</label>
                    <input type='text' name='email' id='email' value='{{ old('email') }}' class = 'form-control'>
                </div>

                <div class='form-group'>
                    <label for='password'>Password</label>
                    <input type='password' name='password' id='password' value='{{ old('password') }}' class = 'form-control'>
                </div>

                <div class='form-group'>
                    <input type='checkbox' name='remember' id='remember'>
                    <label for='remember' class='checkboxLabel'>Remember me</label>
                </div>

                <button type='submit' class='btn btn-primary'>Login</button>

            </form>
        </div>
      </div>

@stop