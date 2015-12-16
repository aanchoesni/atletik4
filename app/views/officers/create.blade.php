@extends('layouts.masteruser')

@section('title')
	{{ $title }}
@stop

@section('asset')
    {{HTML::style("select2/select2-bootstrap.css")}}
    <link rel="stylesheet" href="{{ asset('packages/select2/select2.css')}}" />
@stop

@section('content')
	{{ Form::open(array('url' => route('user.officers.store'), 'method' => 'post', 'id' => 'officer', 'class'=>'cmxform form-horizontal tasi-form')) }}
		@include('officers._form')
	{{ Form::close() }}
@stop

@section('script')
    {{HTML::script('admin/js/jquery.validate.min.js')}}
    <!--script for this page-->
    {{HTML::script('admin/js/form-validation-script.js')}}

    <script src="{{ asset('packages/select2/select2.min.js')}}"></script>
    <script src="{{ asset('packages/select2/select2_locale_id.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() { $("#type").select2(); });
    </script>
    {{HTML::script('admin/js/common-scripts.js')}}
@stop
