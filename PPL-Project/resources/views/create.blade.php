<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Pertemuan 3</title>
</head>
<body>
    <h1>Input Data Pertemuan 3</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pertemuan3.store') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required><br>

        <label for="umur">Umur:</label>
        <input type="number" id="umur" name="umur" value="{{ old('umur') }}" required><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select><br>

        <label for="registered_at">Tanggal Terdaftar:</label>
        <input type="date" id="registered_at" name="registered_at" value="{{ old('registered_at') }}" required><br>

        <label for="is_verified">Verifikasi:</label>
        <input type="checkbox" id="is_verified" name="is_verified" value="1" {{ old('is_verified') ? 'checked' : '' }}><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
