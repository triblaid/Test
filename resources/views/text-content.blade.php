@extends('layouts.site')


@section('content')

<div class="form">
	@if($text)
      	<div class="form">
      	
      	<form method="POST">
		  <div class="form-group">
		  <h2>{{$text->caption}}</h2>
		    <textarea class="form-control form_style" name="text"> {{$text->text}}</textarea>
		  </div>
		  <button type="submit" class="btn btn-default">Перезаписать</button>
		  
		   {{ csrf_field() }}
		    
		</form>
        </div>
     
      @endif
    
@endsection   