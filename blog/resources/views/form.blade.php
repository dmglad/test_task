@extends('app')


@section('content')
    <h1>Feedback Form</h1>

    <hr/>

    {!! Form::open(['url' => 'success']) !!}




    {!! Form::close() !!}

    @if ($errors->any())
        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>
        @endforeach
    @endif


@endsection