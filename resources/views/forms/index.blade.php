@extends('layouts.admin')

@section('content')
    <div>
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Questionnaires</h3>
            </div>
            <div class="box-body">
                @if($flag !== 'all')
                    <div>
                        <p>
                            <a href="/admin/forms/create?flag={{ $flag }}" class="btn btn-success">Create new Questionnaire</a>
                        </p>
                    </div>
                @endif
                <table class="table table-striped table-condensed table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Questionnaire Name</th>
                        <th>Assoc. Oridinance</th>
                        <th>Assoc. Resolution</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($questionnaires as $questionnaire)
                        <tr>
                            <td>{{ $questionnaire->id }}</td>
                            <td>{{ $questionnaire->name }}</td>
                            {{-- Refactore below --}}
                            <td> {{ $questionnaire->ordinance ? $questionnaire->ordinance->title : '-' }}</td>
                            <td> {{ $questionnaire->resolution ? $questionnaire->resolution->title : '-'}}</td>
                            <td>
                                    @if($questionnaire->isAccepting == 0)
                                    <span class="label label-danger">
                                        Not Accepting Responses
                                    </span>
                                    @else
                                    <span class="label label-success">
                                        Accepting Responses
                                    </span>
                                    @endif
                                </td>
                            <td>
                                <a href="{{"/admin/result/{$questionnaire->id}"}}" class="btn btn-xs btn-success"><span>Results</span></a>
                                <a href="{{"/admin/forms/{$questionnaire->id}"}}" class="btn btn-xs btn-info"><span>Preview</span></a>
                                <a href="{{ url("/admin/forms/{$questionnaire->id}/edit") }}"
                                   class="btn btn-xs btn-warning">Edit</a>
                                {{--<a href="" class="btn btn-xs btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>--}}
                                {{--Download</a>--}}
                                @if($questionnaire->isAccepting == 0)
                                    <form style="display: inline;" method="post"
                                          action="{{ url('/admin/acceptResponses/' . $questionnaire->id) }}">
                                        {{ csrf_field() }}
                                        <button class="btn btn-xs btn-success">
                                            Accept Responses
                                        </button>
                                    </form>
                                @else
                                    <form style="display: inline;" method="post"
                                          action="{{ url('/admin/declineResponses/' . $questionnaire->id) }}">
                                        {{ csrf_field() }}
                                        <button class="btn btn-xs btn-danger">
                                            Decline Responses
                                        </button>
                                    </form>
                                @endif

                                <form style="display: inline;" method="post"
                                      action="{{ url('/admin/forms/' . $questionnaire->id) }}">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-xs btn-danger"
                                            onclick="return confirm('Are you sure you want to remove this Questionnaire?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection