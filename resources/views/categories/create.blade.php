@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
        {{isset($category) ? "Edit Category" : "Create Catgeory"}}
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
            <form action="{{ isset($category) ? route('categories.update',$category->id) : route('categories.store') }} " method="post">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="form-group">
                <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" autocomplete="off" placeholder="Category" value="{{ isset($category) ? $category->name :''}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">{{isset($category) ? 'Update Category' : 'Create Category'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection