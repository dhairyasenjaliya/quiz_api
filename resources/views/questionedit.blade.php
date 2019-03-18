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
                    <form method="post" action="{{ route('quest.update', $questions->id) }}">
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
