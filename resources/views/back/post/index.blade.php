@extends('layouts.back')

@section('title', $title)


@section('stylesheet')
	
    <!-- Bootstrap Switch CSS -->
    <link href="{{ url('bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css')}}" rel="stylesheet">
	
	<style></style>

@endsection


@section('content')
    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{ $title}}</h1>
    
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Titre</th>
				<th>Auteur</th>
				<th>Nombre de commentaires</th>
				<th>PUBLIER</th>
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
					<td>{{ $post->status }}
					</td>
					<td>
					    <a href="{{ route('post.edit',$post->id) }}" class="btn btn-info"><i class="fa fa-pencil fa-lg fa-fw"></i></a>

						<a href="#modal{{ $post->id }}" class="btn btn-danger"><i class="fa fa-trash fa-lg fa-fw"></i></a>
						<!-- Modal Structure -->
						<div id="modal{{ $post->id }}" class="modal">
							<div class="modal-content">
								<h4>Êtes-vous certains de vouloir supprimer l'article : <strong>{{ $post->title }}</strong></h4>
								<p>Prenez garde, cette action est définitive, vous ne pourrez pas revenir en arrière !</p>
								<form method="post" action="{{ route('post.destroy',$post->id) }}">
						    		{{ csrf_field() }} {{-- token pour protéger votre formulaire CSRF --}}
						    		{{ method_field('DELETE') }}
									<button type="submit" class="modal-action modal-close waves-effect waves-light btn green">Je valide</button>
									<a href="#!" class="modal-action modal-close waves-effect waves-light btn red right">Je refuse</a>
								</form>
							</div>
						</div>

					</td>
				</tr>
	
    		@endforeach
		</tbody>
	</table>
<div name="youhou" class="make-switch switch-large" data-label-icon="icon-fullscreen" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
    <input type="checkbox" checked>
</div>

    <div class="make-switch">
        <input id="tete" name="test" type="checkbox" checked>
    </div>
@endsection

@section('javascript')

    <!-- Bootstrap Switch JavaScript -->
    <script src="{{ url('bootstrap-switch/dist/js/bootstrap-switch.min.js')}}"></script>

    <script type="text/javascript">
		
		$.fn.bootstrapSwitch.defaults.onColor = 'success';
		$.fn.bootstrapSwitch.defaults.offColor = 'danger';
		$.fn.bootstrapSwitch.defaults.labelText = 'Publié';
	    $.fn.bootstrapSwitch.defaults.onText = "<i class='fa fa-check'></i>";
		$.fn.bootstrapSwitch.defaults.offText = "<i class='fa fa-times'></i>";

		$("[name='test']").bootstrapSwitch();
	    
		$('#tete').on('switch-change', function (e, data) {
			var $el = $(data.el),
				value = data.value;
			console.log('hello');
			//console.log(e);
			//console.log($el);
			//console.log(value);
		});

    </script>

@endsection
