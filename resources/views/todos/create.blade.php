@extends('todos.layout')

@section('content')
    <h2>What To-Do Next?</h2>
    <hr>
    <h5 style="color:green">{{Session::get('message')}}</h5>
    @if($errors->any())
        <h5>
            
                @foreach( $errors->all() as $error)
                <h5 style="color:red">{{$error}}</h5>
                @endforeach
        </h5> 

    @endif


    <form class="form-inline" method="post" action="/todos/create">

    @csrf 
    <div>
        <input type="text" class="form-control mb-2 mr-sm-2" name="title" placeholder="Enter What To Do">
    </div><br>
    <div>
        <textarea name="description" class="form-control mb-2 mr-sm-2" placeholder="Description"></textarea>
    </div>
    <div style="padding: 2px">
        <button type="submit" class="btn btn-success"><span class="fa fa-plus-square"/></button>
    </div>

    </form>
    <div style="padding: 2px">
        <a href="{{route('todo.index')}}" role="btn" class="btn btn-info" >Todo List</a>
    </div>
@endsection