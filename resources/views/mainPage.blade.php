<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Analogue</title>

        <!--standard -->
		<link href="{{ asset ('css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{ asset('css/jumbotron.css') }}" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="{{ asset ('css/navbar-top-fixed.css')}}" rel="stylesheet">
		
		
    </head>
    <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="/">Analogue</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <button class="btn btn-outline-success my-2 my-sm-0" onclick="location.href='/'">Новый пост</button>
          </li>
        </ul>
        <div class="form-inline mt-2 mt-md-0">
			@if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Профиль</a>
                    @else
                        <a href="{{ route('login') }}">Логин</a>
                        <a href="{{ route('register') }}">Регистрация</a>
                    @endauth
                </div>
            @endif
        </div>
      </div>
    </nav>
    

	<div class="form">
	
		<form method="POST" action="{{route('textStore')}}">
		  <div class="form-group">
		    <label for="exampleInputFile">Текст</label>
		    <textarea class="form-control form_style" name="text"></textarea>
		  </div>
		  <div class="form-group">
		    <label for="title">Заголовок</label>
		    <input type="text" class="form-control name_style" id="caption" name="caption" placeholder="Необязательно">
		  </div>
		  <button type="submit" class="btn btn-default">Сохранить</button>
		   {{ csrf_field() }}
		    
		</form>
	
    </div>
    

        
 <!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="{{ asset ('js/bootstrap.min.js')}}"></script>
    </body>
</html>