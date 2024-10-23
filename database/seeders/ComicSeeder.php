<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// model
use App\Models\Comic;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Comic::truncate();

        $comics = config('comic');

        // ciclo per leggere e creare tutti i fumetti
        foreach ($comics as $item) {

            $comic = new Comic();

            $comic->title = $item['title'];
            $comic->description = $item['description'];
            $comic->thumb = $item['thumb'];
            /* 
                - aggiunto una sottostringa per il prezzo
                - la metto in float per avere un numero con la virgola
                - prendo il valore a partire dal carattere con posizione 1 (quindi da dopo il $) 
            */
            $priceNumber = floatval(substr($item['price'], 1));
            $comic->price = $priceNumber;
            $comic->series = $item['series'];
            $comic->sale_date = $item['sale_date'];
            $comic->type = $item['type'];
            /*
                Trasformo la stringa degli artisti e degli scrittori in json
            */
            $jsonArtists = json_encode($item['artists']);
            $comic->artists = $jsonArtists;
            $jsonWriters = json_encode($item['writers']);
            $comic->writers = $jsonWriters;

            $comic->save();
        }
    }
}
