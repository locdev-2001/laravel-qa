@csrf
<div class="form-group">
    <label for="question-title">Question title</label>
    <input type="text" name="title" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" id="question-title" value="{{old('title',$question->title)}}">
    @if($errors->has('title'))
        <div class="invalid-feedback">
            <strong>{{$errors->first('title')}}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="question-body">Explain your question</label>
    <textarea name="body" id="question-body" rows="10" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}" value="{{old('body',$question->body)}}"></textarea>
    @if($errors->has('body'))
        <div class="invalid-feedback">
            <strong>{{$errors->first('body')}}</strong>
        </div>
    @endif
</div>
<div class="form-group mt-3">
    <button type="submit" class="btn btn-outline-primary btn-lg">{{$button_text}}</button>
</div>
