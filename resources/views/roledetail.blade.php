@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Role : {{$role->name}}</div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('changepermission') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        <input type="hidden" name="role_id" value="{{$role->id}}">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> </th>
                            <th>Permission</th>
                          </tr>
                        </thead>
                        <tbody>
                        {!! $permissionsTr !!}
                        </tbody>
                      </table>
                      <button class="btn btn-primary" type="submit">save</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
