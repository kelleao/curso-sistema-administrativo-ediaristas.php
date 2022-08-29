@extends('adminlte::page')

@section('title', 'Editar Serviço')

@section('content_header')
    <h1>Editar Serviço</h1>
@stop

@section('content')

@include('_mensagens')

    <form action="{{ route('servicos.update', $servico) }}" method="post">
        @method('put')

        @include('servicos._form')
    </form>
@stop

