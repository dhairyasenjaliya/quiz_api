@extends('layouts.app')

@section('content')
 
<div class="container">
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Edit Category</h3></div>               
                <div class="table-responsive">                            
             </div>
        </div>
    
        <div class="d-flex justify-content-center">

        <div class="modal-body">
                    <form method="post" action="{{ route('crud.update', $categories->id) }}">
                        @method('PATCH')
                        @csrf
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Title:</label>
                          <textarea type="text" required name="title" class="form-control" id="recipient-name">{{ $categories->title }} </textarea>
                        </div>                                   
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{route('category') }}" class="btn btn-danger">Cancel</a>
                      </form>
                    </div>
                    <div class="modal-footer">
                </div>
        </div>
</div>
@endsection