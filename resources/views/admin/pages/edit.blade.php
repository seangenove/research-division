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
        <h3 class="box-title"><i class="fa fa-file-code-o"></i> New Page</h3>
    </div>
    <div class="box-body">
        <div>
            <a href="/admin/pages" class="btn btn-info">Back</a>

        </div>
        <div class="box-header">
            <h3 class="box-title">Page Title
            </h3>
            <div class="box-body pad">
                <form>
                    <input type="text" class="form-control" placeholder="Enter ...">
                </form>
            </div>
        </div>
        <div class="box-header">
            <h3 class="box-title">Page Description
            </h3>
            <div class="box-body pad">
                <form>
                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </form>
            </div>
        </div>
        <div class="box-header">
            <h3 class="box-title">Page Header
            </h3>
            <div class="box-body pad">
                <form>
                    <input type="text" class="form-control" placeholder="Enter ...">
                </form>
            </div>
        </div>
        <div class="box-header">
            <h3 class="box-title">Page Body
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
            </div>
            <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
            <form>
                <textarea id="editor1" name="editor1" rows="10" cols="80">
                    </textarea>
            </form>
        </div>

    </div>
</div>
@endsection