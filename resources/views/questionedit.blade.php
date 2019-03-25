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
                <div class="card-header"><h3>Edit Question</h3></div>   
                <div class="table-responsive">  
             </div>
        </div>
    
        <div class="d-flex justify-content-center">

        <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('quest.update', $questions->id) }}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                          <!-- <label for="recipient-name" class="col-form-label">Categories:</label>
                          <textarea name="categories"  class="form-control" id="recipient-name"> {{ $questions->Categorie->title}}</textarea> -->

                          <label for="categories">Category</label>
                         
                          <select  class="form-control" name="categories" id="categories" data-parsley-required="true">
                            @foreach ($cate as $categ) 
                            {   
                                @if ($categ->id == $questions->categories ) 
                                    <option value="{{ $categ->id }}" selected="selected" >{{ $categ->title }}</option>
                                @else
                                    <option value="{{ $categ->id }}" >{{ $categ->title }}</option>
                                @endif
                            }
                            @endforeach
                          </select>
                           

                        </div>

                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Question:</label>
                          <textarea name="question"  class="form-control" id="recipient-name"> {{ $questions->question }}</textarea>
                        </div> 
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Answer :</label>
                          <br>True
                          <input type="radio"  name="answer"  value="True" 
                          {{ $questions->answer  == 'true' ? 'checked' : '' }} >
                            False
                          <input type="radio" name="answer"  value="False" 
                          {{ $questions->answer  == 'false' ? 'checked' : '' }} >                        
                            <br>
                          <label for="recipient-img" class="col-form-label">Image :</label>
                          @if( $questions->image  != null)
                            <div ><img src="{{url('images/question/'.$questions->image)}}" height=80 width=80/></div> 
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
                        <a href="{{route('question') }}" class="btn btn-danger">Cancel</a>
                      </form>
                    </div>
                    <div class="modal-footer">   
                     
                    </div>
        </div>
</div>
@endsection
