<!DOCTYPE html>
<html>
<head>
    <title>Inquiry Confirmation</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f4f4f4; 
            padding: 40px; 
            display: flex; 
            justify-content: center;
        }
        .container { 
            background: #ffffff; 
            padding: 30px; 
            border-radius: 10px; 
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1); 
            max-width: 600px; 
            width: 100%;
            text-align: center;
        }
        h3 { 
            color: #007bff; 
            font-size: 22px; 
            margin-bottom: 15px;
        }
        p { 
            font-size: 16px; 
            line-height: 1.6; 
            color: #555; 
            margin: 10px 0;
        }
        .highlight { 
            font-weight: bold; 
            color: #222; 
        }
        .message-box {
            background: #f8f9fa; 
            padding: 15px; 
            border-left: 5px solid #007bff; 
            color: #444; 
            border-radius: 5px;
            text-align: left;
            margin-top: 15px;
        }
        .footer { 
            margin-top: 20px; 
            font-size: 14px; 
            color: #888; 
            text-align: center;
        }
        a { 
            color: #007bff; 
            text-decoration: none; 
        }
        a:hover {
            text-decoration: underline;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #ffffff;
            padding: 12px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 15px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>👋 Hello {{ $name }},</h3>
        <p>Thank you for reaching out! Your inquiry has been received, and our support team will get back to you as soon as possible.</p>
        <p><span class="highlight">📌 Subject:</span> {{ $subject }}</p>

        <div class="message-box">
            <p><strong>📝 Your Message:</strong></p>
            <p>{{ $inquiryMessage }}</p>
        </div>

        <a href="mailto:support@example.com" class="button">Contact Support</a>

        <hr>
        <p class="footer">📩 If you have any urgent concerns, feel free to reply to this email.</p>
        <p>Best regards,<br><strong>Your Support Team</strong></p>
    </div>
</body>
</html>
