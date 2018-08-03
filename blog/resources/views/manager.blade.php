@extends('app')

@section('content')

{!! Form::open() !!}
<h1>Manager</h1>
<table border="1">

@foreach ($orders as $order)
            <tr>
                <td>
                {{ $order->title }}
                </td>
                <td>
                    {{ $order->body }}
                </td>
                <td>
                    {{ $order->client }}
                </td>
                <td>
                    {{ $order->email }}
                </td>
                <td>
                    {{ $order->created_at }}
                </td>
                <td>
                    {{ $order->status }}
                </td>
                <td>
                    @if($order->attached_file != '')
                    <a href="/uploads/{{ $order->attached_file }}" target="_blank">{{ $order->attached_file }}</a>
                    @endif
                </td>
                <td>
                    {!! Form::checkbox('status[]', $order->id) !!}
                </td>
            </tr>
@endforeach
</table>
<br>
{!! Form::submit('Mark') !!}
{!! Form::close() !!}

@endsection