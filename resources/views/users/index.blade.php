@extends('layouts.app')

@section('content')


<!-- @include('partial.errors') -->

<div class="card card-defalut">
    <div class="card-header">Users</div>
    @include('partial.errors')
    <div class="card-body">
      
       @if($users->count()> 0)
       <table class="table">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>     
                 <th></th>

            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>

                        <img src="{{Gravatar::src($user->email)}}" alt="" height=40 width=40>
                        </td>
                        <td>{{$user->name}}</td>
                        <td>
                        {{$user->email}}
                        </td>
                        <td>
                        @if(!$user->isAdmin())
                        <form action="{{route('user.make-admin',$user->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm">Make admin</button>

                        </form>
                        @endif
                        </td>
                        <td>
                          
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        No Users found
       @endif
    </div>
</div>

@endsection