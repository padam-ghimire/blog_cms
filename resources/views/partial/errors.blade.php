@if(session()->has('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
@endif
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
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