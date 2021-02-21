<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Verify Email</title>
</head>
<body>
	<p>{{ $details['password'] }}</p>
	<p>{{ $details['verify_code'] }}</p>
	<a href="{{ route('register.verify.user', ['code' => $details['verify_code']]) }}">Click here</a>
	<p>Thank you.</p>
</body>
</html>
