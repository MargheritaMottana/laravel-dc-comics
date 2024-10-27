@extends('layouts.app')

@section('page-title', $comic->title)

@section('main-content')

    <div class="d-flex justify-content-between align-items-center mb-5">

        <h1>
            {{ $comic->title }}
        </h1>

        {{-- modifica il comic --}}
        <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-outline-warning text">
            Edit me!
        </a>

    </div>

    <div class="card">

        <div class="row">
            <div class="col-4">
                <img src="{{$comic->thumb}}" class="img-fluid rounded-start" alt="{{ $comic->title }}">
            </div>

            <div class="col">
                <div class="card-body">

                    <div class="ms-3 mb-3">
                        <h5 class="card-title ,b-3">{{ $comic->title }}</h5>
                        <p class="card-text">{{ $comic->description }}</p>
                    </div>
                
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Series: {{ $comic->series }}</li>
                    <li class="list-group-item">Type: {{ $comic->type }}</li>
                    <li class="list-group-item">
                        Artists:
                        <ul>
                            @foreach (json_decode($comic->artists, true) as $artist)
                                <li>
                                    {{ $artist }}
                                </li>   
                            @endforeach
                        </ul>
                    </li>
                    <li class="list-group-item">
                        Writers:
                        <ul>
                            @foreach (json_decode($comic->writers, true) as $writers)
                                <li>
                                    {{ $writers }}
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="list-group-item">Sales Date: {{ $comic->sales_date }}</li>
                    <li class="list-group-item">
                        Price: $ {{ number_format($comic->price, 2, ',', '.')}}
                    </li>
                    </ul>

                </div>
            </div>
    
        </div>

        
    </div>

@endsection
