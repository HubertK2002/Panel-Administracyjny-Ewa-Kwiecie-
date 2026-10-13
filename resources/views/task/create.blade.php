<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Task Manager</title>

		@vite(['resources/js/app.tsx', 'resources/css/app.css', 'resources/css/bootstrap.min.css'])
	</head>
    <body class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh; background-color: #f8f9fa;">
		<button><a href="/tasks" class="btn btn-secondary">Back to Tasks</a></button>
        <form action="/task/save" method="POST" style="max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
			@csrf
			<label for="name">Task Name:</label>
			<input type="text" id="name" name="name" required class="form-control">
			<br>
			<label for="due_to">Due Date:</label>
			<input type="datetime-local" id="due_to" name="due_to" class="form-control calendar-input">
			<br>
			<button type="submit" class="btn btn-primary">Create Task</button>
		</form>
    </body>
</html>