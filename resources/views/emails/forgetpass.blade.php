<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>

<body style="font-family: 'Arial', sans-serif; background-color: #f4f4f4; color: #333; text-align: center;">

    <div
        style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="color: #007bff;">Password Reset</h2>
        <p>We received a request to reset your password. Please use the OTP below to reset your password:</p>
        <div
            style="background-color: #007bff; color: #fff; padding: 10px; font-size: 24px; border-radius: 5px; margin-bottom: 20px;">
            {{ $otp }}
        </div>
        <p>If you didn't request a password reset, you can safely ignore this email. Your password will not be changed.
        </p>
        <p>Thank you!</p>
        <p style="color: #888;">This is an automated message, please do not reply.</p>
    </div>

</body>

</html>