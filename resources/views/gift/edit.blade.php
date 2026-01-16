<h1>Modifier : {{ $gift->name }}</h1>

<form action="{{ route('gifts.update', $gift->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Nom :</label>
        <input type="text" name="name" value="{{ old('name', $gift->name) }}">
    </div>

    <div>
        <label>URL :</label>
        <input type="text" name="url" value="{{ old('url', $gift->url) }}">
    </div>

    <div>
        <label>Détails :</label>
        <textarea name="details">{{ old('details', $gift->details) }}</textarea>
    </div>

    <div>
        <label>Prix :</label>
        <input type="number" step="0.01" name="price" value="{{ old('price', $gift->price) }}">
    </div>

    <button type="submit">Mettre à jour</button>
</form>
