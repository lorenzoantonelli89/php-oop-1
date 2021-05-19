<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Movies {

    public $title;
    public $description;

    public function __construct($title, $description = null)
    {
        $this -> title = $title;

        if($description == null){
            $this -> description = 'La descrizione non è presente';
        }else {
            $this -> description = $description;
        }
    }

    public function getString(){
        return 'Movie:' . $this->title . '-->' . $this->description;
    }

    function randString($length, $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz')
    {
        $str = '';
        $count = strlen($charset);
        while ($length--) {
            $str .= $charset[mt_rand(0, $count - 1)];
        }
        return $str;
    }

}

class JumbotronControllers extends Controller
{
    public function home(){

        // funzione index array random
        function getIndexRnd($lg){

            $indexRnd = rand(0, $lg -1);
            return $indexRnd;
        }

        $description = [
            'Questo è un film di azione, del 2018 distributo in 18 paesi', 'Questo film è una commedia, uscita nelle sale di 20 paesi, nel 2020', 'Questo film è un horror, uscito in 12 paesi e censurato negli altri, perchè troppo cruento. Il film è del 2020', 'Il film è del 2012 è un thriller psicologico ad alta intesità, coinvolgente distribuito in 24 paesi', 'Questo è un docu-film sugli allevamenti intesivi, prodotto dalla fondazione per la salvaguardia degli animali, girato nel 2016 negli USA'
        ];

        $lg = count($description);

        $indRnd1 = getIndexRnd($lg);
        $indRnd2 = getIndexRnd($lg);
        $indRnd3 = getIndexRnd($lg);

        $movie1 = new Movies('Batman');
        $movie2 = new Movies('Dietro quella porta', $description[$indRnd1]);
        $movie3 = new Movies('Coospiracy', $description[$indRnd2]);
        $movie4 = new Movies('Aspettavo te', $description[$indRnd3]);

        $movie1Str = $movie1 -> getString();
        $movie2Str = $movie2->getString();
        $movie3Str = $movie3->getString();
        $movie4Str = $movie4->getString(); 

        dd($movie1, $movie2, $movie3, $movie4, $movie1Str, $movie2Str, $movie3Str, $movie4Str);

        //  versione con array 
        // $movies = [
        //     $movie1,
        //     $movie2,
        //     $movie3,
        //     $movie4
        // ];
        // $str = '';
        // foreach ($movies as $movie) {
        //     $str .= $movie->getString() . "\n";
        // }
        // dd($str);

        return view('pages.home');
    }
    
}
