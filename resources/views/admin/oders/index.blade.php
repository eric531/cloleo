@extends('layouts.admin')

@section('content')
    <h1>Liste des commandes</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Client</th>
            <th>Total</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->total_price }} €</td>
                <td>{{ ucfirst($order->status) }}</td>
                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}">Voir</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
