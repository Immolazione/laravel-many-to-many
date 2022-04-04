<ul>
    <li scope="row">ID: {{ $post->id }}</li>
    <li>Titolo: {{ $post->title }}</li>
    <li>Slug: {{ $post->slug }}</li>
    {{-- @dd($post) --}}
    <li>Categoria: @if($post->category){{ $post->category->label}} @else - @endif</li>
    <li>Creato il: {{ $post->created_at }}</li>

    <a href="{{ route('admin.posts.index') }}">Indietro</a>
  
</ul>