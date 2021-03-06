@extends('layouts.admin')

@section('content')

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary" id="app">
            <div class="box-header with-border">
                <h3 class="box-title">Create Questionnaire</h3>
            </div>

            @if(request()->flag === 'ordinances')

                <questionnaire-component
                        action="{{ url('/admin/forms') }}"
                        csrf_token="{{ csrf_token() }}"
                        flag="{{ request()->flag }}"
                        ordinance="{{ $ordinance_json }}"
                >
                    Loading Component...
                </questionnaire-component>

            @elseif(request()->flag === 'resolutions')
                <questionnaire-component
                        action="{{ url('/admin/forms') }}"
                        csrf_token="{{ csrf_token() }}"
                        flag="{{ request()->flag }}"
                        resolution="{{ $resolution_json }}"
                >
                    Loading Component...
                </questionnaire-component>
            @else
                <?php return abort(404) ?>
            @endif

        </div>
        <!-- /.box -->


    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection