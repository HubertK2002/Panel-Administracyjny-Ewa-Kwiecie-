<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>{{ $title ?? 'Task Manager' }}</title>

	@vite(['resources/js/app.tsx', 'resources/css/app.css', 'resources/css/bootstrap.min.css'])
</head>
<body>
	{{ $slot }}
</body>
</html>