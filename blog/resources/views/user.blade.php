@extends('app')


@section('content')
    <h1>Feedback Form</h1>

    <hr/>

    {!! Form::open(['url' => 'success']) !!}


    <div>
        {!! Form::label('title', 'Title:') !!}
        <br>
        {!! Form::text('title') !!}

    </div>

    <br>

    <div>
        {!! Form::label('body', 'Body:') !!}
        <br>
        {!! Form::textarea('body') !!}

    </div>

    <br>

    <div>
        {!! Form::label('client', 'Client:') !!}
        <br>
        {!! Form::text('client') !!}

    </div>

    <br>

    <div>
        {!! Form::label('email', 'Email:') !!}
        <br>
        {!! Form::text('email') !!}
    </div>

    <br>

    <div>
    {!! Form::submit('Add order') !!}
    {!! Form::close() !!}

    @if ($errors->any())
        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>
        @endforeach
    @endif


@endsection