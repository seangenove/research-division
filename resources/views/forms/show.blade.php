@extends('layouts.admin')

@section('content')

   <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary" id="app">
         <div class="box-header with-border">
            <h3 class="box-title">Questionnaire Preview</h3>
         </div>
         <questionnaire-details
                 action="{{ url("/admin/forms/{$questionnaire->id}/") }}"
                 csrf_token="{{ csrf_token() }}"
                 old="{{$questionnaire_json }}">
            Loading Component...
         </questionnaire-details>

      </div>
      <!-- /.box -->


   </div>

@endsection

@section('scripts')
   <script src="{{ asset('js/app.js') }}"></script>
@endsection