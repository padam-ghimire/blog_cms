@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">{{isset($post) ? "Edit Post" : "Create Post"}}</div>
            @include('partial.errors')
        <div class="card-body">
            <form action="{{ isset($post) ? route('posts.update',$post->id) : route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{isset($post) ? $post->title : ''}}">
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
                    <input type="text" id="published_at" name="published_at" class="form-control" value="{{isset($post) ? $post->published_at : ''}}">
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
                    <label for="category">Category</label>

                   <select name="category" id="category" class="form-control">
                   @foreach($categories as $category)
                    <option value="{{$category->id}}"
                    
                    @if(isset($post))
                        @if($category->id == $post->category->id)
                            selected
                        @endif
                    @endif


                    >
                
                    {{$category->name}}
            
                    
                   
                    </option>
                   @endforeach
                   </select>
                </div>
                @if($tags->count() > 0)

                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select name="tags[]" id="tags" class="form-control" multiple>
                        @foreach($tags as $tag)
                        <option value="{{$tag->id}}"
                        @if(isset($post))

                            @if($post->hasTag($tag->id))
                                selected
                            @endif

                        @endif
                        
                        >{{$tag->name}}</option>

                        @endforeach

                    </select>
                </div>

                @endif
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


