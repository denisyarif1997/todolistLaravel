<!DOCTYPE html>
<html>
<head>
    <title>Todo List - Tugas Ku</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Atau sesuaikan dengan versi yang diinginkan dari Bootstrap -->
    <style>
        /* Menambahkan efek 3D pada tombol */
        .btn-3d {
            border: none;
            box-shadow: 0px 4px 0px #cccccc;
            transition: all 0.2s ease-in-out;
        }
        .btn-3d:hover {
            transform: translateY(2px);
            box-shadow: 0px 2px 0px #cccccc;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Tugas Ku</h1>

        <!-- Form to add new task -->
        <form action="{{ route('tasks.store') }}" method="POST" class="mb-3">
            @csrf
            <div class="input-group">
                <input type="text" name="name" class="form-control" placeholder="Buat Tugas Baru" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary btn-3d">Buat Tugas</button>
                </div>
            </div>
        </form>

        <ul class="list-group">
            @foreach($tasks as $task)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-check">
                            <input type="checkbox" name="completed" class="form-check-input" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                            <label class="form-check-label {{ $task->completed ? 'text-muted text-decoration-line-through' : '' }}">
                                {{ $task->name }}
                            </label>
                        </div>
                    </form>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-3d">Hapus</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Bootstrap JS (Optional, jika Anda memerlukan fungsi JavaScript dari Bootstrap) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
