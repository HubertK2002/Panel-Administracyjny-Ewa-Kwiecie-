<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Edit Task</title>
		@vite(['resources/js/app.tsx', 'resources/css/app.css', 'resources/css/bootstrap.min.css'])
	</head>
    <body class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh; background-color: #f8f9fa;">
        <h1>Edit Task</h1>
		<button><a href="/tasks" class="btn btn-secondary">Back to Tasks</a></button>
        <form action="/task/update/{{ $task->id }}" method="POST" style="max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
            @csrf
            @method('PUT')
            <label for="name">Task Name:</label>
            <input type="text" id="name" name="name" value="{{ $task->name }}" required class="form-control">
            <br><br>
            <label for="due_to">Due Date:</label>
            <input type="date" id="due_to" name="due_to" value="{{ $task->due_to }}" class="form-control">
            <br><br>
            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </body>
</html>