<div class="mb-3">
    <select class="form-select" name="categorie_id" aria-label="Default select example">
        <option selected>Open this select menu</option>
        @foreach($categories as $categorie)
            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
        @endforeach
    </select>
</div>
