@extends('layouts.app')
@section('title', 'Ajuste de estoque')
@section('content')
    <h1>Ajuste de estoque {{$resource->description}}</h1>
    <label>Quantidade atual : {{$resource->quantity}}</label>

    @if(Session::has('mensagem'))
        <div class="alert alert-danger">
            {{Session::get('mensagem')}}
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{Form::open(['action' => 'FlowResourcesController@store'])}}


    {{Form::label('type_flow','Tipo de ajuste')}}

    {{Form::select('type_flow', ['entrada' => 'entrada', 'saida' => 'saída'],null, ['class' => 'form-control', 'required'])}}


    {{Form::label('quantity','Quantidade')}}
    {{Form::number('quantity','', ['class' => 'form-control',
                                   'required',
                                   'placeholder' => 'Quantidade' ])}}

    {{Form::hidden('resource_id',$resource->id)}}


    <br>
    {{Form::submit('Ajustar estoque!', ['class' => 'btn-default'])}}
    {{Form::close()}}


@endsection