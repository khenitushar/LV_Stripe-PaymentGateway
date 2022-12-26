<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="text-center">Payment Detail</h1>
    <a class="btn btn-primary" href="{{route('stripe')}}">Payment</a><br>
    <table class="table">
        <thead>
        <th>Id</th>
        <th>Payment Id</th>
        <th>Amount</th>
        <th>User</th>
        <th>Description</th>
        <th>Currency</th>
        <th>Payment Method</th>
        <th>Created At</th>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <td>{{$payment->id}}</td>
                <td>{{$payment->meta->id}}</td>
                <td>{{$payment->meta->amount}}</td>
                <td>{{$payment->name}}</td>
                <td>{{$payment->meta->description}}</td>
                <td>{{$payment->meta->currency}}</td>
                <td>{{$payment->meta->payment_method_types[0]}}</td>
                <td>{{\Illuminate\Support\Carbon::parse($payment->created)->format('d-m-yy')}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
