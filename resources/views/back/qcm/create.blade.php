@extends('layouts.back')

@section('title', $title)


@section('stylesheet')
	
	<style>
		/*
		 * CSS REGION - CONTENT_TOP
		 */
		#btn-add,
		#btn-return{
			margin-top:22px;
		}
		.content_second{
			min-height:80px;
		}
		#flash-message{
			margin-bottom:10px;
		}



		/*
		 * CSS BTN PUBLISH
		 */
		.modal-title{
			display: inline-block;
		}
		    
		.bootstrap-switch {
		  width: 107px;

		  display: inline-block;
		  direction: ltr;
		  cursor: pointer;
		  border-radius: 4px;
		  border: 1px solid;
		  border-color: #ccc;
		  position: relative;
		  text-align: left;
		  overflow: hidden;
		  line-height: 8px;
		  z-index: 0;
		  -webkit-user-select: none;
		  -moz-user-select: none;
		  -ms-user-select: none;
		  user-select: none;
		  vertical-align: middle;
		  -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
		  -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
		  transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
		}
		.bootstrap-switch .bootstrap-switch-container {
		  width: 147px;

		  display: inline-block;
		  top: 0;
		  border-radius: 4px;
		  -webkit-transform: translate3d(0, 0, 0);
		  transform: translate3d(0, 0, 0);
		}
		.bootstrap-switch .bootstrap-switch-handle-on,
		.bootstrap-switch .bootstrap-switch-handle-off,
		.bootstrap-switch .bootstrap-switch-label {
		  -webkit-box-sizing: border-box;
		  -moz-box-sizing: border-box;
		  box-sizing: border-box;
		  cursor: pointer;
		  display: table-cell;
		  vertical-align: middle;
		  padding: 6px 12px;
		  font-size: 14px;
		  line-height: 20px;
		}
		.bootstrap-switch .bootstrap-switch-handle-on,
		.bootstrap-switch .bootstrap-switch-handle-off {
		  width: 42px;
		  color: #fff;

		  text-align: center;
		  z-index: 1;
		}
		.bootstrap-switch-handle-on{
		  border-bottom-left-radius: 3px;
		  border-top-left-radius: 3px;
		  background: #5cb85c;
		}
		.bootstrap-switch-handle-off{
		  border-bottom-right-radius: 3px;
		  border-top-right-radius: 3px;
		  background: #d9534f;
		}
		.bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-success,
		.bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-success {
		  color: #fff;
		  background: #5cb85c;
		}
		.bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-danger,
		.bootstrap-switch .bootstrap-switch-handle-off.bootstrap-switch-danger {
		  color: #fff;
		  background: #d9534f;
		}
		.bootstrap-switch .bootstrap-switch-label {
		  width: 63px;

		  text-align: center;
		  margin-top: -1px;
		  margin-bottom: -1px;
		  z-index: 100;
		  color: #333;
		  background: #fff;
		}
		.bootstrap-switch span::before {
		  content: "\200b";
		}
		.bootstrap-switch .bootstrap-switch-handle-on {
		  border-bottom-left-radius: 3px;
		  border-top-left-radius: 3px;
		}
		.bootstrap-switch .bootstrap-switch-handle-off {
		  border-bottom-right-radius: 3px;
		  border-top-right-radius: 3px;
		}
		.bootstrap-switch input[type='radio'],
		.bootstrap-switch input[type='checkbox'] {
		  position: absolute !important;
		  top: 0;
		  left: 0;
		  margin: 0;
		  z-index: -1;
		  opacity: 0;
		  filter: alpha(opacity=0);
		  visibility: hidden;
		}
		.bootstrap-switch.bootstrap-switch-mini .bootstrap-switch-handle-on,
		.bootstrap-switch.bootstrap-switch-mini .bootstrap-switch-handle-off,
		.bootstrap-switch.bootstrap-switch-mini .bootstrap-switch-label {
		  padding: 1px 5px;
		  font-size: 12px;
		  line-height: 1.5;
		}
		.bootstrap-switch.bootstrap-switch-small .bootstrap-switch-handle-on,
		.bootstrap-switch.bootstrap-switch-small .bootstrap-switch-handle-off,
		.bootstrap-switch.bootstrap-switch-small .bootstrap-switch-label {
		  padding: 5px 10px;
		  font-size: 12px;
		  line-height: 1.5;
		}
		.bootstrap-switch.bootstrap-switch-large .bootstrap-switch-handle-on,
		.bootstrap-switch.bootstrap-switch-large .bootstrap-switch-handle-off,
		.bootstrap-switch.bootstrap-switch-large .bootstrap-switch-label {
		  padding: 6px 16px;
		  font-size: 18px;
		  line-height: 1.3333333;
		}
		.bootstrap-switch.bootstrap-switch-disabled,
		.bootstrap-switch.bootstrap-switch-readonly,
		.bootstrap-switch.bootstrap-switch-indeterminate {
		  cursor: default !important;
		}
		.bootstrap-switch.bootstrap-switch-disabled .bootstrap-switch-handle-on,
		.bootstrap-switch.bootstrap-switch-readonly .bootstrap-switch-handle-on,
		.bootstrap-switch.bootstrap-switch-indeterminate .bootstrap-switch-handle-on,
		.bootstrap-switch.bootstrap-switch-disabled .bootstrap-switch-handle-off,
		.bootstrap-switch.bootstrap-switch-readonly .bootstrap-switch-handle-off,
		.bootstrap-switch.bootstrap-switch-indeterminate .bootstrap-switch-handle-off,
		.bootstrap-switch.bootstrap-switch-disabled .bootstrap-switch-label,
		.bootstrap-switch.bootstrap-switch-readonly .bootstrap-switch-label,
		.bootstrap-switch.bootstrap-switch-indeterminate .bootstrap-switch-label {
		  opacity: 0.5;
		  filter: alpha(opacity=50);
		  cursor: default !important;
		}
		.bootstrap-switch.bootstrap-switch-animate .bootstrap-switch-container {
		  -webkit-transition: margin-left 0.5s;
		  -o-transition: margin-left 0.5s;
		  transition: margin-left 0.5s;
		}
		.bootstrap-switch.bootstrap-switch-inverse .bootstrap-switch-handle-on {
		  border-bottom-left-radius: 0;
		  border-top-left-radius: 0;
		  border-bottom-right-radius: 3px;
		  border-top-right-radius: 3px;
		}
		.bootstrap-switch.bootstrap-switch-inverse .bootstrap-switch-handle-off {
		  border-bottom-right-radius: 0;
		  border-top-right-radius: 0;
		  border-bottom-left-radius: 3px;
		  border-top-left-radius: 3px;
		}
		.bootstrap-switch.bootstrap-switch-focused {
		  border-color: #66afe9;
		  outline: 0;
		  -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
		  box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
		}


		.bootstrap-switch-on .bootstrap-switch-container{
		  margin-left: 0px;
		}
		.bootstrap-switch-on .bootstrap-switch-label{
		  border-bottom-right-radius: 3px;
		  border-top-right-radius: 3px;
		}
		.bootstrap-switch-off .bootstrap-switch-container{
		  margin-left: -42px;
		}
		.bootstrap-switch-off .bootstrap-switch-label{
		  border-bottom-left-radius: 3px;
	   	  border-top-left-radius: 3px;
		}




		textarea {
		  resize: vertical; /* user can resize vertically, but width is fixed */
		}

	</style>

