@extends('layouts.app')

@section('content')
<div class="card">
                <div class="card-header">My profile</div>
                   @include('partial.errors')

                <div class="card-body">

                   <form action="{{route('user.update-profile')}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{$user->name}}" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" value="{{$user->email}}" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea name="about" id="about" cols="30" rows="10" class="form-control">{{$user->about}}</textarea>
                    </div>
                   <button type="Submit" class="btn btn-success">Update Profile</button>
                   
                   </form>
                </div>
            </div>
@endsection
