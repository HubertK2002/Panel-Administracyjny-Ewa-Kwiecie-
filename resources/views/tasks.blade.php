<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Task Manager</title>
		@vite(['resources/js/app.tsx', 'resources/css/app.css', 'resources/css/bootstrap.min.css'])
	</head>

    <body style="background-color: #f8f9fa; font-family: Arial, sans-serif; color: #333;" class="container justify-content-center	d-flex align-items-center flex-column">
        <h1 class="h1">Hello, {{ $name }}</h1>
		<div class="mb-4">
			<a href="/"><button class="btn btn-secondary">Home</button></a>
			<a href="/users"><button class="btn btn-secondary">Show Users</button></a>
		</div>
		<a href="/task/create"><button class="btn btn-success">Add Task</button></a>
		<table class="table table-striped table-bordered" style="width: 80%; margin: 20px auto; border-collapse: collapse;">
			<tr>
				<th>Task Name</th>
				<th>Completed</th>
				<th>Completed At</th>
				<th>Actions</th>
			</tr>
			@foreach ($tasks_with_no_due_date as $task)
				<tr class="table-row">
					<td>{{ $task->name }}</td>
					<td><input type="checkbox" class="form-check-input" id="completed" name="completed" disabled style="margin-left: 5px; border: 1px solid black;" {{ $task->completed ? 'checked' : '' }}> </td>
					<td>{{ $task->completed_at }}</td>
					<td style="display: flex; gap: 10px; flex-direction: row;">
						<form action="/task/delete/{{ $task->id }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">Delete</button>
						</form>
						<form action="/task/edit/{{ $task->id }}" method="GET">
							@csrf
							<button type="submit" class="btn btn-primary">Edit</button>
						</form>
						<form action="/task/complete/{{ $task->id }}" method="POST">
							@csrf
							<button type="submit" class="btn btn-success">Mark as Completed</button>
						</form>
					</td>
				</tr>
			@endforeach
		</table>
		<table class="table table-striped table-bordered" style="width: 80%; margin: 20px auto; border-collapse: collapse;">
			<tr>
				<th>Task Name</th>
				<th>Due Date</th>
				<th>Completed</th>
				<th>Completed At</th>
				<th>Actions</th>
			</tr>
			@foreach ($tasks_with_due_date as $task)
				<tr class="table-row">
					<td>{{ $task->name }}</td>
					<td>{{ $task->due_to }}</td>
					<td><input type="checkbox" class="form-check-input" id="completed" name="completed" disabled style="margin-left: 5px; border: 1px solid black;" {{ $task->completed ? 'checked' : '' }}> </td>
					<td>{{ $task->completed_at }}</td>
					<td style="display: flex; gap: 10px; flex-direction: row;">
						<form action="/task/delete/{{ $task->id }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">Delete</button>
						</form>
						<form action="/task/edit/{{ $task->id }}" method="GET">
							@csrf
							<button type="submit" class="btn btn-primary">Edit</button>
						</form>
						<form action="/task/complete/{{ $task->id }}" method="POST">
							@csrf
							<button type="submit" class="btn btn-success">Mark as Completed</button>
						</form>
					</td>
				</tr>
			@endforeach
		</table>
    </body>
</html>