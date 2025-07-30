@extends('layouts.admin')

@section('content')
    <h1>Détails de la commande #{{ $order->id }}</h1>
    <p><strong>Client :</strong> {{ $order->user->name }}</p>
    <p><strong>Total :</strong> {{ $order->total_price }} €</p>
    <p><strong>Statut :</strong> {{ ucfirst($order->status) }}</p>

    <h2>Produits commandés</h2>
    <table>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix</th>
        </tr>
        @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }} €</td>
            </tr>
        @endforeach
    </table>

    <h2>Modifier le statut</h2>
    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        <label>Statut :</label>
        <select name="status">
            <option value="en attente" @if($order->status == 'en attente') selected @endif>En attente</option>
            <option value="payée" @if($order->status == 'payée') selected @endif>Payée</option>
            <option value="expédiée" @if($order->status == 'expédiée') selected @endif>Expédiée</option>
            <option value="annulée" @if($order->status == 'annulée') selected @endif>Annulée</option>
        </select>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
