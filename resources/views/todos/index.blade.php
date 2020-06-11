@extends('todos.layout')

@section('content')
    
<h2>All Your To-Do..</h2>
<a href="/todos/create" class="btn btn-success" role="button"><span class="fa fa-plus-square"/></a>
<br>
<h5 style="color:green">{{Session::get('message')}}</h5>
<table class="table table-striped">
    @if($todos->count()>0)
        @foreach($todos as $todo)
            <tr>
                @if($todo->completed)
                <td class="complete" style="text-decoration: line-through">{{$todo->title}}</td>
                @else
            <td><a style="cursor: pointer" href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a></td>
                @endif

                    @include('todos.space')

                    <td>@include('todos.complete')</td>
                    <td>
                        <a href="{{'/todos/'.$todo->id.'/edit'}}" class="btn btn-primary"><span class="fas fa-edit "/></a>
                        <a href="#" class="btn btn-danger">
                                <span onclick="event.preventDefault();
                                if(confirm('Are You Sure Want To Delete This?'))
                                {
                                document.getElementById('form-delete-{{$todo->id}}').submit();
                                }" class="fas fa-trash "/></a>

                            <form style="display:none" id="{{'form-delete-'.$todo->id}}" method="post" 
                                action="{{route('todo.delete',$todo->id)}}">
                                @csrf
                                @method('delete')
                            </form>
                    </td>
                        
                    
            </tr>
        @endforeach

    @else
        <p>No Task Available!Create One</p>
    @endif

</table>


@endsection