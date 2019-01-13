@extends('layouts.app')
@section('title', 'Adicionar recursos')
@section('content')
    <h1>Adicionar recursos</h1>

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{Form::open(['action' => 'ResourceController@store'])}}
    {{Form::label('description','Descrição')}}
    {{Form::text('description','', ['class' => 'form-control',
                                    'required',
                                    'placeholder' => 'Descrição' ])}}

    {{Form::label('quantity','Quantidade')}}
    {{Form::number('quantity','', ['class' => 'form-control',
                                   'required',
                                   'placeholder' => 'Quantidade' ])}}

    {{Form::label('note','Observação')}}
    {{Form::textarea('note','', ['rows' => 3,
                                 'class' =>'form-control',
                                 'placeholder' => 'Observação'])}}

    <br>
    {{Form::submit('Cadastrar!', ['class' => 'btn-default'])}}
    {{Form::close()}}


@endsection