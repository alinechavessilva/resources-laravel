@extends('layouts.app')
@section('title', 'Editar recurso:'.$resource->description)
@section('content')

    <h1>Editar recurso {{$resource->description}}</h1>

    @if(Session::has('mensagem'))
        <div class="alert alert-success">
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


    {{Form::open(['route'=>['resources.update',$resource->id],'method'=>'PUT'])}}

    {{Form::label('description','Descrição', ['class'=>'prettyLabels'] )}}
    {{Form::text('description',$resource->description, ['class' => 'form-control',
                                                        'required',
                                                        'placeholder' => 'Descrição' ])}}

    {{Form::label('note','Observação')}}
    {{Form::textarea('note',$resource->note, ['rows' => 3,
                                              'class' =>'form-control',
                                              'placeholder' => 'Observação'])}}

    <br>
    {{Form::submit('Editar!', ['class' => 'btn-default'])}}

    {{Form::close()}}


@endsection