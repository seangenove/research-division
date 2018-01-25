@extends('layouts.admin')

@section('styles')
    <style>
        form {
            display: inline;
        }
    </style>
@endsection

@section('content')
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-file-text"></i> Ordinances under {{$type === 'IEC' ? 'IEC' : 'M&E'}}</h3>
        </div>
        <div class="box-body">
            <div>
                {{--<form action="/admin/ordinances/create">--}}
                    {{--{{csrf_field()}}--}}
                    {{--<input type="hidden" name="type" value="{{$type}}">--}}
                {{--</form>--}}
                <a href="/admin/ordinances/create?type={{$type}}" class="btn btn-success">Create</a>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Ordinance Number</th>
                    <th>Title</th>
                    <th>Date Approved By Council</th>
                    <th>Date Signed By Vice Mayor</th>
                    <th>Date Approved By Mayor</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ordinances as $ordinance)
                    <tr>
                        <td>{{ $ordinance->number }}</td>
                        <td>{{ $ordinance->title }}</td>
                        <td>{{ $ordinance->date_approved_by_council }}</td>
                        <td>{{ $ordinance->date_signed_by_vice_mayor }}</td>
                        <td>{{ $ordinance->date_signed_by_mayor === null ? 'N/A' : $ordinance->date_signed_by_mayor }}</td>
                        <td>
                            <a href="/admin/ordinances/{{$ordinance->id}}" class="btn btn-xs btn-primary">
                                {{ Request::is('admin/forms*') ? 'Profile' : 'View' }}
                            </a>
                            <a href="/admin/ordinances/{{$ordinance->id}}/edit" class="btn btn-xs btn-warning">Edit</a>
                            <form action="/admin/ordinances/{{ $ordinance->id }}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn btn-xs btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection