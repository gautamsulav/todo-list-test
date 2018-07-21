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
      <th colspan="2">Action</th>
    </tr>
  </thead>
  <tbody> 
    @foreach($groups as $group)
    <tr>
      <td>{{$group['id']}}</td>
      <td>
        <a href="javascript:void(0)" class="list-task-by-group" data-link={{ url('getTasksByGroupId',$group['id']) }} >{{$group['name']}}  </a></td>
      <td>  <button type="button" class="btn btn-primary edit-group" data-id="{{$group['id']}}" data-toggle="modal">Edit</button>
      </td>
      <td>
        <form action="{{action('GroupController@destroy', $group['id'])}}" method="post" class="delete-group">
          @csrf
          <input name="_method" type="hidden" value="DELETE">
          <button class="btn btn-danger" type="submit">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@include('group\groupsjavascript')
