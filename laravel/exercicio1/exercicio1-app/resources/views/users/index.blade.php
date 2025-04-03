<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio - Importar CSV</title>
</head>
<body>

    @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color: #f53003;">{{$error}}</p>
            @endforeach
    @endif


    <form action="{{ route ('user.import') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="file" name="file" id="file" accept=".csv">
        <br><br>
        <button type="submit" id="fileBtn">Importar</button>
    </form>

@foreach ($users as $user)
{{$user -> id}}
@endforeach

</body>
</html>
