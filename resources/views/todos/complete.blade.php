@if($todo->completed)
    <td><a href="" class="btn btn-warning"><span onclick="event.preventDefault();
        document.getElementById('form-incomplete-{{$todo->id}}').submit();"
        class="fas fa-check "/></a>

        <form style="display:none" id="{{'form-incomplete-'.$todo->id}}" method="post" 
        action="{{route('todo.incomplete',$todo->id)}}">
        @csrf
        @method('patch')
        
        </form>
    </td>
    @else
    <td><a href="" class="btn btn-success">
        <span onclick="event.preventDefault();
        document.getElementById('form-complete-{{$todo->id}}').submit();"
        class="fas fa-check "/></a>
    
    <form style="display:none" id="{{'form-complete-'.$todo->id}}" method="post" 
        action="{{route('todo.complete',$todo->id)}}">

    @csrf
    @method('patch')
    </form>
    </td>

 @endif