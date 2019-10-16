@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">{{isset($post) ? "Edit Post" : "Create Post"}}</div>
        <div class="card-body">
            <form action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value={{isset($post) ? $post->title : ""}}>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control" value=>{{isset($post) ? $post->description : ""}}</textarea>
                </div>
                <div class="form-group">
                <label for="content">Content</label>
                <input id="x" type="hidden" name="content"  value="{{isset($post) ? $post->content : ''}}">
                 <trix-editor input="x"></trix-editor>
                    
                
                </div>
                <div class="form-group">
                    <label for="published_at">Published at</label>
                    <input type="text" id="published_at" name="published_at" class="form-control" {{isset($post) ? $post->published_at : ""}}>
                </div>
                @if(isset($post))
                    <div class="form-group">
                        <img src="/storage/{{$post->image }}" alt="" style="width:100%;">
                    </div>
                @endif
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{isset($post) ? "Update Post" : "Add Post"}}
                    </button>
                </div>
            </form>
        </div>
    </div>
    
@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js
"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#published_at')
</script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection


