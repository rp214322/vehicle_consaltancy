<p>New inquiry received:</p>
<ul>
    <li><strong>Name:</strong> {{ $inquiry->name }}</li>
    <li><strong>Email:</strong> {{ $inquiry->email }}</li>
    <li><strong>Phone:</strong> {{ $inquiry->phone }}</li>
    <li><strong>Type:</strong> {{ ucfirst($inquiry->type) }}</li>
    <li><strong>Description:</strong> {{ $inquiry->description ?? 'N/A' }}</li>
</ul>
<p>Please follow up with the user.</p>
