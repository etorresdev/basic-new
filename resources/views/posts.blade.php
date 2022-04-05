@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-body">
                    {{-- Valido si tiene imagen o contenido embebido --}}
                    {{-- @if ($post->imagen)
                        <img src="{{ $post->get_imagen }}" class="card-img-top">&nbsp;
                    @elseif ($post->iframe)
                        <div class="embed-responsive embed-responsive-16by9">
                        {!! $post->iframe !!}
                        </div>
                    @endif --}}
                    {{-- Valido si tiene imagen y contenido embebido --}}
                    @if ($post->imagen)
                        <div class="img-fluid">
                        <img src="{{ $post->get_imagen }}" class="card-img-top">&nbsp;
                        </div>
                    @endif
                    @if ($post->iframe)
                        <div class="embed-responsive embed-responsive-16by9">
                            {!! $post->iframe !!}
                        </div>&nbsp;
                    @endif
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">
                        {{ $post->get_excerpt }}
                    </p>
                    <a href="{{ route('post', $post) }}">Leer mas</a>
                    <p class="text-muted mb-0">
                        <em>
                            &ndash; {{ $post->user->name }}
                        </em>
                        {{ $post->created_at->format('d M Y') }}
                    </p>
                </div>
            </div>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
