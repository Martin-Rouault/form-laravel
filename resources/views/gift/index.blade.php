<h1>Liste des cadeaux</h1>
<a href="{{ route('gifts.create') }}">Ajouter un nouveau cadeau</a>

<table border="1">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($gifts as $gift)
        <tr>
            <td>{{ $gift->name }}</td>
            <td>{{ $gift->price }} €</td>
            <td>
                <a href="{{ route('gifts.show', $gift->id) }}">Voir</a>

                <a href="{{ route('gifts.edit', $gift->id) }}">Modifier</a>

                <form action="{{ route('gifts.destroy', $gift->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
