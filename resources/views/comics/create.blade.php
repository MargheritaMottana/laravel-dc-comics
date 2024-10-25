@extends('layouts.app')

@section('page-title', 'Create a new Comic')

@section('main-content')
    <h1>
        Create a new Comic
    </h1>

    {{-- per accedere a store, il metodo deve essere post --}}
    <form action="{{ route('comics.store') }}" method="POST">

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Write the title...">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
        </textarea class="form-control" id="description" placeholder="Write the description...">
        </div>

        <div class="mb-3">
            <label for="thumb" class="form-label">Thumb</label>
            <input type="text" class="form-control" id="thumb" placeholder="Attach the thumb...">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" placeholder="Write the price...">
        </div>

        <div class="mb-3">
            <label for="series" class="form-label">Series</label>
            <input type="text" class="form-control" id="series" placeholder="Write the series...">
        </div>

        <div class="mb-3">
            <label for="sales_date" class="form-label">Sales date</label>
            <input type="date" class="form-control" id="sales_date" placeholder="Write the sales date...">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select" name="" id="type">
                <option selected disabled>Select a type...</option>
                <option value="graphic novel">Graphic Novel</option>
                <option value="comic book">Comic Book</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">
            Submit
        </button>

    </form>

@endsection
