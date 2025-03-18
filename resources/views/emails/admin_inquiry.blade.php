<p style="font-size: 18px; color: #333;"><strong>🚀 New Inquiry Received!</strong></p>

<p style="font-size: 16px; color: #555;">You have received a new inquiry. Please find the details below:</p>

<div style="background-color: #f9f9f9; padding: 15px; border-left: 5px solid #007bff; margin: 15px 0;">
    <p style="font-size: 16px;"><strong>🔹 Inquiry Details:</strong></p>
    <ul style="list-style: none; padding-left: 0; font-size: 14px; color: #555;">
        <li><strong>👤 Name:</strong> {{ $inquiry->name }}</li>

        @if ($inquiry->vehical_id && $inquiry->vehical)
            <li><strong>🚗 Vehicle Details:</strong> {{ $inquiry->vehical->title }}</li>
        @else
            <li><strong>🚗 Vehicle Details:</strong> N/A</li>
        @endif

        <li><strong>📧 Email:</strong> <a href="mailto:{{ $inquiry->email }}" style="color: #007bff; text-decoration: none;">{{ $inquiry->email }}</a></li>
        <li><strong>📞 Phone:</strong> <a href="tel:{{ $inquiry->phone }}" style="color: #007bff; text-decoration: none;">{{ $inquiry->phone }}</a></li>
        <li><strong>📌 Type:</strong> {{ ucfirst($inquiry->type) }}</li>
        <li><strong>📝 Description:</strong> {{ $inquiry->description ?? 'N/A' }}</li>
    </ul>
</div>

<p style="font-size: 16px; color: #555;">
    📢 Please follow up with the user at your earliest convenience.
</p>

<p style="font-size: 16px; font-weight: bold; color: #333;">
    Best Regards,  
    <br>🛠 Admin Team
</p>
