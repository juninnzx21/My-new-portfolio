@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Sites</h1>

        @if ($sites->isEmpty())
            <p>Nenhum site encontrado.</p>
        @else
            <ul>
                @foreach ($sites as $site)
                    <li>
                        <a href="{{ route('sites.show', $site->id) }}">{{ $site->nome_site }}</a>
                        - <a href="{{ $site->url_site }}" target="_blank">{{ $site->url_site }}</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