@endsection

@section('content_top')

<div class="content_first">
	<!-- Title -->
	<div class="row">
		<div class="col-md-10">
			<h1>{{ $title}}</h1>
		</div>
		<div class="col-md-2">
			<a id="btn-return" type="button" class="btn btn-success pull-right" href="{{route('qcm.index')}}"><i class="fa fa-angle-double-left fa-fw" aria-hidden="true"></i>
			 Retour à la liste</a>
		</div>
	</div>
</div>
<div class="content_second">
	@include('partials.flash-message')
</div>

@endsection

@section('content')

    <form method="POST" action="{{ route('qcm.store') }}">
    	{{ csrf_field() }}
		<div class="row">
			<div class="col-lg-10 col-md-9 col-sm-8 col-xs-7">

				{!! Form::inputMacro('text','title','qcm', $errors? $errors : null ,old('title')) !!}
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-5">

				{!! Form::publishMacro('checkbox', 'status', 'qcm', $errors->isEmpty(), old('status')) !!}
				
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4">
				<div class="form-group controls @if($errors->has('class_level')) has-feedback has-error @endif">
					<label for="class_level" class="control-label">{{ config('fieldMacroHelpers.qcm.class_level.label') }}</label>
					<select class="form-control" id="class_level" name="class_level">
						<option value="premiere">Première</option>
						<option value="terminale">Terminale</option>
					</select>
					<span class="help-block" style="height:20px;">{{ $errors->has('class_level') ? $errors->first('class_level') : '' }}</span>
				</div>
			</div>
			<div class="col-xs-4">
				{!! Form::inputMacro('number','nb_question','qcm', $errors? $errors : null ,old('nb_question')) !!}
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				{!! Form::submitMacro('add','qcm') !!}
			</div>
		</div>

    </form>

@endsection

@section('javascript')

    <script type="text/javascript">
		
		$(".bootstrap-switch-label,.bootstrap-switch-handle-on,.bootstrap-switch-handle-off").on('click',publish);
		

		function publish() {
			var $thisPublish = $(this).parent(".bootstrap-switch-container").parent(".bootstrap-switch-id-tete"),
				testPublish = $thisPublish.hasClass('bootstrap-switch-on');
				//console.log($thisPublish.find('input[type="checkbox"]').attr('name'));

			if (testPublish) {//For Unpublished
				$thisPublish.removeClass('bootstrap-switch-on').addClass('bootstrap-switch-off');
		        $thisPublish.find('input[type="checkbox"]').prop('checked', false);
		        $thisPublish.find('form').submit();
			}
			else{//For Published
				$thisPublish.removeClass('bootstrap-switch-off').addClass('bootstrap-switch-on');
				$thisPublish.find('input[type="checkbox"]').prop('checked', true);
				$thisPublish.find('form').submit();
			}
		}


    </script>

@endsection