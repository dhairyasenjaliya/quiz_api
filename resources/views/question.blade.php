@extends('layouts.app')

@section('content')
 
 
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
     <br />  
  @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Manage Questions</h3></div> 

                <form action="/searchquestion" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input required type="text" class="form-control" name="q"
                            placeholder="Search Question"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">
                               Search
                            </button>
                        </span>
                    </div>
                </form>
                
                <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add Questions</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post"  enctype="multipart/form-data" action="{{ route('quest.store') }}"> 
                                @csrf
                               
                                <div class="form-group">
                          <label for="categories">Category</label>
                         
                             <select  class="form-control" name="categories" id="categories" data-parsley-required="true">
                            @foreach ($cate as $categ) 
                            {   
                                    <option value="{{ $categ->id }}" selected="selected">{{ $categ->title }}</option>
                            }
                            @endforeach
                          </select>  
                           

                        </div>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Question:</label>
                          <textarea name="question"  class="form-control" id="recipient-name">  </textarea>
                        </div> 
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Answer :</label>
                          <br>True
                          <input type="radio"  name="answer"  value="True"  >
                            False
                          <input type="radio" name="answer"  value="False"   >                        

                        </div>         
                        <label for="recipient-img" class="col-form-label">Image :</label>

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
                                
                                <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Add</button> 
                            </div>                            
                             </div>
                                @if ($errors->any())
                                  <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                  </div><br />
                                @endif
                              </form>                                                           
                            </div>                            
                          </div>                    
                      </div>
                       
                      <a href="{{ route('home')}}" class="btn btn-warning">Home</a> 
                      <a href="{{ route('question')}}" class="btn btn-primary">Manage</a> 
                                  
                <div class="table-responsive">                            
             </div>
        </div>
 
    <table class="table table-striped table-hover table-condensed">
    <thead class="thead-dark" >
      <tr>
        <th><strong>Number</strong></th>
        <th><strong>Categories</strong></th>
        <th><strong>Question</strong></th>
        <th><strong>Answer</strong></th>
        <th><strong>Image</strong></th>
        <th><strong>Edit</strong></th>   
        <th><strong>Delete</strong></th>   
      </tr>
    </thead>
    <tbody>
    @foreach ($questions as $question)
      <tr> 
        <td>{{ $question->id }}</td>
        <td>{{ $question->categorie  }}</td> 
        <td>{{ $question->question }}</td>  
        <td>{{ $question->answer }}</td>  
        <td>
          @if($question->image!=null)
            <div><img src="{{url($question->image)}}" height=80 width=80/></div> 
          @else
              Upload Image
          @endif
        </td> 
        <td> 
        <a href="{{ route('quest.edit',$question->id)}}" class="btn btn-primary">Edit</a>      
            </td>
            <td>
                <form action="{{ route('quest.destroy', $question->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
      </tr>
      @endforeach
    </tbody>   
  </table>
           
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection
