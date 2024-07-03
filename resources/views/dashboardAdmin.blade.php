<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <div class="w-24 md:w-auto ...">
        <form action="{{route('insert')}}" method="POST" enctype="multipart/form-data" class="static flex flex-col ...">
            @csrf
            <input type="text" placeholder="marque" name="marque">
            <input type="text" placeholder="matricule" name="matricule">
            <input type="file" placeholder="photo" name="photo">

            <button>valider</button>
        </form>

    </div>

</body>
</html>
