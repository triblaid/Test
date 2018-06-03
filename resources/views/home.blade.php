@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ваши посты</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                    	<table class="tftable" border="1">
<tr><th>Заголовок</th><th>Дата создания</th><th>Ссылка</th><th>Действие</th></tr>
@foreach($texts as $text)
<tr><td>{{$text->caption}}</td><td>{{$text->created_at}}</td><td><a href="{{ url($text->link) }}">{{$text->link}}</a></td><td><a href="/delete/{{$text->link}}"> Удалить</a></td></tr>
@endforeach
</table>
            </div>
        </div>
    </div>
</div>
@endsection
