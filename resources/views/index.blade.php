@extends('layouts.layout')

@section('title', 'Homepagina')

@section('content')
    <h1>Welkom op de homepagina</h1>
    <p>Hier moet nog stuff komen</p>

    <h2>Laatste nieuws</h2>
    
    <section>
        @foreach ($newsitems as $newsitem)
            <article>
                <h3><a href="{{ route('news.show', $newsitem) }}">{{ $newsitem->title }}</a></h3>
                @if ($newsitem->image)
                    <img src="{{ asset('storage/' . $newsitem->image) }}" alt="{{ $newsitem->title }}" style="max-width: 300px;">
                @endif
                <p>{{ Str::limit($newsitem->content, 150) }}</p>
                <small>Gepubliceerd op: {{ $newsitem->published_at->format('d-m-Y') }}</small>
            </article>
        @endforeach

        {{ $newsitems->links() }}
    </section>
@endsection