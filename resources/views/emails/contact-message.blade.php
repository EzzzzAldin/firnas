<h2>New Contact Form Submission</h2>

<p><strong>Name:</strong> {{ $data['firstName'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Phone:</strong> {{ $data['phone'] ?? 'N/A' }}</p>
<p><strong>Message:</strong></p>
<p>{{ $data['message'] }}</p>
