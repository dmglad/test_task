@extends('app')


@section('content')
    <h1>Feedback Form</h1>

    <hr/>

    {!! Form::open(['url' => 'success', 'files' => 'true']) !!}


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
        {!! Form::hidden('remember_token', $remember_token) !!}

    </div>

    <br>

    <div>
        {!! Form::label('attached_file', 'Select file to upload (max 2Mb):') !!}
        <br>
        {!! Form::file('attached_file') !!}
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