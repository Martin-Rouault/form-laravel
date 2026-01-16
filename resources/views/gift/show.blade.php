<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails</title>
</head>
<body>

<h1>Détails du cadeau</h1>

<ul>
    <li><strong>Nom :</strong> {{ $gift->name }}</li>

    @if($gift->url)
        <li><strong>URL :</strong> <a href="{{ $gift->url }}" target="_blank">{{ $gift->url }}</a></li>
    @endif

    @if($gift->details)
        <li><strong>Détails :</strong> {{ $gift->details }}</li>
    @endif

    <li><strong>Prix :</strong> {{ $gift->price }} €</li>
</ul>

<hr>
<a href="{{ route('home') }}">Retour à la liste</a>

</body>
</html>
