@extends('layouts.app')

@section('page-title', 'Comics')

@section('main-content')

    <h1 class="mb-5">
        Comics
    </h1>

    <div class="mb-5">
        <a href="{{ route('comics.create') }}" class="btn btn-outline-success">
            + Add a comic
        </a>
    </div>

    <table class="table">

        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Thumb</th>
            <th scope="col">Price</th>
            <th scope="col">Series</th>
            <th scope="col">Sale_Date</th>
            <th scope="col">Type</th>
            <th scope="col">Artists</th>
            <th scope="col">Writers</th>
            {{-- aggiunta colonna azioni --}}
            <th scope="col"></th>
          </tr>
        </thead>

        <tbody>
            @foreach ($comics as $comic)
                <tr>
                    <th scope="row">
                        {{ $comic->id}}
                    </th>
                    <td>
                        {{ $comic->title}}
                    </td>
                    <td>
                        {{ $comic->description}}
                    </td>
                    <td>
                        <img src="{{ $comic->thumb}}" alt="{{ $comic->title}}">
                    </td>
                    <td>
                        {{-- formattato il numero con indicazioni riguardo:
                        la separazione con virgola e per le migliaia. 
                        La valuta è fuori perché non è salvata nel database --}}
                        $ {{ number_format($comic->price, 2, ',', '.')}}
                    </td>
                    <td>
                        {{ $comic->series}}
                    </td>
                    <td>
                        {{ $comic->sale_date}}
                    </td>
                    <td>
                        {{ $comic->type}}
                    </td>
                    <td>
                        {{ $comic->artists}}
                    </td>
                    <td>
                        {{ $comic->writers}}
                    </td>
                    {{-- aggiunta sezione per le azioni --}}
                    <td>
                        {{-- show, mostra il comic --}}
                        <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-outline-primary">
                            Look at me! O.O
                        </a>

                        {{-- edit, modifica il comic --}}
                        <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-outline-warning">
                            Edit me! :P
                        </a>

                        {{-- destroy, elimina il comic --}}
                        <form 
                            {{-- doppia conferma --}}
                            onsubmit="return confirm('Are you sure you want to delete this comic?')"
                            
                            action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                Delete me. ):
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

      </table>

@endsection
