@extends('template')

@section('content')
    
<h3>Lista de Anotações</h3>

<ul>
    @foreach($notas as $nota)
    <li>{{ $nota }}</li>
    @endforeach
</ul>

@stop