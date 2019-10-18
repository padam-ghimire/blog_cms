@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
        {{isset($category) ? "Edit Category" : "Create Catgeory"}}
        </div>

        <div class="card-body">
        @include('partial.errors')
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