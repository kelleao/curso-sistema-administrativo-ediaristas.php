@extends('adminlte::page')

@section('title', 'Lista de Diárias')

@section('content_header')
    <h1>Lista de Diárias</h1>

    <br>
    <div class="btn-toolbar">
        <div class="btn-group mr-2">
            <a href="?status=1,2,3&nome={{ request()->query('nome') }}">
                <button class="btn {{ request('status') == '1,2,3' ? 'btn-primary' : 'btn-default' }}">Pendetes</button>
            </a>
            <a href="?status=5&nome={{ request()->query('nome') }}">
                <button class="btn {{ request('status') == '5' ? 'btn-primary' : 'btn-default' }}">Canceladas</button>
            </a>
            <a href="?status=4,6,7&nome={{ request()->query('nome') }}">
                <button class="btn {{ request('status') == '4,6,7' ? 'btn-primary' : 'btn-default' }}">Concluídas</button>
            </a>
        </div>

        <div>
            <form method="GET">
                <input type="hidden" name="status" value="{{ request()->query('status') }}">
                <input type="text"  value="{{ request('nome') }}" class="btn btn=default" name="nome" placeholder="Buscar por Cliente" />
                <input type="submit" class="btn btn-default" value="Filtrar">
            </form>
        </div>
    </div>

@stop

@section('content')

@include('_mensagens_sessao')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Status</th>
            <th scope="col">Nome Cliente</th>
            <th scope="col">Nome Disrista</th>
            <th scope="col">Data Atendimento</th>
            <th scope="col">Pagamento Diarista</th>
        </tr>
        </thead>
        <tbody>

            @forelse($diarias as $diaria)
                <tr>
                    <th>{{ $diaria->id }}</th>
                    <th>
                        @switch($diaria->status)
                            @case(1)
                                    Aguardando Pagamento
                                @break
                            @case(2)
                                    Pago
                                @break
                            @case(3)
                                    Diarista Selecionado
                                @break
                            @case(4)
                                    Presença confirmada
                                @break
                            @case(5)
                                    Cancelada
                                @break
                            @case(6)
                                    Avaliada
                                @break
                            @case(7)
                                    Transferido para diarista
                                @break
                            @default

                        @endswitch

                    </th>
                    <th>{{ $diaria->cliente->nome_completo}}</th>
                    <th>{{ $diaria->diarista->nome_completo ?? ''}}</th>
                    <td>{{ \Carbon\Carbon::parse($diaria->data_atendimento)->format('d/m/Y h:i') }}</td>
                    <td>
                        @if(in_array($diaria->status, [4, 6]))
                            <a href="{{ route('diarias.pagar', $diaria) }}" class="btn btn-primary">Marcar como pago</a>
                        @elseif($diaria->status == 7)
                            <a class="btn btn-success disabled">Pago</a>
                        @else
                            <a class="btn btn-danger disabled">Indisponível</a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <th></th>
                    <th>Nenhum registro foi encontrado</th>
                    <th></th>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $diarias->appends(request()->query())->links() }}
    </div>
@stop
