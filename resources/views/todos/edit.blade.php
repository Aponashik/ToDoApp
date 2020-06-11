@extends('todos.layout')

@section('content')
<h1>Update This To-Do</h1>
<hr>
    <h5 style="color:green">{{Session::get('message')}}</h5>
    @if($errors->any())
        <h5>
            
                @foreach( $errors->all() as $error)
                <h5 style="color:red">{{$error}}</h5>
                @endforeach
        </h5> 

    @endif
    <form class="form-inline" method="post" action="{{route('todo.update',$todo->id)}}">

    @csrf 

    @method('patch')
    <div>
    <input type="text" class="form-control mb-2 mr-sm-2" name="title" value="{{$todo->title}}">
    </div><br>
    <div>
    <textarea name="description" class="form-control mb-2 mr-sm-2">{{$todo->description}}</textarea>
    </div>
    <div style="padding: 2px">
        <button type="submit" class="btn btn-success">Update</button>
    </div>

    </form>
    <div style="padding: 2px">
        <a href="{{route('todo.index')}}" role="btn" class="btn btn-info" >Todo List</a>
    </div>
@endsection