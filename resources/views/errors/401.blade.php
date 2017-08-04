@extends('layouts.back')

@section('title', 'E-Lycee : Erreur 401')

@section('stylesheet')
    <style>
    	/* CSS PAGE ERROR 401 */
	    body{
	      background: #e7ecf0;}
	  *{
	      margin: 0;
	      padding: 0;
	  }
	  p{
	      font-size: 12px;
	      color: #373737;
	      font-family: Arial, Helvetica, sans-serif;
	      line-height: 18px;
	  }
	  p a{
	      color: #218bdc;
	      font-size: 12px;
	      text-decoration: none;
	  }
	  a{
	      outline: none;
	  }
	  .f-left{
	      float:left;
	  }
	  .f-right{
	      float:right;
	  }
	  .clear{
	      clear: both;
	      overflow: hidden;
	  }
	  #block_error{
	      width: 845px;
	      height: 384px;
	      border: 1px solid #cccccc;
	      margin: 72px auto 0;
	      -moz-border-radius: 4px;
	      -webkit-border-radius: 4px;
	      border-radius: 4px;
	      background: #fff url(http://www.ebpaidrev.com/systemerror/block.gif) no-repeat 0 51px;
	  }
	  #block_error div{
	      padding: 100px 40px 0 186px;
	  }
	  #block_error div h2{
	      color: #218bdc;
	      font-size: 24px;
	      display: block;
	      padding: 0 0 14px 0;
	      border-bottom: 1px solid #cccccc;
	      margin-bottom: 12px;
	      font-weight: normal;
	  }
    </style>
@endsection


@section('content')

    <h1>Erreur 401</h1>
    
    <div id="block_error">
        <div>
        <h2>Explications de l'erreur 401 : Non autorisé</h2>
        <p>La requête nécessite une identification de l'utilisateur. Concrètement, cela signifie que l'ensemble ou une partie du serveur contacté est protégé par un mot de passe qu'il faut indiquer au serveur pour accéder à son contenu.</p>
        <p>Si vous avez des questions, contactez notre service d'assistance technique.</p>
        </div>
    </div>

@endsection



@section('sidebar')
<!-- no sidebar visible -->
@endsection