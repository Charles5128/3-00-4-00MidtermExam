<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
</head>
<body>
    <h1>Welcome, {{ $user->first_name }}!</h1>
    <p>Thank you for registering with us. Please verify your email address by clicking the link below:</p>
    <a href="{{ $verificationUrl }}">Verify Email Address</a>
    <p>If you did not create an account, no further action is required.</p>
    <p>Best regards,<br>Charles Ian Pangan</p>
</body>
</html>