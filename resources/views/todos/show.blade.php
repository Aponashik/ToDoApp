@extends('todos.layout')

@section('content')
<h3>{{$todo->title}}</h3>
<hr>
<div>
    <div>
        <h4><strong>Description</strong></h4>
    <p>{{$todo->description}}</p>
    </div>
</div>
    <div style="padding: 2px">
        <a href="{{route('todo.index')}}" role="btn" class="btn btn-info" >Todo List</a>
    </div>
    
@endsection