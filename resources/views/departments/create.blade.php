<!DOCTYPE html>
<html>
<head>
    <title>Create Department</title>
</head>
<body>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div>
            <label for="department">Department:</label>
            <input type="text" name="department" id="department" required>
        </div>
        <div>
            <button type="submit">Add Department</button>
        </div>
    </form>
</body>
</html>
