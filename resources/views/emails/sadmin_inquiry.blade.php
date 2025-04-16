<!DOCTYPE html>
<html>
<head>
    <title>New Inquiry Received</title>
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
            padding: 25px; 
            border-radius: 8px; 
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1); 
            max-width: 600px; 
            width: 100%;
        }
        h3 { 
            color: #007bff; 
            text-align: center;
            font-size: 22px;
            margin-bottom: 15px;
        }
        p { 
            font-size: 16px; 
            line-height: 1.6; 
            color: #555; 
            margin: 8px 0;
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
            margin-top: 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <h3>📩 New Inquiry Received</h3>
        <p><span class="highlight">👤 Name:</span> {{ $name }}</p>
        <p><span class="highlight">📧 Email:</span> <a href="mailto:{{ $email }}">{{ $email }}</a></p>
        <p><span class="highlight">📌 Subject:</span> {{ $subject }}</p>

        <div class="message-box">
            <p><strong>📝 Message:</strong></p>
            <p>{{ $inquiryMessage }}</p>
        </div>

        <hr>
        <p class="footer">📌 Please respond to this inquiry as soon as possible.</p>
    </div>
</body>
</html>
