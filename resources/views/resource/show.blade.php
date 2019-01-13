@extends('layouts.app')
@section('title', $resource->description)
@section('content')

    <h1>Recurso {{$resource->description}}</h1>

        <ul>
             <li>Quantidade: {{$resource->quantity}}</li>
             <li>Observação: {{$resource->note}}</li>
             <li>Adicionado em: {{date("d/m/Y", strtotime($resource->created_at))}}</li>
        </ul>

    <p>Histórico de fluxo </p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Tipo de fluxo</th>
            <th scope="col">Atualizado por </th>
            <th scope="col">Quantidade </th>
            <th scope="col">Data da atualização</th>

        </tr>
        </thead>
        <tbody>

        @foreach($flowresources as $flowresource)
            <tr>
                <th scope="row">{{$flowresource->type_flow}}</th>
                <th scope="row">{{$flowresource->name}}</th>
                <th scope="row">{{$flowresource->quantity}}</th>
                <th scope="row"> {{date("d/m/Y", strtotime($resource->created_at))}}</th>
            </tr>
        @endforeach


        </tbody>
    </table>

    <a href="javascript:history.go(-1)">Voltar</a>
@endsection