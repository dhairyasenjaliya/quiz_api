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
                    <form method="post" enctype="multipart/form-data" action="{{ route('crud.update', $categories->id) }}">
                        @method('PATCH')
                        @csrf
                          <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Title:</label>
                          <textarea type="text" required name="title" class="form-control" id="recipient-name">{{ $categories->title }} </textarea>
                          <label for="recipient-name" class="col-form-label">Daily Challenges:</label>
                          @if ($categories->isDaily == 'true' ) 
                                    <input type="checkbox" name="isDaily" checked  >  
                          @else
                                    <input type="checkbox" name="isDaily"  >  
                          @endif
                          <br>
                          <label for="recipient-img" class="col-form-label">Image :</label>
                          @if($categories->image != null)
                            <div ><img src="{{url($categories->image)}}" height=80 width=80/></div> 
                            <br>
                            <div class="file is-danger has-name is-boxed">
                                <label class="file-label">
                                
                                  <input class="file-input" type="file" name="filenames">
                                  <span class="file-cta">

                                    <span class="file-icon">
                                      <i class="fas fa-cloud-upload-alt"></i>
                                    </span>
                                  
                                    <span class="file-label">
                                        Update
                                    </span>
                                  </span>
                                  <span class="file-name">
                                  
                                  </span>
                                </label>
                              </div>
                          @else 
                            <div class="file is-danger has-name is-boxed">
                                <label class="file-label">
                                
                                  <input class="file-input" type="file" name="filenames">
                                  <span class="file-cta">

                                    <span class="file-icon">
                                      <i class="fas fa-cloud-upload-alt"></i>
                                    </span>
                                  
                                    <span class="file-label">
                                        Upload Image
                                    </span>
                                  </span>
                                  <span class="file-name">
                                  
                                  </span>
                                </label>
                              </div>
                          @endif
 
                                    <input type="checkbox" name="chkimage"  > No image 
                           
                          
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