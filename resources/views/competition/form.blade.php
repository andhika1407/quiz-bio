<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ isset($competition) ? 'Edit Kompetisi' : 'Tambah Kompetisi' }}</h1>
    <form action="{{ isset($competition) ? route('competition.update', $competition->id) : route('competition.store') }}" method="POST">
        @csrf
        @if (isset($competition)) @method('PUT') @endif

        <label>Degree:</label>
        <input type="text" name="degree" value="{{ old('degree', $competition->degree ?? '') }}">
        @error('degree') <div>{{ $message }}</div> @enderror
        <br>

        <label>Nama Kompetisi:</label>
        <input type="text" name="nama" value="{{ old('nama', $competition->nama ?? '') }}">
        @error('nama') <div>{{ $message }}</div> @enderror
        <br>

        <label>Tanggal Mulai:</label>
        <input type="datetime-local" name="competition_start" value="{{ old('competition_start', isset($competition) ? date('Y-m-d\TH:i', strtotime($competition->competition_start)) : '') }}">
        @error('competition_start') <div>{{ $message }}</div> @enderror
        <br>

        <label>Tanggal Selesai:</label>
        <input type="datetime-local" name="competition_end" value="{{ old('competition_end', isset($competition) ? date('Y-m-d\TH:i', strtotime($competition->competition_end)) : '') }}">
        @error('competition_end') <div>{{ $message }}</div> @enderror
        <br><br>

        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('competition.index') }}">Kembali</a>
</body>
</html>