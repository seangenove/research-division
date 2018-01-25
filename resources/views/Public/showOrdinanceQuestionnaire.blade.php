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
                                    @foreach($questions as $question)
                                        <div class="form-group">
                                            <input name="question_id{{$counter}}" type="hidden" class="form-control"
                                                   id="answer" value="{{$question->id}}">
                                            <label for="answer">{{$counter.'. '.$question->question}}</label>

                                            @if($question->type == 'short')
                                                <input name="answer{{$counter}}" type="text" class="form-control" id="answer" {{$question->required == 1 ? 'required' : ''}}>
                                            @endif
                                            @if($question->type == 'long')
                                                <textarea class="form-control" rows="5" id="answer" name="answer{{$counter}}" {{$question->required == 1 ? 'required' : ''}}></textarea>
                                            @endif
                                            @if($question->type == 'radio')
                                                @foreach($values as $value)
                                                    @if($value->question_id == $question->id)
                                                        <div class="radio">
                                                            <label><input id="answer" type="radio" name="answer{{$counter}}" value="{{$value->value}}" {{$question->required == 1 ? 'required' : ''}}>{{$value->value}}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @if($question->type == 'checkbox')
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="{{$value->value}}" {{$question->required == 1 ? 'required' : ''}}>{{$value->value}}</label>
                                                </div>
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