<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Received</title>

    <link rel="stylesheet" href="{{ asset('css/email.css') }}">
</head>

<body>
<div class="container">
    <h2>Dear {{ $notifiable->name}},</h2>

    <p>Your application for the post: {{ $notification }} was received.</p>

    <p>If you do not hear from us after 30 days, please consider your application unsuccessful. Thank you for applying with us.</p>

    <p class="signature">Regards,<br>Human Capital - PSiRA</p>
</div>
</body>
</html>
