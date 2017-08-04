
  @if(session('message'))

    @if( session('message')[0] === 'success')
      <div id="flash-message" class="alert alert-success" role="alert">
		  {{ session('message')[1] }}
		</div>
    @else
		<div id="flash-message" class="alert alert-danger" role="alert">
			{{ session('message')[1] }}
		</div>
    @endif

  @endif