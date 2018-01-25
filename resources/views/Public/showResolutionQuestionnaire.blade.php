@extends('layouts.public')
@section('content')
    <div class="container">
        <div class="container pb-cmnt-container" style="border-top: dotted lightseagreen; padding-top: 20px">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <h2> {{$questionnaire->name}}</h2>
                                {{$questionnaire->description}}
                                <hr>
                                @php
                                    $counter = 1;
                                @endphp
                                <form method="POST" action="{{ url("/submitResolutionAnswers/{$questionnaire->id }/") }}">
                                    {{ csrf_field() }}
                                    @foreach($questions as $question)
                                        <div class="form-group">

                                            <label for="answer">{{$counter.'. '.$question->question}}</label>

                                            @if($question->type == 'short')
                                                <input name="question_id{{$counter}}" type="hidden" class="form-control" id="answer" value="{{$question->id}}">
                                                <input name="answer{{$counter}}" type="text" class="form-control" id="answer">
                                            @endif
                                            @if($question->type == 'long')
                                                <input name="question_id{{$counter}}" type="hidden" class="form-control" id="answer" value="{{$question->id}}">
                                                <textarea class="form-control" rows="5" id="answer" name="answer{{$counter}}"></textarea>
                                            @endif
                                            @if($question->type == 'radio')
                                                <input name="question_id{{$counter}}" type="hidden" class="form-control" id="answer" value="{{$question->id}}">
                                                @foreach($values as $value)
                                                    @if($value->question_id == $question->id)
                                                        <div class="radio">
                                                            <label><input id="answer" type="radio" name="answer{{$counter}}" value="{{$value->value}}">{{$value->value}}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if($question->type == 'checkbox')
                                                @foreach($values as $value)
                                                    @if($value->question_id == $question->id)
                                                        <input name="question_id{{$counter}}" type="hidden" class="form-control" id="answer" value="{{$question->id}}">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox" name="answer{{$counter}}" value="{{$value->value}}">{{$value->value}}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @php
                                                $counter = $counter+1;
                                            @endphp
                                        </div>
                                    @endforeach

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