<form action="{{ route('admin.posts.store') }}" method="post">
    @csrf
    <div class="form-row">
        <label for="title">Titolo</label>
        <input type="text" name="title">
    </div>
    <div class="form-row">
        <label for="description">Slug</label>
        <input type="text" name="slug">
    </div>
    <div>
        <label for="category">Catogoria</label>
        <select class="form-control" id="category" name="category_id">
            <option value="">Nessuna categoria</option>
            @foreach ($categories as $category)
            <option
                @if (old('category_id', $post->category_id) == $category->id) selected @endif
                value="{{ $category->id }}">
                {{ $category->label }}
            </option>
            @endforeach
        </select>
        @foreach ($tags as $tag)
        <div class="form-check-input">
            <input class="form-check-input" id="tag-{{ $loop->iteration }}" type="checkbox" value="{{ $tag->id }}" name="tags[]">
            <label class="form-check-input" for="tag-{{ $loop->iteration }}">{{ $tag->label }}</label>
        </div>
        @endforeach
    </div>

    <input type="submit" value="Invia">
</form>