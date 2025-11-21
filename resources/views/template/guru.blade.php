<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guru</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIP</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($gurus as $g)
        <tr>
            <td>{{ $g->nama }}</td>
            <td>{{ $g->nip }}</td>
            <td>{{ $g->user->email }}</td>
            <td>
                <a href="{{ route('guru.edit', $g->id) }}" class="btn btn-warning btn-sm">Edit</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>