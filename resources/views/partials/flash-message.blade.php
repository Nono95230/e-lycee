
  @if(session('message'))

    @if( session('message')[0] === 'success')
      <div class="alert alert-success" role="alert">
		  {{ session('message')[1] }}
		</div>
    @else
		<div class="alert alert-danger" role="alert">
			{{ session('message')[1] }}
		</div>
    @endif

  @endif