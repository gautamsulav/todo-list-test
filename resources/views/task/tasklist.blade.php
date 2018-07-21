<br />
@if (\Session::has('success'))
  <div class="alert alert-success">
    <p>{{ \Session::get('success') }}</p>
  </div><br />
@endif
<table class="table table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Group</th>
      <th>Completed</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody> 
    @foreach($tasks as $task)
    <tr>
      <td>{{$task['id']}}</td>
      <td>{{$task['name']}}</td>
      <td>{{$task->group->name}}</td>
      <td>
        @if($task['complete']==true)
          Yes
        @else
          No
        @endif
      </td>
      <td>  <button type="button" class="btn btn-primary openPopup" data-id="{{$task['id']}}" data-toggle="modal">Edit</button>
      </td>
      <td>
        <form action="{{action('TaskController@destroy', $task['id'])}}" method="post" class="delete-task">
          @csrf
          <input name="_method" type="hidden" value="DELETE">
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@include('task\tasksjavascript')
