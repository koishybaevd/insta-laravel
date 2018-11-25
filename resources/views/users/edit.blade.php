@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="column d-flex justify-content-center">
        <div class="col-12 col-md-8">
            <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input name="name" type="text" class="form-control" id="inputName" aria-describedby="nameHelp" placeholder="Enter name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email address</label>
                    <input name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="inputPasswordConfirm">Password Confirmation</label>
                    <input name="password_confirmation" type="password" class="form-control" id="inputPasswordConfirm" placeholder="Password confirm">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection