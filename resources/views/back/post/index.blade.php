@extends('layouts.back')

@section('title', $title)


@section('stylesheet')
	
	<style>
		table,th{
		  text-align:center;
		}
		.make-switch{
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







		.modal-title{
			display: inline-block;
		}


	</style>

@endsection

@section('content')

    <!-- Title -->
    <h1>{{ $title}}</h1>
    
	@include('partials.flash-message')
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Titre</th>
				<th>Auteur</th>
				<th>Nombre de commentaires</th>
				<th>PUBLICATION</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>

    		@foreach ($posts as $post)
				<tr>
					<td>
						<a href="{{ url('post', $post->id) }}">
							{{ $post->title }}
						</a>
					</td>
					<td>{{ $post->user? $post->user->username : 'Auteur Anonyme' }}</td>
					<td>5</td>
					<td>{{ $post->published_at }}</td>
					<td>
					@if($post->status === "published")
					    <div class="make-switch">
					    	<div class="bootstrap-switch-id-tete bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-on">
					    		<div class="bootstrap-switch-container">
						    		<span class="bootstrap-switch-handle-on bootstrap-switch-success"><i class="fa fa-fw fa-check"></i></span>
							    	<span class="bootstrap-switch-label">Publié</span>
							    	<span class="bootstrap-switch-handle-off bootstrap-switch-danger"><i class="fa fa-fw fa-times"></i></span>
							    	<form action="{{ route('post.status.update',['id'=>$post->id])}}" method="post">
    									{{ csrf_field() }}
							    		<input name="status" checked="" type="checkbox">
							    		<input type="submit" style="display:none;">
							    	</form>
							    	
					    		</div>
					    	</div>
					    </div>
					@elseif($post->status === "unpublished")
					    <div class="make-switch">
					    	<div class="bootstrap-switch-id-tete bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-off">
					    		<div class="bootstrap-switch-container">
						    		<span class="bootstrap-switch-handle-on bootstrap-switch-success"><i class="fa fa-fw fa-check"></i></span>
							    	<span class="bootstrap-switch-label">Publié</span>
							    	<span class="bootstrap-switch-handle-off bootstrap-switch-danger"><i class="fa fa-fw fa-times"></i></span>
							    	<form action="{{ route('post.status.update',['id'=>$post->id])}}" method="post">
    									{{ csrf_field() }}
							    		<input name="status" type="checkbox">
							    		<input type="submit" style="display:none;">
							    	</form>
							    	
					    		</div>
					    	</div>
					    </div>
					@endif
					    <a href="{{ route('post.edit',$post->id) }}" class="btn btn-info"><i class="fa fa-pencil fa-lg fa-fw"></i></a>

						<a href="#modal{{ $post->id }}" class="btn btn-danger" data-toggle="modal" data-target="#pop-in-delete-{{$post->id}}"><i class="fa fa-trash fa-lg fa-fw"></i></a>
						<!-- Modal Structure -->
						<div class="modal fade" id="pop-in-delete-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{$post->id}}" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h4 class="modal-title" id="modalLabel{{$post->id}}"><strong>Êtes-vous certains de vouloir supprimer cet article ?</strong></h4>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <p>Prenez garde, cette action est définitive, vous ne pourrez pas revenir en arrière !</p>
						      </div>
						      <div class="modal-footer">
								<form method="post" action="{{ route('post.destroy',$post->id) }}">
						    		{{ csrf_field() }} {{-- token pour protéger votre formulaire CSRF --}}
						    		{{ method_field('DELETE') }}
							        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Je m'y refuse</button>
							        <button type="submit" class="btn btn-success pull-rigth">Je le supprime</button>
								</form>
						      </div>
						    </div>
						  </div>
						</div>

					</td>
				</tr>
	
    		@endforeach
		</tbody>
	</table>

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