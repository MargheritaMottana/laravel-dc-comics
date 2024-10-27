@extends('layouts.app')

@section('page-title', 'Create a new Comic')

@section('main-content')
    <h1>
        Create a new Comic
    </h1>

    {{-- alert per visualizzare tutti gli errori della section, come lista --}}
    {{-- @if ($errors->any())
        <div class="alert alert-danger my-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    {{-- per accedere a store, il metodo deve essere post --}}
    <form action="{{ route('comics.store') }}" method="POST">

        {{-- aggiunto csrf--}}
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">
                Title
                {{-- asterisco per far capire che è obbligatorio --}}
                <span class="text-danger">*</span>
            </label>
            {{-- name in ogni input per salvare il dato --}}
            <input required maxlength="128" name="title" type="text" class="form-control" id="title" placeholder="Write the title...">
            
            {{-- errore specifico --}}
            @error('title')
                <div class="alert alert-danger my-4">
                    Title error: {{ $message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">
                Description
                <span class="text-danger">*</span>
            </label>
            <textarea required maxlength="4096" name="description" class="form-control" id="description" placeholder="Write the description..."></textarea>
            
            @error('description')
                <div class="alert alert-danger my-4">
                    Description error: {{ $message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="series" class="form-label">
                Series
                <span class="text-danger">*</span>
            </label>
            <input required maxlength="64" name="series" type="text" class="form-control" id="series" placeholder="Write the series...">
        
            @error('series')
                <div class="alert alert-danger my-4">
                    Series error: {{ $message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">
                Type
                <span class="text-danger">*</span>
            </label>

            <select required name="type" class="form-select" id="type">
                <option selected disabled>Select a type...</option>
                <option value="graphic novel">Graphic Novel</option>
                <option value="comic book">Comic Book</option>
            </select>

            @error('type')
                <div class="alert alert-danger my-4">
                    Type error: {{ $message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="artists" class="form-label">
                Artists
            </label>
            <input name="artists" type="text" class="form-control" id="artists" aria-describedby="artists-help" placeholder="Write the artists...">

            <div id="artists-help" class="form-text">
                Enter artists' names separated by commas
            </div>
        </div>

        <div class="mb-3">
            <label for="writers" class="form-label">
                Writers
            </label>
            <input name="writers" type="text" class="form-control" id="writers" aria-describedby="writers-help" placeholder="Write the writers...">

            <div id="writers-help" class="form-text">
                Enter writers' names separated by commas
            </div>
        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label">
                Thumb
            </label>
            <input maxlength="2048" name="thumb" type="text" class="form-control" id="thumb" placeholder="Attach the thumb...">
        
            {{-- mostrare più errori --}}
            @if ($errors->has('thumb'))
                <div class="alert alert-danger mt-1">
                    Thumb errors:
                    <ul class="mb-0">
                        @foreach ($errors->get('thumb') as $key => $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">
                Price
                <span class="text-danger">*</span>
            </label>
            <input required max="999.99" name="price" type="number" class="form-control" id="price" placeholder="Write the price...">
        
            @error('price')
                <div class="alert alert-danger my-4">
                    Price error: {{ $message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sale_date" class="form-label">
                Sale date
            </label>
            <input name="sale_date" type="date" class="form-control" id="sale_date" placeholder="Write the sale date...">
        </div>

        <button type="submit" class="btn btn-success">
            Submit
        </button>

    </form>

@endsection
