<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Email</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: 30px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .header h1 {
            color: #007bff;
            margin: 0;
            font-size: 26px;
        }
        p {
            color: #333;
            font-size: 16px;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: white !important;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            font-size: 13px;
            color: #888;
            margin-top: 30px;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to {{ config('app.name') }}</h1>
        </div>

        <p>Hi <strong>{{ $user->username }}</strong>,</p>

        <p>We’re excited to have you on board! Your account has been successfully created.</p>

        <p>You can log in to your account and start exploring right away.</p>

        <div style="text-align:center;">
            <a href="{{ url('/') }}" class="btn">Go to Dashboard</a>
        </div>

        <div class="footer">
            <p>Thanks,<br>The {{ config('app.name') }} Team</p>
        </div>
    </div>
</body>
</html>
