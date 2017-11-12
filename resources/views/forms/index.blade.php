@extends('layouts.admin')

@section('content')

    <a href="/admin/forms/create" class="btn btn-success">Create Form</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Form Name</th>
                <th>Ordinance #</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>PUJ Questionnaire</td>
                <td>Ordinance #214</td>
                <td>
                    <a href="#" class="btn btn-xs btn-info">Show</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection