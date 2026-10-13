<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Task Manager</title>
		@vite(['resources/js/app.tsx', 'resources/css/app.css', 'resources/css/bootstrap.min.css'])
	</head>
    <body class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh; background-color: #f8f9fa;">
		<button><a href="/" class="btn btn-secondary">Back to Home</a></button>
		<table class="table table-striped table-bordered" style="width: 80%; margin: 20px auto; border-collapse: collapse;">
			<tr>
				<th>User Name</th>
				<th>User Email</th>
				<th>User Created At</th>
				<th>User Updated At</th>
				<th>Actions</th>
			</tr>
			@foreach ($users as $user)
				<tr>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->created_at }}</td>
					<td>{{ $user->updated_at }}</td>
					<td>
						<a href="/user/edit/{{ $user->id }}" class="btn btn-primary">Edit</a>
						<form action="/user/delete/{{ $user->id }}" method="POST" style="display: inline;">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
		</table>
    </body>
</html>