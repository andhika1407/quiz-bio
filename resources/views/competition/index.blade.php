<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Kompetisi</h1>
    
    @if (session('error'))
        <div style="color: red; margin-bottom: 10px;">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('competition.create') }}">Tambah Kompetisi</a>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Degree</th>
                <th>Nama</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($competitions as $comp)
                <tr>
                    <td>{{ $comp->degree }}</td>
                    <td>{{ $comp->nama }}</td>
                    <td>{{ $comp->competition_start }}</td>
                    <td>{{ $comp->competition_end }}</td>
                    <td>
                        <a href="{{ route('competition.edit', $comp->id) }}">Edit</a> |
                        <form action="{{ route('competition.destroy', $comp->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>