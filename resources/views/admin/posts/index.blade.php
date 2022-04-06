@extends('layouts.app')

@section('content')

    <div class="container">
        <header>
            <h1>I miei post</h1>
            <a href="{{ route('admin.posts.create') }}">Crea Post</a>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">slug</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Creato il</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>

                @forelse($posts as $post)
                  <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>
                      @if($post->category)
                      {{ $post->category->label }}
                      @else - 
                      @endif
                    </td>
                    <td>
                        @foreach($post->tags as $tag)
                          @if($tag){{ $tag->label }}
                          @else - 
                          @endif
                        @endforeach
                    </td>
                    <td>{{ $post->created_at }}</td>
                    <td class="d-flex justify-content-around align-items-center">
                      <a href="{{ route('admin.posts.show', $post->id) }}">Dettagli</a>
                      <a href="{{ route('admin.posts.edit', $post->id)}}">Modifica</a>
                      <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" value="Delete">Cancella</button>
                      </form>
                    </td>
                  </tr>
                @empty
                <tr><td colspan=""><h3>Non ci sono posts</h3></td></tr>
                @endforelse
                </tbody>
              </table>
        </header>
    </div>

@endsection