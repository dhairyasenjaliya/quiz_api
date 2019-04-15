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
                <div class="card-header"><h3>User's Data</h3></div>  
                
                <div class="d-flex justify-content-center">           
                      <a href="{{ route('home')}}" class="btn btn-warning">Home</a>                                    
                <div class="table-responsive"> 
             </div>
        </div>
 
    <table class="table table-striped table-hover table-condensed">
    <thead class="thead-dark" >
      <tr>
        <th><strong>Id</strong></th>
        <th><strong>Category Id</strong></th>  
        <th><strong>User Id</strong></th>  
        <th><strong>Time</strong></th>  
        <th><strong>Total</strong></th>
      </tr>
    </thead>
    <tbody>
    @foreach ($quiz_user as $category)
      <tr> 
        <td>{{ $category->id }}</td>
        <td>{{ $category->category_id  }}</td>  
        <td>{{ $category->user_id }}</td>  
        <td>{{ $category->time }}</td>  
        <td>{{ $category->total }}</td>  
            <!-- <td> 
            <a href="{{ route('crud.edit',$category->id)}}" class="btn btn-primary">Edit</a> 
                </td>
                <td>
                    <form action="{{ route('crud.destroy', $category->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td> -->
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