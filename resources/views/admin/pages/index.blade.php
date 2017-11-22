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
            <h3 class="box-title"><i class="fa fa-file-code-o"></i> Public Pages</h3>
        </div>
        <div class="box-body">
            <div>
                <a href="/admin/pages/create" class="btn btn-success">Create</a>

            </div>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>{{ $page->title }}</td>
                        <td>
                            <a href="/admin/pages/{{$page->id}}" class="btn btn-xs btn-info" >Preview</a>
                            <a href="/admin/pages/{{$page->id}}/edit" class="btn btn-xs btn-warning" >Edit</a>
                            <form action="/admin/pages/{{ $page->id }}" method="post">
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