@extends('layouts.front')

@section('title', 'Login')

@section('sidebar')
    <div class="well text-center">
        <h4>Testing all User Role</h4>
        <hr>
        <div class="user-role-choices">
          <h5 class="text-left">For role : <strong>Teacher</strong></h5>
          <p>username : Alexandre</p>
          <p>password : alexandre</p>
          <button class="btn btn-info" onClick="useThisRole('Alexandre')">Utiliser ces informations de connexion</button>
        </div>
        <div class="user-role-choices">
          <h5 class="text-left">For role : <strong>First Class</strong></h5>
          <p>username : Alan</p>
          <p>password : alan</p>
          <button class="btn btn-info" onClick="useThisRole('Alan')">Utiliser ces informations de connexion</button>
        </div>
        <div class="user-role-choices">
          <h5 class="text-left">For role : <strong>Final Class</strong></h5>
          <p>username : Alfred</p>
          <p>password : alfred</p>
          <button class="btn btn-info" onClick="useThisRole('Alfred')">Utiliser ces informations de connexion</button>
        </div>
    </div>

  @parent()
@endsection

@section('style')
  <style >
    #form-login .help-block{
      margin-bottom:5px;
    }
    #form-login .form-group,
    #form-login p{
      margin-bottom:0;
    }
    #form-login .checkbox{
      margin-top:0;
      text-align: center;
    }
  </style>
@endsection

@section('content')



<div class="section"></div>
<div class="row">
<div class="col-md-10 col-md-offset-1">


  @include('partials.flash-message')
  <form id="form-login" method="post" action="{{ url('login') }}"  name="form-login" role="form">
	{{ csrf_field() }}
	<div class="text-center">
    	<p>Pour accéder à votre profil,</p>
        <legend>Connectez vous !</legend>
	</div>
  <div class="row control-group">
      <div class="col-md-6 form-group floating-label-form-group controls @if($errors->has('username')) has-feedback has-error @endif">
          <label class="control-label inline" id="nom-label">Nom d'utilisateur</label>
          <input class="form-control" placeholder="Username" type="text" name='username' id='username' value="{{old('username')}}">
          @if($errors->has('username')) <span class="help-block">{{$errors->first('username')}} </span>
          @else
           <span class="help-block" style="height:20px;"> </span>
          @endif
      </div>
      <div class="col-md-6 form-group floating-label-form-group controls @if($errors->has('password')) has-feedback has-error @endif">
          <label class="control-label inline" id="prenom-label">Mot de passe</label>
          <input class="form-control" placeholder="Password" id="password" name="password" type="password" value="{{old('password')}}">
          @if($errors->has('password')) <span class="help-block">{{$errors->first('password')}} </span>
          @else
           <span class="help-block" style="height:20px;"> </span>
          @endif
      </div>
  </div>
	<div class="checkbox">
		<label>
			<input type="checkbox" id="remember" name='remember' {{ old('remember')? 'checked' :''}}> Remember me
		</label>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 colsm-12 col-xs-12 form-group text-center">
			<button type="submit" id="form_submit" class="btn btn-primary btn-lg poster">Log in</button>
		</div>
	</div>
  </form>
</div>



</div>
@endsection


@section('javascript')

    <script type="text/javascript" async>

    function useThisRole(name){
      var username = name,
          password = name.toLowerCase();
      $('#username').val(username);
      $('#password').val(password);
    }



    </script>

@endsection