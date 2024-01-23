@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between gap-2">
                            <h3 class="mb-0">{{$question->title}}</h3>
                            <div class="ml-auto col-3">
                                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary">Back to all question</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $question->body_html !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
