<div class="form-flex-container">
    <div class="image-container">
        <img src="{{ asset('storage/'. $actualite->image) }}" alt="Image d'actualité">
    </div>
    <div class="form-input-container">
        <div class="form-group">
            <label for="category">Catégorie</label>
            <select name="category" id="category" class="form-control">
                <option value="">Sélectionner une catégorie</option>
                @foreach($categories as $category)
                    <option value="{{ $category->slug }}" {{ $actualite->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error("category")
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" placeholder="Titre de l'actualité" autocomplete="off" value="{{ $actualite->title }}">
            @error("title")
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" accept="image/*">
            @error("image")
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea name="body" id="content" rows="10" placeholder="Contenu de l'actualité">
                {!! $actualite->body !!}
            </textarea>
            @error("body")
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-button-container">
            <button type="submit" class="actualiteBtnSubmit">Modifier l'actualité</button>
        </div>
    </div>
</div>
