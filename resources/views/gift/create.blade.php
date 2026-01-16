<h1>Ajouter un cadeau</h1>

<form action="{{ route('gifts.store') }}" method="POST">
    @csrf

    <div>
        <label>Nom :</label>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        <label>URL :</label>
        <input type="text" name="url" value="{{ old('url') }}">
    </div>

    <div>
        <label>Détails :</label>
        <textarea name="details">{{ old('details') }}</textarea>
    </div>

    <div>
        <label>Prix :</label>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}">
    </div>

    <button type="submit">Enregistrer</button>
</form>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
