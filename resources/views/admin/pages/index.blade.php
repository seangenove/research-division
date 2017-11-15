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
                    <th>Name</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>About</td>
                        <td>
                            <a href="/admin/pages/{{ 1 }}/edit" class="btn btn-xs btn-warning" >Edit</a>
                            <form action="#" method="">
                                <button class="btn btn-xs btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection