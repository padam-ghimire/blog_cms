@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end my-2">
    <a href="{{ route('posts.create')}}" class="btn btn-success float-right">Add Post</a>
</div>
@include('partial.errors')

<div class="card card-defalut">
    <div class="card-header">Posts</div>
    <div class="card-body">
      
       @if($posts->count()> 0)
       <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th></th>     
                 <th></th>

            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>

                        <img src="storage/{{$post->image }}" alt="" height=60 width=120>
                        </td>
                        <td>{{$post->title}}</td>
                        <td>
                        <a href="{{route('categories.edit',$post->category->id)}}">{{$post->category->name}}</a>
                        </td>
                        <td>
                            @if($post->trashed())
                            <form action="{{route('restore-post',$post->id)}}" method="post">
                                @csrf
                                @method('PUT')
                             <button type="submit" class="btn btn-info btn-sm">Restore</button>
                            </form>
                            @else
                            <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-info btn-sm">Edit</a>

                            @endif
                        </td>
                        <td>
                            <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"class="btn btn-danger btn-sm">
                            {{$post->trashed() ? "Delete" : "Trash"}}
                            </a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        No post found
       @endif
    </div>
</div>

@endsection