
  @if(session('message'))

    @if( session('message')[0] === 'success')
      <p>{{ session('message')[1] }}</p>
    @else
      <p>{{ session('message')[1] }}</p>
    @endif

  @endif