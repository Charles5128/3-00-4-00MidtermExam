<!DOCTYPE html>
<html>
<head>
    <title>New Product Created</title>
</head>
<body>
    <h1>New Product Created!</h1>
    <p>Hello, {{ Auth::user()->first_name }}!</p>
    <p>A new product has been created:</p>
    <h2>{{ $productName }}</h2>
    <p>Thank you for using our application!</p>
    <p>Best regards,<br>Your Company Name</p>
</body>
</html>