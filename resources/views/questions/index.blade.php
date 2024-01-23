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
                                <a href="{{route('questions.create')}}" class="btn btn-outline-secondary">Add Question</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('layouts._message')
                        @foreach($questions as $question)
                            <div class="media d-flex gap-3">
                                <div class="d-flex flex-wrap flex-column counters">
                                    <div class="vote">
                                        <strong>{{$question->votes}}</strong> {{Str::plural('vote',$question->votes)}}
                                    </div>
                                    <div class="status {{$question->status}}">
                                        <strong>{{$question->answers}}</strong> {{Str::plural('answers',$question->answers)}}
                                    </div>
                                    <div class="view">
                                        {{$question->views." ".Str::plural('views',$question->views)}}
                                    </div>
                                </div>
                                <div class="media-body flex-grow-1">
                                    <div class="d-flex align-items-center justify-content-between w-100 gap-2">
                                        <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>
                                        @if(auth()->id()=== $question->user->id)
                                        <div>
                                            <a href="{{route('questions.edit',$question->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                            <form action="{{route('questions.destroy',$question->id)}}" method="post" class="form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                    <p class="lead">
                                        Asked by
                                        <a href="{{$question->user->url}}">{{$question->user->name}} </a>
                                        <small class="text-muted">{{$question->created_date}}</small>
                                    </p>
                                    <p>{{Str::limit($question->body, 250)}}</p>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <div class="text-center">
                            {{$questions->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
