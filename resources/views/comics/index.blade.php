@extends('layouts.app')

@section('page-title', 'Comics')

@section('main-content')
    <h1>
        Comics
    </h1>

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
                        {{ $item->thumb}}
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
                </tr>
            @endforeach
        </tbody>

      </table>

@endsection
