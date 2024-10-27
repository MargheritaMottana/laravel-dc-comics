@extends('layouts.app')

@section('page-title', 'Edit '.$comic->title)

@section('main-content')
    <h1>
        Edit {{ $comic->title }}
    </h1>

    {{-- per accedere a store, il metodo deve essere post --}}
    <form action="{{ route('comics.update', ['comic'=> $comic->id]) }}" method="POST">

        @csrf
        {{-- aggiunto metodo --}}
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">
                Title
                <span class="text-danger">*</span>
            </label>
            {{-- Value in ogni campo per prevalorizzare il contenuto --}}
            <input required maxlength="128" name="title" value="{{ $comic->title }}" type="text" class="form-control" id="title" placeholder="Write the title...">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">
                Description
                <span class="text-danger">*</span>
            </label>
        <textarea
            required
            maxlength="4096"
            name="description"
            class="form-control"
            id="description"
            placeholder="Write the description...">{{ $comic->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="series" class="form-label">
                Series
                <span class="text-danger">*</span>
            </label>
            <input required maxlength="64" name="series" value="{{ $comic->series }}" type="text" class="form-control" id="series" placeholder="Write the series...">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">
                Type
                <span class="text-danger">*</span>
            </label>

            <select required name="type" class="form-select" id="type">
                {{-- aggiunto l'if per visualizzare il dato precompilato o il valore disabilitato --}}
                <option
                    @if (!@isset($comic->type) || $comic->type == '')
                        selected
                    @endif
                        disabled>Select a type...
                </option>
                
                <option
                    @if ($comic->type == 'graphic novel')
                        selected
                    @endif
                        value="graphic novel">Graphic Novel
                </option>

                <option
                    @if ($comic->type == 'comic book')
                        selected
                    @endif
                    value="comic book">Comic Book
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="artists" class="form-label">
                Artists
            </label>
            <input name="artists" value="{{ $comic->artists }}" type="text" class="form-control" id="artists" aria-describedby="artists-help" placeholder="Write the artists...">

            <div id="artists-help" class="form-text">
                Enter artists' names separated by commas
            </div>
        </div>

        <div class="mb-3">
            <label for="writers" class="form-label">
                Writers
            </label>
            <input name="writers" value="{{ $comic->writers }}" type="text" class="form-control" id="writers" aria-describedby="writers-help" placeholder="Write the writers...">

            <div id="writers-help" class="form-text">
                Enter writers' names separated by commas
            </div>
        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label">
                Thumb
            </label>
            <input maxlength="2048" name="thumb" value="{{ $comic->thumb }}" type="text" class="form-control" id="thumb" placeholder="Attach the thumb...">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">
                Price
                <span class="text-danger">*</span>
            </label>
            <input required max="999.99" name="price" value="{{ $comic->price }}" type="number" class="form-control" id="price" placeholder="Write the price...">
        </div>

        <div class="mb-3">
            <label for="sale_date" class="form-label">
                Sale date
            </label>
            <input name="sale_date" value="{{ $comic->sale_date }}" type="date" class="form-control" id="sale_date" placeholder="Write the sale date...">
        </div>

        <button type="submit" class="btn btn-warning">
            Submit
        </button>

    </form>

@endsection
