@extends('layouts.back')

@section('title', $title)


@section('stylesheet')
	
	<style>
		/*
		 * CSS TABLEAU
		 */
		table,th{
		  text-align:center;
		}
		table thead tr th:first-child,
		table tbody tr td:first-child,
		table thead tr th:nth-child(2),
		table tbody tr td:nth-child(2){
		  text-align:left;
		}
		table thead tr th:last-child,
		table tbody tr td:last-child{
		  text-align:right;
		}

		table thead tr th:last-child{
			padding-right:calc(82px + 8px);
		}


		/*
		 * CSS BTN PUBLISH
		 */
		.modal{
			text-align: center
		}
		.modal-title{
			display: inline-block;
			width:95%;
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
		#perpage{
			padding-left:8px;
		}
		#total{
			padding-right:8px;
		}
		.pagination .per_page_title,
		.pagination .total{
			padding:6px 12px;
			text-align: center;
			border-top-left-radius:4px;
			border-top-right-radius:4px;
		}
		.pagination .total{
			border-bottom-left-radius:4px;
			border-bottom-right-radius:4px;
		}
		.pagination#perpage li a{
		  	margin-left:0;
		}
		.pagination#perpage li.first a{
			border-top-left-radius:0px;
			border-bottom-left-radius:4px;
		}
		.pagination#perpage li:last-child a{
			border-top-right-radius:0px;
		}

	</style>

@endsection

@section('content_top')

<div class="content_first">
	<!-- Title -->
	<div class="row">
		<div class="col-md-offset-2 col-md-8 text-center">
			<h1>{{ $title }}</h1>
		</div>
		<div class="col-md-2">
			<a id="btn-add" type="button" class="btn btn-success pull-right" href="{{route('qcm.create')}}"><i class="fa fa-plus fa-fw" aria-hidden="true"></i> Ajouter un QCM</a>
		</div>
	</div>
</div>
<div class="content_second">
	@include('partials.flash-message')
</div>

@endsection


@section('content')

<div class="row">
	<div class="col-md-4">
		<ul id="perpage" class="pagination">
			<div class="bg-primary per_page_title"><span>QCM par page</span></div>
			<li @if($perPage == 5) class="first active" @else class="first" @endif><a href="{{route('qcm.index')}}?perPage=5">5</a></li>
			<li @if($perPage == 10) class="active" @endif><a href="{{route('qcm.index')}}?perPage=10">10</a></li>
			<li @if($perPage == 15) class="active" @endif><a href="{{route('qcm.index')}}?perPage=15">15</a></li>
			<li @if($perPage == 20) class="active" @endif><a href="{{route('qcm.index')}}?perPage=20">20</a></li>
		</ul>
	</div>
	<div class="col-md-4 text-center">{!! $qcms->links() !!}</div>
	<div class="col-md-4">
		<ul id="total" class="pagination pull-right">
			<div class="bg-primary total"><span>TOTAL : {!! $qcms->total() !!}</span></div>
		</ul>
	</div>
</div>

<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>N°</th>
			<th>Titre</th>
			<th>Niveau</th>
			<th>Nombre de questions</th>
			<th>Créé le</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>

		<?php $number=1; ?>
		@foreach ($qcms as $qcm)
			<tr>
				<td>{!! ( ( $qcms->currentPage() - 1 )*$qcms->perPage() )+ $number++ !!}</td>
				<td>{{ $qcm->title }}</td>
				<td>{{ ($qcm->class_level==='premiere')? 'Première' :'Terminale' }}</td>
				<td>{{ $qcm->questions->count() }}</td>
				<td>{{ $qcm->created_at }}</td>
				<td>
				@if($qcm->status === "published")
				    <div class="make-switch">
				    	<div class="bootstrap-switch-id-tete bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-on">
				    		<div class="bootstrap-switch-container">
					    		<span class="bootstrap-switch-handle-on bootstrap-switch-success"><i class="fa fa-fw fa-check"></i></span>
						    	<span class="bootstrap-switch-label">Publié</span>
						    	<span class="bootstrap-switch-handle-off bootstrap-switch-danger"><i class="fa fa-fw fa-times"></i></span>
						    	<form action="{{ route('qcm.status.update',['id'=>$qcm->id])}}" method="post">
									{{ csrf_field() }}
						    		<input name="status" checked="" type="checkbox">
						    		<input type="submit" style="display:none;">
						    	</form>
						    	
				    		</div>
				    	</div>
				    </div>
				@elseif($qcm->status === "unpublished")
				    <div class="make-switch">
				    	<div class="bootstrap-switch-id-tete bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-off">
				    		<div class="bootstrap-switch-container">
					    		<span class="bootstrap-switch-handle-on bootstrap-switch-success"><i class="fa fa-fw fa-check"></i></span>
						    	<span class="bootstrap-switch-label">Publié</span>
						    	<span class="bootstrap-switch-handle-off bootstrap-switch-danger"><i class="fa fa-fw fa-times"></i></span>
						    	<form action="{{ route('qcm.status.update',['id'=>$qcm->id])}}" method="post">
									{{ csrf_field() }}
						    		<input name="status" type="checkbox">
						    		<input type="submit" style="display:none;">
						    	</form>
						    	
				    		</div>
				    	</div>
				    </div>
				@endif
				    <a href="{{ route('qcm.edit',$qcm->id) }}" class="btn btn-info"><i class="fa fa-pencil fa-lg fa-fw"></i></a>

					<a href="#modal{{ $qcm->id }}" class="btn btn-danger" data-toggle="modal" data-target="#pop-in-delete-{{$qcm->id}}"><i class="fa fa-trash fa-lg fa-fw"></i></a>
					<!-- Modal Structure -->
					<div class="modal fade" id="pop-in-delete-{{$qcm->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{$qcm->id}}" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title" id="modalLabel{{$qcm->id}}"><strong>Êtes-vous certains de vouloir supprimer ce QCM ?</strong></h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <p>Prenez garde, cette action est définitive, vous ne pourrez pas revenir en arrière !</p>
					      </div>
					      <div class="modal-footer">
							<form method="post" action="{{ route('qcm.destroy',$qcm) }}">
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
<div class="row">
	<div class="col-md-12 text-center">{!! $qcms->links() !!}</div>
</div>

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
		function updatePaginationPerPage(){
			var perPage = parseInt( $('#perpage li.active').text() ),
				$pagination = $(".pagination:not(#perpage,#total)");

			$pagination.find("li").each(function(){

				var itemUrl = $(this).find('a').attr('href');

				if (itemUrl !== undefined) {
					itemUrl = itemUrl+'&perPage='+perPage;
					$(this).find('a').attr('href',itemUrl);
				}

			});
		}
		updatePaginationPerPage();


    </script>

@endsection