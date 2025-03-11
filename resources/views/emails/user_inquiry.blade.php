<p>Dear {{ $inquiry->name }},</p>
<p>Thank you for your inquiry. We will contact you soon.</p>
<p>Details:</p>
<ul>
    <li><strong>Type:</strong> {{ ucfirst($inquiry->type) }}</li>
    <li><strong>Description:</strong> {{ $inquiry->description ?? 'N/A' }}</li>
</ul>
<p>Best regards,<br>Your Company</p>
