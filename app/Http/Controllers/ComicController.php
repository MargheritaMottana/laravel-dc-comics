<?php

namespace App\Http\Controllers;

// model
use App\Models\Comic;

use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::get();
        // invio i dati alla pagina index.blade.php nella cartella comics
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $comic = new Comic();
        // prendo i dati da data
        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $priceNumber = floatval($data['price']);
        $comic->price = $priceNumber;
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
        /*
        devo trasformare la stringa passata nel form, in un json:
            - lo esplodo (diventa un array)
            - lo codifico (diventa un json)
            - lo salvo
        */
        $explodedArtists = explode(',', $data['artists']);
        $jsonArtists = json_encode($explodedArtists);
        $comic->artists = $jsonArtists;

        $explodeWriters = explode(',', $data['writers']);
        $jsonWriters = json_encode($explodeWriters);
        $comic->writers = $jsonWriters;
        $comic->save();

        // alla fine dell'operazione, vado alla finestra in cui vedo il nuovo comic inserito
        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();

        $comic->title = $data['title'];
        $comic->description = $data['description'];
        $comic->thumb = $data['thumb'];
        $priceNumber = floatval($data['price']);
        $comic->price = $priceNumber;
        $comic->series = $data['series'];
        $comic->sale_date = $data['sale_date'];
        $comic->type = $data['type'];
        $explodedArtists = explode(',', $data['artists']);
        $jsonArtists = json_encode($explodedArtists);
        $comic->artists = $jsonArtists;
        $explodeWriters = explode(',', $data['writers']);
        $jsonWriters = json_encode($explodeWriters);
        $comic->writers = $jsonWriters;

        $comic->save();

        // alla fine dell'operazione, vado alla finestra in cui vedo il comic modificato
        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        //
    }
}
