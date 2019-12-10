<!doctype html>
<html>
<head>
  <title>Order #{{ $order->id }}</title>
</head>
<body>
  <h2>Order #: {{ $order->id }}</h2>
  <p>Phone number: {{ $order->phone_number}}</p>
  <p>State: {{ $order->state }}</p>
  <p>City: {{ $order->city }}</p>
  <p>Street: {{ $order->street }}</p>
  <p>House: {{ $order->house }}</p>
  <p>Flat: {{ $order->flat }}</p>
  <p><h2>All Items in Order</h2></p>
  @foreach($items as $item)
  <p>Item #: {{ $item->id }}</p>
  <p>Item name: {{ $item->name }}</p>
  <p>Category name: {{ $item->category->name }}</p>
  <p>Item price: {{ $item->price }}$</p>
  <p>Supplier name: "{{ $item->supplier->name }}"</p>
  @endforeach
  <p>Receiver sign:</p>
  <p>Courier sign:</p>
</body>
</html>
