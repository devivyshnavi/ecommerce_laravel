<!DOCTYPE html>
<html>

<head>
    @include('admin.includes.head')
</head>

<body>
    <div class="container text-center">
        <h2>Shopper</h2>
        <h3>Thankyou for ordering from us! Your order will be delivered soon by our delivery personnel.</h3>
        <h4>Order Details</h4>
        <table border="1">
            <tbody>
                <tr>
                    <th>Email</th>
                    <th>Order Id</th>
                    <th>Product name</th>
                    <th>Product price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>{{$email}}</td>
                    <td>{{$orderId}}</td>
                    <td>{{$product_name}}</td>
                    <td>{{$price}}</td>
                    <td>{{$quantity}}</td>
                    <td>{{$amount}}</td>
                </tr>
            </tbody>
        </table>
        <p>Thankyou once again!</p>
    </div>
    @include('admin.includes.foot')
</body>

</html>