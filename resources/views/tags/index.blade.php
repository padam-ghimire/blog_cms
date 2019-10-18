@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end my-2">
    <a href="{{ route('tags.create')}}" class="btn btn-success float-right">Add Tag</a>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="card card-default">
        <div class="card-header">
        Tags
        </div>
        <div class="card-body">
            @if($tags->count() > 0)
            <table class="table">
                <thead>
                    
                    <th>Name</th>
                <th>Post Count</th>

                </thead>
                <thead>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                {{$tag->name}}
                            </td>
                            <td>{{$tag->posts->count()}}</td>
                            <td>
                            <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
             No tag found
            @endif
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="post" id="deleteTagForm">
                @csrf
                @method('Delete')
                <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                  <div class="modal-body">
                    Are Your sure you want to delete this tag?
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No!!</button>
                    <button type="submit" class="btn btn-danger">Yes! Delete</button>
                </div>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function handleDelete(id){
            $('#deleteModal').modal('show')
            var form = document.getElementById("deleteTagForm")
            form.action ='/tags/' + id
            console.log(form)

        }
    </script>
@endsection
