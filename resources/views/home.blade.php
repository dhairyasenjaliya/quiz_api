@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Edit Data 
                    <a class="btn btn-primary" href="{{ route('category') }}"> Category </a>
                    <a class="btn btn-danger" href="{{ route('question') }}"> Question </a>
                    <a class="btn btn-success" href="{{ route('quizuser') }}"> User </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
