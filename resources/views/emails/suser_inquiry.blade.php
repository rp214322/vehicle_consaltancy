<!DOCTYPE html>
<html>
<head>
    <title>Inquiry Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); text-align: center; }
        h3 { color: #333; }
        p { font-size: 16px; line-height: 1.5; color: #555; }
        .highlight { font-weight: bold; color: #222; }
        .message-box { background: #f9f9f9; padding: 15px; border-radius: 5px; margin-top: 10px; text-align: left; }
        .footer { margin-top: 20px; font-size: 14px; color: #888; }
    </style>
</head>
<body>
    <div class="container">
        <h3>👋 Hello {{ $name }},</h3>
        <p>Thank you for reaching out! Your inquiry has been received, and our support team will get back to you as soon as possible.</p>
        <p><span class="highlight">Subject:</span> {{ $subject }}</p>
        <div class="message-box">
            <p><span class="highlight">Your Message:</span></p>
            <p>{{ $inquiryMessage }}</p>
        </div>
        <hr>
        <p class="footer">📩 If you have any urgent concerns, feel free to reply to this email.</p>
        <p>Best regards,<br><strong>Your Support Team</strong></p>
    </div>
</body>
</html>
