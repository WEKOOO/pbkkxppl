<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pertemuan 3</title>
</head>
<body>
    <h1>Data Pertemuan 3</h1>
    
    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Status</th>
                <th>Tanggal Terdaftar</th>
                <th>Verifikasi</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->umur }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->registered_at }}</td>
                    <td>{{ $item->is_verified ? 'Ya' : 'Tidak' }}</td>
                    <td>
                        <a href="{{route('edit', $item->id)}}">edit</a>
                            <form action="{{ route('destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>hapus</button>
                            </form>
            </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('pertemuan3.create') }}">Tambah</a>
    
</body>
</html>
    