<h1>Modifier la catégorie #{{ $id }}</h1>

<form action="{{ route('categories.update', $id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Nom de la catégorie :</label>
    <input type="text" id="name" name="name" value="Nom actuel" required>
    
    <button type="submit">Mettre à jour</button>
</form>
