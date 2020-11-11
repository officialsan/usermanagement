@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rolelist</div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Role</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                          <tr>
                            <td>{{$role->name}}</td>
                            
                            <td><a href= "{{ route('rolepermissrionlist',$role->id ) }}" class="btn btn-primary btn-sm"  >Edit</a></td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
