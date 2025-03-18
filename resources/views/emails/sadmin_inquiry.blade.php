<!DOCTYPE html>
<html>
<head>
    <title>New Inquiry Received</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); }
        h3 { color: #333; }
        p { font-size: 16px; line-height: 1.5; color: #555; }
        .highlight { font-weight: bold; color: #222; }
        .footer { margin-top: 20px; font-size: 14px; color: #888; }
    </style>
</head>
<body>
    <div class="container">
        <h3>📩 New Inquiry Received</h3>
        <p><span class="highlight">Name:</span> {{ $name }}</p>
        <p><span class="highlight">Email:</span> <a href="mailto:{{ $email }}">{{ $email }}</a></p>
        <p><span class="highlight">Subject:</span> {{ $subject }}</p>
        <p><span class="highlight">Message:</span></p>
        <p style="border-left: 4px solid #007bff; padding-left: 10px; color: #444;">{{ $inquiryMessage }}</p>
        <hr>
        <p class="footer">📌 Please respond to this inquiry as soon as possible.</p>
    </div>
</body>
</html>
