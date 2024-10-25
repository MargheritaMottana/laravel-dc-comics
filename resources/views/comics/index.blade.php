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
            @foreach ($comics as $item)
                <tr>
                    <th scope="row">
                        {{ $item->id}}
                    </th>
                    <td>
                        {{ $item->title}}
                    </td>
                    <td>
                        {{ $item->description}}
                    </td>
                    <td>
                        <img src="{{ $item->thumb}}" alt="{{ $item->title}}">
                    </td>
                    <td>
                        {{-- formattato il numero con indicazioni riguardo:
                        la separazione con virgola e per le migliaia. 
                        La valuta è fuori perché non è salvata nel database --}}
                        $ {{ number_format($item->price, 2, ',', '.')}}
                    </td>
                    <td>
                        {{ $item->series}}
                    </td>
                    <td>
                        {{ $item->sale_date}}
                    </td>
                    <td>
                        {{ $item->type}}
                    </td>
                    <td>
                        {{ $item->artists}}
                    </td>
                    <td>
                        {{ $item->writers}}
                    </td>
                    {{-- aggiunta sezione per le azioni --}}
                    <td>
                        {{-- show, mostra il comic --}}
                        <a href="{{ route('comics.show', ['comic' => $item->id]) }}" class="btn btn-outline-primary">
                            Look at me!
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>

      </table>

@endsection
