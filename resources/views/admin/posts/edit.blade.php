<form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-row">
        <label for="title">Titolo</label>
        <input type="text" name="title" value="{{ $post->title }}">
    </div>
    <div class="form-row">
        <label for="description">Slug</label>
        <input type="text" name="slug" value="{{ $post->slug }}">
    </div>
    <div>
        <label for="category">Catogoria</label>
        <select class="form-control" id="category" name="category_id">
            <option value="">Nessuna categoria</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->label }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="category">Tab</label>
        @foreach ($tags as $tag)
        <div class="form-check-input">
            <input 
                class="form-check-input" 
                id="tag-{{ $loop->iteration }}" 
                type="checkbox" 
                value="{{ $tag->id }}" 
                name="tags[]"
                @if(in_array($tag->id, old('tags', $post_tag_ids, []))) checked @endif>
            <label 
                class="form-check-input" 
                for="tag-{{ $loop->iteration }}">
                {{ $tag->label }}
            </label>
        </div>
        @endforeach
    </div>

    <input type="submit" value="Invia">
</form>