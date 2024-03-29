@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h2 class="mb-0">All Questions</h2>
                            <div class="ml-auto">
                                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back to all question</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('questions.store')}}" method="post">
                            @include('questions._form',['button_text'=>'Ask Question'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
