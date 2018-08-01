@extends('app')

@section('content')


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
            </tr>
@endforeach
</table>

@endsection