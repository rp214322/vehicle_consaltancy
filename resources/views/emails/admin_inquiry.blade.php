<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>New Inquiry Notification</title>
    <style>
        body, p {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
        }
        td {
            background-color: #d2d6de;
            font-size: 13px;
        }
    </style>
</head>
<body style="background: #dedede; padding-top: 50px; padding-bottom: 50px;">
    <div class="main" style="padding: 18px; margin-left: 20%; margin-right: 20%; color: rgb(56, 56, 56); border: 0px none transparent; background: #fff;">
        <!-- Header Section -->
        <div class="header" style="border-bottom: 1px solid #c1b9b9; padding-bottom: 5px;">
            <div style="text-align: center;">
                <img width="90" height="90" src="{{ asset('front/img/logo.png') }}" />
            </div>
        </div>
        
        <!-- Content Section -->
        <div class="content" style="margin-top: 5px;">
            <p style="font-size: 18px; color: #333;"><strong>🚀 New Inquiry Received!</strong></p>
            <p style="font-size: 16px; color: #555;">You have received a new inquiry. Please find the details below:</p>

            <div style="background-color: #f9f9f9; padding: 15px; border-left: 5px solid #007bff; margin: 15px 0;">
                <p style="font-size: 16px;"><strong>🔹 Inquiry Details:</strong></p>
                <ul style="list-style: none; padding-left: 0; font-size: 14px; color: #555;">
                    <li><strong>👤 Name:</strong> {{ $mailData['name'] }}</li>

                    @if (!empty($mailData['vehical_id']))
                        <li><strong>🚗 Vehicle Details:</strong> {{ $mailData['vehical_id'] }}</li>
                    @else
                        <li><strong>🚗 Vehicle Details:</strong> N/A</li>
                    @endif

                    <li><strong>📧 Email:</strong> <a href="mailto:{{ $mailData['email'] }}" style="color: #007bff; text-decoration: none;">{{ $mailData['email'] }}</a></li>
                    <li><strong>📞 Phone:</strong> <a href="tel:{{ $mailData['phone'] }}" style="color: #007bff; text-decoration: none;">{{ $mailData['phone'] }}</a></li>
                    <li><strong>📌 Type:</strong> {{ ucfirst($mailData['type']) }}</li>
                    <li><strong>📝 Description:</strong> {{ $mailData['description'] ?? 'N/A' }}</li>
                </ul>
            </div>

            <p style="font-size: 16px; color: #555;">
                📢 Please follow up with the user at your earliest convenience.
            </p>

            <p style="font-size: 16px; font-weight: bold; color: #333;">
                Best Regards,  
                <br>🛠 Admin Team
            </p>
        </div>
    </div>
</body>
</html>
