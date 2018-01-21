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
                        data="{{ \App\Ordinance::all()->toJson() }}"
                        flag="{{ request()->flag }}"
                >
                    Loading Component...
                </questionnaire-component>

            @elseif(request()->flag === 'resolutions')
                <questionnaire-component
                        action="{{ url('/admin/forms') }}"
                        csrf_token="{{ csrf_token() }}"
                        data="{{ \App\Resolution::all()->toJson() }}"
                        flag="{{ request()->flag }}"
                >
                    Loading Component...
                </questionnaire-component>

            @endif

        </div>
        <!-- /.box -->


    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection