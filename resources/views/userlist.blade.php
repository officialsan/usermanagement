@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Userlist</div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                          <tr>
                            <td>{{$user->username}}</td>
                            <td>{{$user->roles->name}}</td>
                            <td><a href= "javascript:void(0)" class="btn btn-primary btn-sm" onclick="editthis('{{$user->username}}','{{$user->role}}','{{$user->id}}')" >Edit</a><a  href= "javascript:void(0)" class="btn btn-danger btn-sm ml-1" onclick="deletethis('{{$user->username}}','{{$user->id}}')" >Delete</a></td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="editModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Edit User</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="{{ route('edituser') }}" method="POST">
            @csrf
            <div class="form-group row">
            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
            <div class="col-md-6">
            <input type="text" class="form-control" name="username"  id="username" readonly>
            <input type="hidden" class="form-control" name="id"  id="id" >
        </div>
            </div>
            <div class="form-group row">
                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                <div class="col-md-6">
                    <select id="role"  class="form-control" name="role" required>
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-primary float-right ml-1" type="submit">Change</button>
            <button class="btn btn-warning float-right  ml-1"  data-dismiss="modal" type="button">Cancel</button>
        </form>
      </div>
     
    </div>

  </div>
</div>
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Delete User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <h4>Are you sure delete user : <b class="nameHere"></b> ?</h4>
        <form action="{{ route('deleteuser') }}" method="POST">
            @csrf
            <input type="hidden" class="form-control" name="id"  id="deleteId" >
            <button class="btn btn-primary float-right ml-1" type="submit">Yes</button>
            <button class="btn btn-warning float-right  ml-1"  data-dismiss="modal" type="button">No</button>
        </form>
      </div>
     
    </div>

  </div>
</div>
<script type="text/javascript">
    
        function editthis(username,role,id){
            $('#role  option[value="'+role+'"]').prop('selected', true);
            $("#username").val(username);
            $("#id").val(id);
            $("#editModal").modal('show');
        }
        function deletethis(username,id){
            $(".nameHere").html(username);
            $("#deleteId").val(id);
            $("#deleteModal").modal('show');
        }
    
</script>
@endsection
