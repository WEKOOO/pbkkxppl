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

    <form action="{{ route('update', $pertemuan3->id) }}" method="POST">
        @method('PUT')
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama', $pertemuan3->nama) }}" required><br>
        @error('nama')
         <div>{{ $message }}</div>
        @enderror

        <label for="umur">Umur:</label>
        <input type="number" id="umur" name="umur" value="{{ old('umur', $pertemuan3->umur) }}" required><br>
        @error('umur')
        <div>{{ $message }}</div>
        @enderror
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select><br>
        @error('status')
        <div>{{ $message }}</div>
        @enderror
        <label for="registered_at">Tanggal Terdaftar:</label>
        <input type="date" id="registered_at" name="registered_at" value="{{ old('registered_at', $pertemuan3->registered_at) }}" required><br>
        @error('registered_at')
        <div>{{ $message }}</div>
        @enderror
        <label for="is_verified">Verifikasi:</label>
        <input type="checkbox" id="is_verified" name="is_verified" value="1" {{ old('is_verified', $pertemuan3->is_verified) ? 'checked' : '' }}><br>
        @error('is_verified')
        <div>{{ $message }}</div>
        @enderror
        <button type="submit">Submit</button>
    </form>
</body>
</html>
