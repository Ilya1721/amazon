<!doctype html>
<html>
<head>
  <title>Order #{{ $order->id }}</title>
</head>
<body>
  <div>
    <div>
      <h2>All orders</h2>
      <table>
        <thead>
          <th>#</th>
          <th>Phone number</th>
          <th>State</th>
          <th>City</th>
          <th>Street</th>
          <th>House</th>
          <th>Flat</th>
        </thead>
        <tbody>
          <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->phone_number}}</td>
            <td>{{ $order->state }}</td>
            <td>{{ $order->city }}</td>
            <td>{{ $order->street }}</td>
            <td>{{ $order->house }}</td>
            <td>{{ $order->flat }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
