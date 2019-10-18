@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
        {{isset($tag) ? "Edit tag" : "Create Tag"}}
        </div>

        <div class="card-body">
        @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="group-list">
                    @foreach($errors->all() as $error)
                    <li class="group-list-item">
                        {{$error}}
                    </li>
                    @endforeach
                </ul> 
            </div>
        @endif
            <form action="{{ isset($tag) ? route('tags.update',$tag->id) : route('tags.store') }} " method="post">
                @csrf
                @if(isset($tag))
                    @method('PUT')
                @endif
                <div class="form-group">
                <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" autocomplete="off" placeholder="tag" value="{{ isset($tag) ? $tag->name :''}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">{{isset($tag) ? 'Update tag' : 'Create tag'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection