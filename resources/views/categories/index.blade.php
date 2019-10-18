@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end my-2">
    <a href="{{ route('categories.create')}}" class="btn btn-success float-right">Add Catgory</a>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="card card-default">
        <div class="card-header">
        Catgories
        </div>
        <div class="card-body">
            @if($categories->count() > 0)
            <table class="table">
                <thead>
                    
                    <th>Name</th>
                <th>Post Count</th>

                </thead>
                <thead>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{$category->name}}
                            </td>
                            <td>{{$category->posts->count()}}</td>
                            <td>
                            <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
             No category found
            @endif
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="post" id="deleteCategoryForm">
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
                    Are Your sure you want to delete this category?
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
            var form = document.getElementById("deleteCategoryForm")
            form.action ='/categories/' + id
            console.log(form)

        }
    </script>
@endsection
