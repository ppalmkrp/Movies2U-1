@extends('layouts.navbar')
@section('content')
    <div class="row">
        <div class="col-5 mx-auto my-5">
            <div class="card" >
                <div class="card-header text-center">
                    MOVIES2U PROJECT
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Register</h5>
                    <form method="POST" action="/addUserForm/addUser">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name:</label>
                            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email:</label>
                            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password:</label>
                            <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirm Password:</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-control">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputPassword1" class="form-label">Select role:</label>
                            <select id="roles" name="roles" class="block mt-1 " >
                                <option value="1">User</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add user</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-7 mx-auto">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">role</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                    <tr>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>@if($u->roles == 1)
                            User
                            @else
                            Admin
                        @endif</td>
                        <td><a href="/addUserForm/deleteUser/{{ $u->id }}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
