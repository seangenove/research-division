@extends('layouts.public')
@section('content')
    <div class="container">
        <div class="container pb-cmnt-container" style="border-top: dotted lightseagreen; padding-top: 20px">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-danger">
                                    {{ Session::get('flash_message') }}
                                </div>
                            @endif
                            <div class="col-md-12">
                                <h2> {{$questionnaire->name}}</h2>
                                {{$questionnaire->description}}
                                <hr>
                                @php
                                    $counter = 1;
                                @endphp
                                <form method="POST" action="{{ url("/submitOrdinanceAnswers/{$questionnaire->id }/") }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id"
                                           value="{{$questionnaire->ordinance_id === null ? $questionnaire->resolution_id : $questionnaire->ordinance_id}}">
                                    <input type="hidden" name="type"
                                           value="{{$questionnaire->ordinance_id === null ? "resolution" : "ordinance"}}">
                                    <input type="hidden" name="questionnaire_id" value="{{$questionnaire->id}}">
                                    <label for="firstname">First Name</label>
                                    <input name="firstname" type="text" class="form-control" {{$required == 1 ? 'required' : ''}}>
                                    <label for="lastname">Last Name</label>
                                    <input name="lastname" type="text" class="form-control" {{$required == 1 ? 'required' : ''}}>
                                    <label for="email">E-mail</label>
                                    <input name="email" type="text" class="form-control" {{$required == 1 ? 'required' : ''}}>
                                    <br>

                                    @foreach($questions as $question)
                                        <div class="form-group">

                                            <label for="answer">{{$counter.'. '.$question->question}}</label>

                                            @if($question->type == 'short')
                                                <input name="question_id{{$counter}}" type="hidden" class="form-control"
                                                       id="answer" value="{{$question->id}}">
                                                <input name="answer{{$counter}}" type="text" class="form-control" id="answer" {{$question->required == 1 ? 'required' : ''}}>
                                            @endif
                                            @if($question->type == 'long')
                                                <input name="question_id{{$counter}}" type="hidden" class="form-control"
                                                       id="answer" value="{{$question->id}}">
                                                <textarea class="form-control" rows="5" id="answer" name="answer{{$counter}}" {{$question->required == 1 ? 'required' : ''}}></textarea>
                                            @endif
                                            @if($question->type == 'radio')
                                                <input name="question_id{{$counter}}" type="hidden" class="form-control"
                                                       id="answer" value="{{$question->id}}">
                                                @foreach($values as $value)
                                                    @if($value->question_id == $question->id)
                                                        <div class="radio">
                                                            <label><input id="answer" type="radio" name="answer{{$counter}}" value="{{$value->value}}" {{$question->required == 1 ? 'required' : ''}}>{{$value->value}}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if($question->type == 'checkbox')
                                                @foreach($values as $value)
                                                    @if($value->question_id == $question->id)
                                                        <input name="question_id{{$counter}}" type="hidden" class="form-control"
                                                               id="answer" value="{{$question->id}}">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" name="answer{{$counter}}" value="{{$value->value}}" {{$question->required == 1 ? 'required' : ''}}>{{$value->value}}</label>
                                                        </div>
                                                        @php
                                                            $counter=$counter+1;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endif
                                            @php
                                                $counter = $counter+1;
                                            @endphp
                                        </div>
                                    @endforeach

                                    {!! NoCaptcha::display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                    @endif

                                    <input name="counter" type="hidden" class="form-control" value="{{$counter}}">
                                        <button class="btn btn-success pull-right" type="submit"><i
                                                    class="fa fa-paper-plane"></i> Submit
                                        </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
