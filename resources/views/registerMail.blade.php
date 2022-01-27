<!DOCTYPE html>
<html>

<head>
    @include('admin.includes.head')
</head>

<body>
    <div class="container text-center">
        <h2>Shopper</h2>
        <h3>Thankyou for Registration.</h3>
        <h4> Details</h4>
        <h3>Email {{$email}}</h3>
        <h3>Password {{$password}}</h3>
        <p>Thankyou once again!</p>
    </div>
    @include('admin.includes.foot')
</body>

</html>