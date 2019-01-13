@extends('layouts.app')
@section('title', 'Listagem de Recursos')
@section('content')

    <h1>Recursos</h1>

        @if(Session::has('mensagem'))
            <div class="alert alert-success">
                {{Session::get('mensagem')}}
            </div>
        @endif



    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Descrição</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Observação</th>
            <th scope="col">Data de criação</th>
            <th scope="col">Ações</th>

        </tr>
        </thead>
        <tbody>

        @foreach($resources as $resource)

            <tr>
                <th scope="row">{{$resource->id}}</th>

                <td><a href="http://localhost:8000/resources/{{$resource->id}}">{{$resource->description}}</a></td>
                <td>{{$resource->quantity}}</td>
                <td>{{$resource->note}}</td>
                <td>{{ date("d/m/Y", strtotime($resource->created_at))}}</td>
                <td>

                    {{Form::open(['route'=>['resources.destroy',$resource->id], 'method'=>'DELETE'])}}

                    <a class='btn btn-default'
                       href=" {{url('resources/'.$resource->id.'/edit')}} ">Editar</a>

                      {{Form::submit('Excluir',['class'=>'btn btn-default'])}}

                    {{Form::close()}}

                    <a class='btn btn-default'
                       href=" {{url('resources/'.$resource->id.'/edit')}} ">Ajustar estoque</a>
                </td>

            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $resources->links() }}

@endsection
